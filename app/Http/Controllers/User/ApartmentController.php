<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Area;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\Admin\ApartmentReqReceived;
use App\Notifications\ApartmentRequest;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Apartment::where('user_id',auth()->id())->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = ('<div class="btn-group" role="group" aria-label="First group">
                        <a href="' . route('user.apartment.show', $row->id) . '" class="text-white btn btn-info"><i class="lni lni-eye"></i></a>
                </div>');
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    $status = '';
                    if($row->status == "Approved")
                    {
                        $status  = '<span class="badge bg-success">'.$row->status.'</span>';
                    }
                    else{
                        $status  = '<span class="badge bg-info">'.$row->status.'</span>';
                    }
                    return $status;
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y');
                })
                ->rawColumns(['action','status','created_at'])
                ->make(true);
        }
        return view('user.pages.apartment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $areas = Area::latest()->get();
        return view('user.pages.apartment.create',compact('areas'));
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
            'type'=>'required',
            'room'=>'required',
            'size'=>'required',
            'rent'=>'required',
        ]);
        
        $user = User::where('id', auth()->id())->first();
        if($user->package_id == null) {
            return redirect(url()->route('index') . '#pricing')->with('warning', __('user/alart.we_will_find'))->with('title', __('user/alart.package_buy'));
        } elseif ($user->expire_at > Carbon::today()) {
            return redirect(url()->route('index') . '#pricing')->with('warning',__('user/alart.package_expired'))->with('title', __('user/alart.package_buy'));
        }elseif ($user->contract < 1) {
            return redirect(url()->route('index') . '#pricing')->with('warning', __('user/alart.we_will_find'))->with('title', __('user/alart.package_buy'));
        }
        
      $apartment =   Apartment::create([
            'type' => $request->type,
            'room' => $request->room,
            'size' => $request->size,
            'rent' => $request->rent,
            'location' => json_encode($request->location),
            'user_id' => auth()->id(),
        ]);
        $reciver = User::where('role',"Admin")->firstOrFail();
        Notification::create([
            'user_id'=>$reciver->id,
            'title'=>"New Inquery Added",
            'message' => "A New Inquiry Waiting For approval. <a href='" . route('admin.apartment.show',$apartment ->id) . "'>Click Here</a> for more details.",
        ]);
        
        User::where('id', auth()->id())->decrement('contract', 1);
        $user->notify(new ApartmentRequest($user));
        $reciver->notify(new ApartmentReqReceived($apartment));
        return back()->with('success',__('user/alart.inquiry_sent'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('user.pages.apartment.show',compact('apartment'));
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
