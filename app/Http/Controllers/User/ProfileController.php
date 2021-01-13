<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function password()
    {
        return view('user.profile.password');
    }

    public function updatepassword(Request $request)
    {
        $user = User::findorfail(auth()->id());
        $old_password = $request->old_password;
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                $notification = array(
                    'message' => 'Password Updated Successfully!',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                return Redirect()->back()->with('message', "New Passwords did not matched!");
            }
        } else {
            return Redirect()->back()->with('message', "Old password did not matched!");
        }
    }

    public function profile()
    {
        $user = User::findorfail(auth()->id());
        return view('user.profile.profile', compact('user'));
    }
    public function updateprofile(Request $request)
    {
        $user = User::findorfail(auth()->id());
        // Image Handler
        $image = null;
        $image4 = $request->file('image');
        if ($image4) {
            $image4_name = hexdec(uniqid());
            $ext4 = strtolower($image4->getClientOriginalExtension());
            $image4_full_name = $image4_name . '.' . $ext4;
            $upload_path3 = 'public/user-img/profile-picture/';
            $image = $upload_path3 . $image4_full_name;
            $success3 = $image4->move($upload_path3, $image4_full_name);
            if ($user->image != null) {
                $img = $user->image;
                unlink($img);
            }
        } else {
            $image = $request->old_image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $image;
        $user->save();

        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
