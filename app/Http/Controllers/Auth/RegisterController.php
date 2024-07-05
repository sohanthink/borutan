<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'check' => ['required'],
        ], [
            'first_name.required' => 'Förnamn är obligatoriskt.',
            'first_name.string' => 'Förnamnet måste vara en sträng.',
            'first_name.max' => 'Förnamnet får inte vara längre än 255 tecken.',
            'last_name.required' => 'Efternamn är obligatoriskt.',
            'last_name.string' => 'Efternamnet måste vara en sträng.',
            'last_name.max' => 'Efternamnet får inte vara längre än 255 tecken.',
            'email.required' => 'E-post är obligatoriskt.',
            'email.string' => 'E-posten måste vara en sträng.',
            'email.email' => 'E-posten måste vara en giltig e-postadress.',
            'email.max' => 'E-posten får inte vara längre än 255 tecken.',
            'email.unique' => 'E-posten är redan registrerad.',
            'password.required' => 'Lösenord är obligatoriskt.',
            'password.string' => 'Lösenordet måste vara en sträng.',
            'password.min' => 'Lösenordet måste vara minst 8 tecken långt.',
            'password.confirmed' => 'Lösenordet matchar inte bekräftelsen.',
            'check.required' => 'Kontrollfältet är obligatoriskt.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
