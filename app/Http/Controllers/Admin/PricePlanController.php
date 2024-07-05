<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricePlan;
use App\Models\Product;
use Illuminate\Http\Request;
use Iyzipay\Model\Subscription\SubscriptionPricingPlan;
use Iyzipay\Options;
use Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest;

class PricePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricePlans = PricePlan::all();
        return view('admin.pages.pricePlan.index', compact('pricePlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.pages.pricePlan.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        $options = new Options();
        $options->setApiKey('sandbox-lIXvNi1c8ZQoUq3lmjZkT46UOx0IL6Ji');
        $options->setSecretKey('sandbox-mg8IgyBneUYjDZXnqnTuD6ztX949Nj5W');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        $paymentRequest = new SubscriptionCreatePricingPlanRequest();
        $paymentRequest->setLocale('tr');
        $paymentRequest->setConversationId($request->conversion_id);
        $paymentRequest->setProductReferenceCode($product->referenceCode);
        $paymentRequest->setName($request->name);
        $paymentRequest->setPrice($request->price);
        $paymentRequest->setCurrencyCode($request->currency);
        $paymentRequest->setPaymentInterval($request->interval);
        $paymentRequest->setPaymentIntervalCount($request->payment_interval_count);
        $paymentRequest->setTrialPeriodDays($request->trial_period_days);
        $paymentRequest->setRecurrenceCount($request->recurrence_count);
        $paymentRequest->setPlanPaymentType($request->planPayment_type);
        $result = SubscriptionPricingPlan::create($paymentRequest, $options);
        $resultArray = json_decode($result->getRawResult(), true);
        PricePlan::create([
            'product_id' => $product->id,
            'referenceCode' => $resultArray['data']['referenceCode'],
            'createdDate' => $resultArray['data']['createdDate'],
            'name' => $resultArray['data']['name'],
            'price' => $resultArray['data']['price'],
            'interval' => $resultArray['data']['paymentInterval'],
            'interval_count' => $resultArray['data']['paymentIntervalCount'],
            'trial_period_days' => $resultArray['data']['trialPeriodDays'],
            'plan_payment_type' => $resultArray['data']['planPaymentType'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
