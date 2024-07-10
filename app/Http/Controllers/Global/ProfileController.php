<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('global.profile.index');
    }
    public function update($request)
    {
        $user = User::find(Auth::id());
        if ($request->hasFile('avatar')) {
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->save();
        return back()->with('success',__('user/alart.profile_updated'));
    }
    
    
    
    
    
    
    
    
    public function password($request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        #Match The Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with('error','Old Password Doesnt match!');
        }
        #Update the new Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success','Password Change Successfully !');
    }
}
