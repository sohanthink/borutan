<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Contact;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_inquiry = Apartment::count(); 
        $latest_inquiry = Apartment::latest()->limit(10)->get(); 
        $pendind_inquiry = Apartment::where('status','Pending')->count(); 
        $approved_inquiry = Apartment::where('status','Approve')->count(); 
        $rejected_inquiry = Apartment::where('status','Reject')->count(); 
        $total_user = User::where('role','User')->count();
        $total_subscriber = User::where('role','User')->whereNot('package_id',null)->where('contract','>',0)->where('expire_date','>',Carbon::now())->count();;
        $total_message = Contact::count();
        $total_new_message = Contact::where('is_read',null)->count();
        
        return view('admin.pages.dashboard.index',
        compact(
            'total_inquiry',
            'pendind_inquiry',
            'approved_inquiry',
            'rejected_inquiry',
            'total_user',
            'total_subscriber',
            'total_message',
            'total_new_message',
            'latest_inquiry',
        ));
    }
}
