<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Package;
use App\Models\User;
use App\Notifications\ContactMessageReceived;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $package = Package::get();
        return view('front.page.home.index',compact('package'));
    }
    public function contact()
    {
        return view('front.page.contact.index');
    }
    public function contact_store(Request $request)
    {
      $contact =   Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        // Get the user to notify (e.g., admin)
    $admin = User::where('role', 'admin')->first(); // or you can notify multiple users

    // Send the notification
    $admin->notify(new ContactMessageReceived($contact));
        return back()->with('success','Meddelande sänt med framgång!')->with('title','Sänt');
    }
    public function pricing()
    {
        $package = Package::get();
        return view('front.page.pricing.index',compact('package'));
    }

    public function privacy()
    {
        return view('front.page.policy.privacy');
    }

    public function terms()
    {
        return view('front.page.policy.terms');
    }


}
