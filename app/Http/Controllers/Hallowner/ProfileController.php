<?php

namespace App\Http\Controllers\Hallowner;

use App\Http\Controllers\Controller;
use App\Models\Hallowner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());
        return view('hallowner.profile.profile', compact('hallowner'));
    }

    public function updatepassword(Request $request)
    {
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());
        $old_password = $request->old_password;
        if (Hash::check($request->old_password, $hallowner->password)) {
            if ($request->new_password == $request->confirm_password) {
                $hallowner->password = Hash::make($request->new_password);
                $hallowner->save();
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

    public function update(Request $request)
    {
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());

        // Image Handler
        $image_url = null;
        $image = $request->file('document');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/hallowner-img/document/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($hallowner->document != null) {
                $img = $hallowner->document;
                unlink($img);
            }
        } else {
            $image_url = $request->old_document;
        }

        $nid = null;
        $image2 = $request->file('nid');
        if ($image2) {
            $image2_name = hexdec(uniqid());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext2;
            $upload_path2 = 'public/hallowner-img/nid/';
            $nid = $upload_path2 . $image2_full_name;
            $success2 = $image2->move($upload_path2, $image2_full_name);
            if ($hallowner->nid != null) {
                $img = $hallowner->nid;
                unlink($img);
            }
        } else {
            $nid = $request->old_nid;
        }

        $hallimage = null;
        $image3 = $request->file('hallimage');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext3;
            $upload_path3 = 'public/hallowner-img/hall-img/';
            $hallimage = $upload_path3 . $image3_full_name;
            $success3 = $image3->move($upload_path3, $image3_full_name);
            if ($hallowner->hallimage != null) {
                $img = $hallowner->hallimage;
                unlink($img);
            }
        } else {
            $hallimage = $request->old_hallimage;
        }

        $image = null;
        $image4 = $request->file('image');
        if ($image4) {
            $image4_name = hexdec(uniqid());
            $ext4 = strtolower($image4->getClientOriginalExtension());
            $image4_full_name = $image4_name . '.' . $ext4;
            $upload_path3 = 'public/hallowner-img/profile-picture/';
            $image = $upload_path3 . $image4_full_name;
            $success3 = $image4->move($upload_path3, $image4_full_name);
            if ($hallowner->image != null) {
                $img = $hallowner->image;
                unlink($img);
            }
        } else {
            $image = $request->old_image;
        }


        // Image Handler

        // name image email phone nid hallname document address hallimage
        $hallowner->name = $request->name;
        $hallowner->email = $request->email;
        $hallowner->phone = $request->phone;
        $hallowner->hallname = $request->hallname;
        $hallowner->address = $request->address;
        $hallowner->document = $image_url;
        $hallowner->nid = $nid;
        $hallowner->hallimage = $hallimage;
        $hallowner->image = $image;
        $hallowner->save();

        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
