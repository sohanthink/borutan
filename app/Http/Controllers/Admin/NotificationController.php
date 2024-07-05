<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                        $title = '<a class="fw-bold" href="'.route('admin.notification.show',$row->id) .'">'.$row->title .'</a>';
                    }else{
                        $title = '<a href="'.route('admin.notification.show',$row->id) .'">'.$row->title .'</a>';
                    }
                    return $title;
                })
                ->rawColumns(['action','title'])
                ->make(true);
        }
        return view('admin.pages.notification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::latest()->get();
        return view('admin.pages.notification.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sent_to'=>'required|array',
            'title'=>'required|string',
            'message'=>'required'
        ]);
        foreach ($request->sent_to as $user) {
            if($user == "All")
            {
                $users = User::all();
                foreach ($users as $usr) {
                    Notification::create([
                        'user_id'=>$usr->id,
                        'title'=>$request->title,
                        'message'=>$request->message,
                    ]);
                }
            }
            elseif ($user == "Manager") {
                $users = User::where('role','Manager')->get();
                foreach ($users as $usr) {
                    Notification::create([
                        'user_id'=>$usr->id,
                        'title'=>$request->title,
                        'message'=>$request->message,
                    ]);
                }
            }
            elseif ($user == "user") {
                $users = User::where('role','user')->get();
                foreach ($users as $usr) {
                    Notification::create([
                        'user_id'=>$usr->id,
                        'title'=>$request->title,
                        'message'=>$request->message,
                    ]);
                }
            }
        }
        
        return back()->with('success','Avisering skapade framgångsrikt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        if($notification->user_id == auth()->id())
        {
            $notification->is_read = Carbon::now();
            $notification->save();
        }
        return view('admin.pages.notification.show',compact('notification'));
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
    public function delete($id)
    {
        Notification::findOrFail($id)->delete();
        return back()->with('warning','Ta bort framgångsrikt');
    }
}
