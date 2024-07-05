<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Controllers\Global\ProfileController as Profile;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Global\Profile\UpdateProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.pages.profile.index');
    }
    public function update(UpdateProfile $request)
    {
        $profile_update = new Profile();
        $profile_update->update($request);
        return back();
    }
    public function password(Request $request)
    {
        $profile_update = new Profile();
        $profile_update->password($request);
        return back();
    }
    public function image(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
        ]);
        $imageContent = file_get_contents($request->link);
        if ($imageContent === false) {
            return response()->json(['error' => 'Failed to fetch image from URL.'], 500);
        }
        $imageName = uniqid() . '_' . basename($request->link). '.png';
        $directory = public_path('uploads/user');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $filePath = $directory . '/' . $imageName;
        $save = file_put_contents($filePath, $imageContent);
        
        if ($save === false) {
            return response()->json(['error' => 'Failed to save image.'], 500);
        }
         $user = Auth::user();
         $user->update([
            'image' => $imageName,
        ]);
        return response()->json(['success' => true, 'image_path' => '/uploads/user/' . $imageName]);
    }
}
