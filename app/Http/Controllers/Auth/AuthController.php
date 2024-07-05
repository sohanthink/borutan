<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\LoginLog;
use App\Models\Notification;
use App\Models\Package;
use App\Models\User;
use App\Notifications\PasswordResetNotification;
use App\Notifications\Admin\NewUserRegister;
use App\Notifications\VerifyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8|max:30'
        ]);
        $user = User::where('email',$request->email)->first();
        
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials, $request->remember)) {

                $agent = new Agent();
        
                if ($agent->isDesktop()) {
                    $device = 'Desktop';
                } elseif ($agent->isMobile()) {
                    $device = 'Mobile';
                } elseif ($agent->isTablet()) {
                    $device = 'Tablet';
                } else {
                    $device = 'Unknown';
                }
    
                LoginLog::create([
                    'role' => auth()->user()->role,
                    'user_id' => auth()->id(),
                    'ip' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'device' => $device,
                    'status' => "success",
                ]);
                if(auth()->user()->role == 'Admin')
                {
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('user.apartment.create');
                }
            }else{
                return redirect()->route('login')->with('warning',"Dina inloggningsuppgifter är felaktiga");
            };
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }

    Public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'check' => ['required'],
        ]);
        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->input('password'));
        $admin = User::where('role','Admin')->first();
        $user = User::create($requestData);
        Auth::login($user);
        
        $user->sendEmailVerificationNotification();
        $admin->notify(new NewUserRegister($user));
        
        if ($request->has('package')) {
            $package = Package::find($request->input('package'));
        
            if ($package) {
                $reciver = User::where('role',"Admin")->firstOrFail();
                Notification::create([
                    'user_id'=>$reciver->id,
                    'title'=>"New Order Placed",
                    'message' => "A New Order Placed ,Waitting For approvel",
                ]);
                Notification::create([
                    'user_id'=>$user->id,
                    'title'=>"New Order Placed Successfully",
                    'message' => "A New Order Placed Sucessfully,Let us check To approve",
                ]);
        
                $invoice = Invoice::create([
                    'user_id'=>auth()->id(),
                    'type'=>"Package",
                    'package_id'=>$package->id,
                    'status'=>"Pending",
                    'amount'=>$package->price,
                    'wallet_name'=>'Unpaid',
                ]);
                return view('front.page.payment.index',compact('invoice','package'));
            }
        }
        return redirect()->route('user.dashboard');
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $token = Str::random(60);
        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);


        $user = User::where('email', $request->email)->first();
        $user->notify(new PasswordResetNotification($user , $token));

        return back()->with('success', "Vi har mejlat din länk för att återställa ditt lösenord!")->with('title','UTMÄRKT');
    }
    public function reset_verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!$this->isValidToken($request->email, $request->token)) {
            return back()->with('warning', "Ogiltig token");
        }
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', "Lösenordsändringen lyckades")->with('title','KLART');
    }

    private function isValidToken($email, $token)
    {
        $reset = DB::table('password_resets')
                    ->where('email', $email)
                    ->where('token', $token)
                    ->first();

        // Return true if token exists and is not expired
        return $reset && !is_null($reset->created_at) && strtotime($reset->created_at) + (config('auth.passwords.users.expire') * 60) >= time();
    }
}