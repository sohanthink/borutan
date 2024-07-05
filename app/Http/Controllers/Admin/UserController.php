<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateuserRequest;
use App\Http\Requests\Admin\User\UpdateuserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\Datatables\Datatables;
use illuminate\Support\Str;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role', 'User')->latest()->get();
        if (request()->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = ('<div class="btn-group" role="group" aria-label="First group">
                    <a href="' . route('admin.user.login', $row->id) . '" class="text-white btn btn-warning"><i class="lni lni-unlock"></i></a>
                    <a href="' . route('admin.user.show', $row->id) . '" class="text-white btn btn-info"><i class="lni lni-eye"></i></a>
                    <a href="' . route('admin.user.edit', $row->id) . '" class="text-white btn btn-primary"><i class="fadeIn animated bx bx-edit"></i></a>
                    <a href="' . route('admin.user.delete', $row->id) . '" class="text-white btn btn-danger"><i class="fadeIn animated bx bx-trash"></i></a>
                </div>');
                    return $actionBtn;
                })
                ->addColumn('avatar', function ($row) {
                    $avatar = (' <div class="d-flex align-items-center">
                    <img height="50"width="50" class="rounded img-fluid avatar-60 me-3" src="' . view_avater($row->image) . '" alt="" loading="lazy" />
                </div>');
                    return $avatar;
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y');
                })
                ->addColumn('name', function ($row) {
                    return '<p class="mb-0">' . $row->first_name . ' ' . $row->last_name . '</p>';
                })
                ->rawColumns(['action', 'avatar', 'created_at','name','status'])
                ->make(true);
        }

        return view('admin.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
            'city' => $request->city,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);
        if ($request->hasFile('avatar')) {
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }
        return back()->with('success','användaren skapades framgångsrikt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('admin.pages.user.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('admin.pages.user.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'status' => 'required|string',
        ]);
        $password = $request->password ? bcrypt($request->password) : $user->password;
        $request['password'] = $password;
        $user->update($request->all());
        return back()->with('success','Användare har uppdaterats framgångsrikt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $manager = User::findOrFail($id);
        $manager->delete();
        return back()->with('warning','Användaren har raderats!');
    }


    public function active(Request $request)
    {
        $user = User::findOrFail($request->id);
        if ($user->manager_id == null) {
            return;
        }
        $user->status == "Pending" ? $status = "Approved" : $status = "Pending";
        $user->update(compact('status'));
        return response([
            'status' => 'success',
            'message' => 'user Status Changes',
        ]);
    }

    public function search(Request $request)
    {
        $columns = [
            'id',
            'id',
            'id',
            'name',
            'manager',
            'balance',
            'role',
            'created_at',
            'status',
            'actions',
        ];

        // Filter Payload
        $name =  $request->name;
        $email =  $request->email;
        $manager =  $request->manager_id;
        $status =  $request->status;


        $totalData = User::where('role', 'user')->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search.value');
        $users = User::where('role', 'user')
            ->when(!empty($search), function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE', "%{$search}%");
            })
            ->when(!empty($name), function ($query) use ($name) {
                $query->where('name', 'LIKE', "%{$name}%");
            })
            ->when(!empty($email), function ($query) use ($email) {
                $query->where('email', 'LIKE', "%{$email}%");
            })
            ->when(!empty($manager), function ($query) use ($manager) {
                $query->where('manager_id', $manager);
            })
            ->when(!empty($status), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderByDesc('id')
            ->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        if (!empty($users)) {
            foreach ($users as $user) {
                $show = route('admin.user.edit', $user->id);
                $login    = route('admin.user.login', $user->id);
                if ($user->status == "Approved") {
                    $status = 'checked';
                } else {
                    $status = '';
                }

                $edit   = null;
                $delete = null;
                $edit .= $show;
                $delete .= $user->id;
                $login .= $user->id;


                $nestedData['id']           = $user->id;
                $nestedData['avatar']        = route('admin.user.show', $user->id);
                $nestedData['email']         = $user->email;
                $nestedData['roles']         = 'user';
                $nestedData['manager']         = $user->manager->name ?? "Not assign";
                $nestedData['balance']         = $user->balance;
                $nestedData['name']          = $user->name;
                $nestedData['created_at']    = $user->created_at->format('d M Y');
                $nestedData['status']        = "<div class='form-check form-switch form-check-primary'>
                <input type='checkbox' class='form-check-input get_status' id='status_$user->id' data-id='$user->id' name='status' $status>
                <label class='form-check-label' for='status_$user->id'>

                </label>
              </div>";


                $nestedData['edit']   = $edit;
                $nestedData['login']   = $login;
                $nestedData['delete'] = $delete;
                $data[]               = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data"            => $data,
        ];

        echo json_encode($json_data);
        exit();
    }

    public function login($id)
    {
        if (auth()->id() != $id) {

            session()->put('orig_user', auth()->id());

            $user = Auth::loginUsingId($id);
        }

        return redirect()->route('user.dashboard');
    }

    public function bulkAction(Request $request)
    {
        $ids = $request->ids;
        $users = User::whereIn('id', $ids)->get();
        $action = $request->action;
        if ($action == "Approved") {
            $users->each(static function ($user) {
                $user->update(['status' => 'Approved']);
            });
            $messages = "User Approved Successfully";
        } elseif ($action == "Suspend") {
            $users->each(static function ($user) {
                $user->update(['status' => 'Pending']);
            });
            $messages = "User Pending Successfully";
        } elseif ($action == "Delete") {
            $users->each(static function ($user) {
                $user->delete();
            });
            $messages = "User Deleted Successfully";
        }
        $messages = "User Deleted Successfully";
        return response([
            'status' => 'success',
            'message' => $messages,
        ]);
    }
}
