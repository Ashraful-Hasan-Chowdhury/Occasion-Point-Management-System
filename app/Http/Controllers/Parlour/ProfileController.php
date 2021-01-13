<?php

namespace App\Http\Controllers\Parlour;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $parlour = Parlour::findorfail(auth('parlour')->id());
        return view('parlour.profile.profile', compact('parlour'));
    }

    public function updatepassword(Request $request)
    {
        $parlour = Parlour::findorfail(auth('parlour')->id());
        $old_password = $request->old_password;
        if (Hash::check($request->old_password, $parlour->password)) {
            if ($request->new_password == $request->confirm_password) {
                $parlour->password = Hash::make($request->new_password);
                $parlour->save();
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
        $parlour = Parlour::findorfail(auth('parlour')->id());

        // Image Handler
        $image_url = null;
        $image = $request->file('document');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/parlour-img/document/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($parlour->document != null) {
                $img = $parlour->document;
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
            $upload_path2 = 'public/parlour-img/nid/';
            $nid = $upload_path2 . $image2_full_name;
            $success2 = $image2->move($upload_path2, $image2_full_name);
            if ($parlour->nid != null) {
                $img = $parlour->nid;
                unlink($img);
            }
        } else {
            $nid = $request->old_nid;
        }

        $parlourimage = null;
        $image3 = $request->file('parlourimage');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext3;
            $upload_path3 = 'public/parlour-img/parlour-img/';
            $parlourimage = $upload_path3 . $image3_full_name;
            $success3 = $image3->move($upload_path3, $image3_full_name);
            if ($parlour->parlourimage != null) {
                $img = $parlour->parlourimage;
                unlink($img);
            }
        } else {
            $parlourimage = $request->old_parlourimage;
        }

        $image = null;
        $image4 = $request->file('image');
        if ($image4) {
            $image4_name = hexdec(uniqid());
            $ext4 = strtolower($image4->getClientOriginalExtension());
            $image4_full_name = $image4_name . '.' . $ext4;
            $upload_path3 = 'public/parlour-img/profile-picture/';
            $image = $upload_path3 . $image4_full_name;
            $success3 = $image4->move($upload_path3, $image4_full_name);
            if ($parlour->image != null) {
                $img = $parlour->image;
                unlink($img);
            }
        } else {
            $image = $request->old_image;
        }


        // Image Handler

        // name email phone nid parlourname document address parlourimage
        $parlour->name = $request->name;
        $parlour->email = $request->email;
        $parlour->phone = $request->phone;
        $parlour->parlourname = $request->parlourname;
        $parlour->address = $request->address;
        $parlour->document = $image_url;
        $parlour->nid = $nid;
        $parlour->parlourimage = $parlourimage;
        $parlour->image = $image;
        $parlour->save();

        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
