<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());
        return view('photographer.profile.profile', compact('photographer'));
    }
    public function update(Request $request)
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());

        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/photographer-img/profile-picture/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($photographer->image != null) {
                $img = $photographer->image;
                unlink($img);
            }
        } else {
            $image_url = $request->old_image;
        }

        $nid = null;
        $image2 = $request->file('nid');
        if ($image2) {
            $image2_name = hexdec(uniqid());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext2;
            $upload_path2 = 'public/photographer-img/nid/';
            $nid = $upload_path2 . $image2_full_name;
            $success2 = $image2->move($upload_path2, $image2_full_name);
            if ($photographer->nid != null) {
                $img = $photographer->nid;
                unlink($img);
            }
        } else {
            $nid = $request->old_nid;
        }

        $sampleOne = null;
        $image3 = $request->file('sampleOne');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext3;
            $upload_path3 = 'public/photographer-img/sample-img/';
            $sampleOne = $upload_path3 . $image3_full_name;
            $success3 = $image3->move($upload_path3, $image3_full_name);
            if ($photographer->sampleOne != null) {
                $img = $photographer->sampleOne;
                unlink($img);
            }
        } else {
            $sampleOne = $request->old_sampleOne;
        }

        $sampleTwo = null;
        $image4 = $request->file('sampleTwo');
        if ($image4) {
            $image4_name = hexdec(uniqid());
            $ext4 = strtolower($image4->getClientOriginalExtension());
            $image4_full_name = $image4_name . '.' . $ext4;
            $upload_path4 = 'public/photographer-img/sample-img/';
            $sampleTwo = $upload_path4 . $image4_full_name;
            $success4 = $image4->move($upload_path4, $image4_full_name);
            if ($photographer->sampleTwo != null) {
                $img = $photographer->sampleTwo;
                unlink($img);
            }
        } else {
            $sampleTwo = $request->old_sampleTwo;
        }
        // Image Handler

        $photographer->name = $request->name;
        $photographer->email = $request->email;
        $photographer->phone = $request->phone;
        $photographer->about = $request->about;
        $photographer->image = $image_url;
        $photographer->nid = $nid;
        $photographer->sampleOne = $sampleOne;
        $photographer->sampleTwo = $sampleTwo;
        $photographer->save();

        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function updatepassword(Request $request)
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());
        $old_password = $request->old_password;
        if (Hash::check($request->old_password, $photographer->password)) {
            if ($request->new_password == $request->confirm_password) {
                $photographer->password = Hash::make($request->new_password);
                $photographer->save();
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
}
