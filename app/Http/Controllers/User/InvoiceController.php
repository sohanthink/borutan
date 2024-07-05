<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Config;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::id())->latest()->paginate(20);
        return view('user.pages.invoice.index', compact('invoices'));
    }

    public function buy(Request $request,$id)
    {

        $package = Package::find($id);
        $invoice = Invoice::create([
            'user_id'=>auth()->id(),
            'type'=>"Package",
            'package_id'=>$package->id,
            'status'=>"Pending",
            'amount'=>$package->price,
            'wallet_name'=>'Unpaid',
        ]);
        
        $reciver = User::where('role',"Admin")->firstOrFail();
        Notification::create([
            'user_id'=>$reciver->id,
            'title'=>"New Order Placed",
            'message' =>  "A New Order has been placed. Invoice ID: " . $invoice->id . ". Amount: $" . $invoice->amount . ". <a href='" . route('admin.invoice.index') . "'>Click Here</a> for more details.",
        ]);
        return view('front.page.payment.index',compact('invoice','package'));
        
    }

    public function payment(Request $request,$id)
    {
        $request->validate([
            'cardHolderName' => 'required|string|max:255',
            'cardNumber' => 'required|digits_between:15,16',
            'expireMonth' => 'required|digits:2|between:1,12',
            'expireYear' => 'required|digits:4|after_or_equal:'.date('Y'),
            'cvc' => 'required|digits:3',
        ]);
        
        $invoice = Invoice::findOrFail($id);
        $package = Package::find($invoice->package_id);

        $options = new Options();
        $options->setApiKey(env('IYZIPAY_API_KEY'));
        $options->setSecretKey(env('IYZIPAY_SECRET_KEY'));
        $options->setBaseUrl(env('IYZIPAY_BASE_URL', 'https://sandbox-api.iyzipay.com'));
            

        $ConversationId = rand(100000000, 999999999); 
        $paymentRequest = new CreatePaymentRequest(); 
        $paymentRequest->setLocale(Locale::TR);
        $paymentRequest->setConversationId($ConversationId);
        $paymentRequest->setPrice($package->price);
        $paymentRequest->setPaidPrice($package->price);
        $paymentRequest->setCurrency(Currency::TL);
        $paymentRequest->setInstallment(1);
        $paymentRequest->setBasketId("B67832");
        $paymentRequest->setPaymentChannel(PaymentChannel::WEB);
        $paymentRequest->setPaymentGroup(PaymentGroup::PRODUCT);

        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($request->cardHolderName);
        $paymentCard->setCardNumber($request->cardNumber);
        $paymentCard->setExpireMonth($request->expireMonth);
        $paymentCard->setExpireYear($request->expireYear);
        $paymentCard->setCvc($request->cvc);
        $paymentCard->setRegisterCard(0);
        $paymentRequest->setPaymentCard($paymentCard);

        $IdentityNumber = rand(10000000000, 99999999999);
        $buyer = new Buyer();
        $buyer->setId(auth()->user()->id);
        $buyer->setName(auth()->user()->first_name);
        $buyer->setSurname(auth()->user()->last_name);
        $buyer->setGsmNumber("N/A");
        $buyer->setEmail(auth()->user()->email);
        $buyer->setIdentityNumber($IdentityNumber);
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $paymentRequest->setBuyer($buyer);
       
        

        $shippingAddress = new Address();
        $shippingAddress->setContactName(auth()->user()->first_name);
        $shippingAddress->setCity("N/A");
        $shippingAddress->setCountry("N/A");
        $shippingAddress->setAddress("N/A");
        $shippingAddress->setZipCode("N/A");
        $paymentRequest->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setContactName(auth()->user()->first_name);
        $billingAddress->setCity("N/A");
        $billingAddress->setCountry("N/A");
        $billingAddress->setAddress("N/A");
        $billingAddress->setZipCode("N/A");
        $paymentRequest->setBillingAddress($billingAddress);

        $basketItems = [];
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId($package->id);
        $firstBasketItem->setName($package->name);
        $firstBasketItem->setCategory1("N/A");
        $firstBasketItem->setCategory2("Package");
        $firstBasketItem->setItemType(BasketItemType::VIRTUAL);
        $firstBasketItem->setPrice($package->price);
        $basketItems[0] = $firstBasketItem;

        $paymentRequest->setBasketItems($basketItems);

        $payment = Payment::create($paymentRequest, $options);
         
        if ($payment->getStatus() == 'success') {
            $user = User::find(auth()->id());
            $user->update([
                'contract' => ($user->contract + $package->contract),
                'package_id' => $package->id,
                'expire_date' => Carbon::now()->addDays(30),
            ]);
            $invoice->update([
                'status'=>'Paid',
                'wallet_name'=>$payment->getCardAssociation(),
                'paid_at'=>Carbon::now(),
                'tnx_id' => $payment->getPaymentId(),
            ]);

            $subscription = Subscription::where('user_id', auth()->user()->id)
                ->latest()
                ->where('status', 'Active')
                ->first();

            if ($subscription) {
                $subscription->update([
                    'status' => 'Cancel'
                ]);
                $options = new Options();
                $options->setApiKey(env('IYZIPAY_API_KEY'));
                $options->setSecretKey(env('IYZIPAY_SECRET_KEY'));
                $options->setBaseUrl(env('IYZIPAY_BASE_URL', 'https://sandbox-api.iyzipay.com'));

                $request = new \Iyzipay\Request\Subscription\SubscriptionCancelRequest();
                $request->setLocale("tr");
                $request->setConversationId($subscription->conversation_id);
                $request->setSubscriptionReferenceCode($subscription->reference_code);
                $result = \Iyzipay\Model\Subscription\SubscriptionCancel::cancel($request,$options);
            }

            if($package->name == 'Bas' )
            {
                $ReferenceCode ='54e0ca3d-abc2-4c19-8933-fadaeafaca1b';
            }elseif($package->name == 'Prio')
            {
                $ReferenceCode = '61399079-17ff-412d-9b02-73cdcc29f2fd';
            }else
            {
                return redirect()->route('user.apartment.index')->with(['success','Beställ plats framgångsrikt!']);  
            };

            $subscription = new \Iyzipay\Request\Subscription\SubscriptionCreateRequest();
            $subscription->setLocale("tr");
            $subscription->setConversationId($ConversationId);
            $subscription->setPricingPlanReferenceCode($ReferenceCode);
            $subscription->setSubscriptionInitialStatus("ACTIVE");
            $subscription->setPaymentCard($paymentCard);

            $customer = new \Iyzipay\Model\Customer();
            $customer->setName(auth()->user()->first_name);
            $customer->setSurname(auth()->user()->last_name);
            $customer->setGsmNumber('+905555555555');
            $customer->setEmail(auth()->user()->email);
            $customer->setIdentityNumber($IdentityNumber);
            $customer->setShippingContactName(auth()->user()->first_name);
            $customer->setShippingCity('Istanbul');
            $customer->setShippingDistrict('N/A');
            $customer->setShippingCountry("Turkey");
            $customer->setShippingAddress('N/A');
            $customer->setShippingZipCode('N/A');
            $customer->setBillingContactName(auth()->user()->first_name);
            $customer->setBillingCity("Istanbul");
            $customer->setBillingDistrict('N/A');
            $customer->setBillingCountry('Turkey');
            $customer->setBillingAddress('N/A');
            $customer->setBillingZipCode('N/A');
            
            $subscription->setCustomer($customer);

            $result = \Iyzipay\Model\Subscription\SubscriptionCreate::create($subscription,$options);
            
            Subscription::create([
                'user_id'=>auth()->user()->id,
                'package_id'=>$package->id,
                'reference_code'=>$result->getReferenceCode(),
                'conversation_id'=>$ConversationId,
                'status'=>'Active'
            ]);
            
            return redirect()->route('user.apartment.index')->with(['success','Beställ plats framgångsrikt!']);  
        } else {
            Log::error('Payment failed: ' . $payment->getErrorMessage());
            return redirect()->back()->with('warning','Betalning misslyckades: Kortnumret är ogiltigt.')->with('title','Misslyckades');
        }
    }

    public function active()
    {
        $packages = Subscription::where('user_id',auth()->id())->where('status',"Active")->first();
        return view('user.pages.subscription.index',compact('packages'));
    }

    public function cancel()
    {
        $subscription = Subscription::where('user_id', auth()->user()->id)
            ->where('status', 'Active')
            ->latest()
            ->firstOrFail();

        $subscription->update([
            'status'=>'Cancel'
        ]);

        $options = new Options();
        $options->setApiKey(env('IYZIPAY_API_KEY'));
        $options->setSecretKey(env('IYZIPAY_SECRET_KEY'));
        $options->setBaseUrl(env('IYZIPAY_BASE_URL', 'https://sandbox-api.iyzipay.com'));

        $request = new \Iyzipay\Request\Subscription\SubscriptionCancelRequest();
        $request->setLocale("tr");
        $request->setConversationId($subscription->conversation_id);
        $request->setSubscriptionReferenceCode($subscription->reference_code);
        $result = \Iyzipay\Model\Subscription\SubscriptionCancel::cancel($request,$options);
        if ($result->getStatus() == 'success') {
            return redirect()->route('user.apartment.index')->with(['success','Payment Cancel Successfully!']);  
        }else
        {
            return redirect()->route('user.apartment.index')->with(['error','Something Is wrong!']);
        }
    }
}       
