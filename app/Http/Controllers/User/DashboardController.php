<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\TopOffer;
use App\Models\Topuser;
use App\Models\TopCountry;
use Carbon\Carbon;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return redirect('user/apartment/create');
        $total_inquiry = Apartment::where('user_id',auth()->id())->count(); 
        $latest_inquiry = Apartment::where('user_id',auth()->id())->latest()->limit(10)->get(); 
        $pendind_inquiry = Apartment::where('user_id',auth()->id())->where('status','Pending')->count(); 
        $approved_inquiry = Apartment::where('user_id',auth()->id())->where('status','Approve')->count(); 
        $rejected_inquiry = Apartment::where('user_id',auth()->id())->where('status','Reject')->count(); 
        
        return view('user.pages.dashboard.index',
        compact(
            'total_inquiry',
            'pendind_inquiry',
            'approved_inquiry',
            'rejected_inquiry',
            'latest_inquiry',
        ));
    }


    public function rollback(Request $request)
    {

        if (!session()->has('orig_user')) {
            return back();
        }

        Auth::loginUsingId(session()->get('orig_user'));

        session()->forget('orig_user');
        if (Auth::user()->role == "Admin") {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.user.index');
    }

    public function notification()
    {
        if (request()->ajax()) {
            $data = Notification::where('user_id',auth()->id())->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = ('<div class="btn-group" role="group" aria-label="First group">
                    <a href="' . route('admin.notification.delete', $row->id) . '" class="btn btn-danger"><i class="fadeIn animated bx bx-trash"></i></a>
                </div>');
                    return $actionBtn;
                })
                ->addColumn('created_at', function ($row) {
                    $created_at = $row->created_at->diffForHumans();
                    return $created_at;
                })
                ->addColumn('title', function ($row) {
                    if($row->is_read == null)
                    {
                        $title = '<a class="fw-bold" href="'.route('user.notification.show',$row->id) .'">'.$row->title .'</a>';
                    }else{
                        $title = '<a href="'.route('user.notification.show',$row->id) .'">'.$row->title .'</a>';
                    }
                    return $title;
                })
                ->rawColumns(['action','title'])
                ->make(true);
        }
        return view('user.pages.notification.index');
    }
    public function notificationshow($id)
    {
        $notification = Notification::where('user_id',auth()->id())->where('id',$id)->firstOrFail();
            $notification->is_read = Carbon::now();
            $notification->save();
        return view('user.pages.notification.show',compact('notification'));
    }
}
