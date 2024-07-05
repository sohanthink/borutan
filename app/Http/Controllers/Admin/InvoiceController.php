<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Package;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->paginate(20);
        return view('admin.pages.invoice.index', compact('invoices'));
    }
    public function approve($id)
    {
        $invoice = Invoice::findOrFail($id);
        if($invoice->status != "Paid")
        {
            $user = User::find($invoice->user_id);
            $package = Package::find($invoice->package_id);
            if($user)
            {
                $user->update([
                    'contract' => ($user->contract + $package->contract),
                    'package_id' => $package->id,
                    'expire_date' => Carbon::now()->addDays(30),
                ]);
            }
            
            $invoice->update([
                'status'=>'Paid',
                'wallet_name'=>'Manual',
                'paid_at'=>Carbon::now(),
            ]);
            Notification::create([
                'user_id'=>$invoice->user_id,
                'title'=>"Invoice Aproved",
                'message' => "Your Invoice Approved Successfully",
            ]);
            return back()->with('success','Godkänn framgångsrikt.');
        }else{
            return back()->with('success','Redan godkänd!');
        }
        
    }
    public function cancel($id)
    {
        $invoice = Invoice::findOrFail($id);
        if($invoice->status == "Pending")
        {
            $invoice->update([
                'status'=>'Cancel',
                'wallet_name'=>'Cancel',
                'paid_at'=>Carbon::now(),
            ]);

            Notification::create([
                'user_id'=>$invoice->user_id,
                'title'=>"Invoice Rejected",
                'message' => "Your Invoice Is Rejected",
            ]);
            return back()->with('warning','Faktura avvisas framgångsrikt');
            
        }else{
            return back()->with('success','Redan betalat');
        }
        return back();
    }
}
