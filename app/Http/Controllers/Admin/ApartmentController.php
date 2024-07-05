<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\ApartmentRejectNotification;
use App\Notifications\ApartmentSuccessNotification;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApartmentController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Apartment::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = ('<div class="btn-group" role="group" aria-label="First group">
                        <a href="' . route('admin.apartment.show', $row->id) . '" class="text-white btn btn-info"><i class="lni lni-eye"></i></a>
                        <a href="' . route('admin.apartment.delete', $row->id) . '" class="text-white btn btn-danger"><i class="bx bx-trash"></i></a>
                </div>');
                    return $actionBtn;
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y');
                })
                ->addColumn('status', function ($row) {
                    $status = '<select class="form-control status" id="status" data-id="'.$row->id.'">
                        <option value="Approved" '. ($row->status == 'Approved' ? 'selected' : '') .'>Approved</option>
                        <option value="Pending" '. ($row->status == 'Pending' ? 'selected' : '') .'>Pending</option>
                        <option value="Reject" '. ($row->status == 'Reject' ? 'selected' : '') .'>Reject</option>
                    </select>';
                    return $status;
                })
                ->addColumn('name', function ($row) {
                    $name = '';
                    if($row->user)
                    {
                        $name = $row->user->first_name .' '. $row->user->last_name;
                    }
                    return $name;
                })
                ->rawColumns(['action', 'created_at','name','status'])
                ->make(true);
        }
        return view('admin.pages.apartment.index');
    }

    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->update([
            'is_read'=>Carbon::now(),
        ]);
        return view('admin.pages.apartment.show',compact('apartment'));
    }
    public function delete($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return back()->with('warning','Radera framgångsrikt!');
    }
    public function status(Request $request,$id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->update([
            'status'=>$request->status
        ]);
        Notification::create([
            'user_id'=>$apartment->user->id,
            'title'=>"Inquery Status",
            'message' => "Your Inquiry is " . $request->status,
        ]);
        $user = User::find($apartment->user_id);
        if($request->status == "Reject")
        {
            $user->notify(new ApartmentRejectNotification($user));
        }elseif ($request->status == "Approved") {
            $user->notify(new ApartmentSuccessNotification($user));
        }
        return response()->json([
            'status'=>'success',
        ]);
    }
}
