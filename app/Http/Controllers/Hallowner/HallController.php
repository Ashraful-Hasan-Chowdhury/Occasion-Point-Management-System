<?php

namespace App\Http\Controllers\Hallowner;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Hallowner;
use Illuminate\Http\Request;

class HallController extends Controller
{
    // image name address details space amount discount discount_amount
    public function index()
    {
        return view('hallowner.hall.create');
    }
    public function show()
    {
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());
        $halls = $hallowner->halls()->orderBy('id', 'DESC')->get();
        return view('hallowner.hall.show', compact('halls'));
    }

    public function store(Request $request)
    {
        $hall = new Hall;
        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/parlour-img/hall/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }

        // Image Handler
        $hall->name = $request->name;
        $hall->details = $request->details;
        $hall->address = $request->address;
        $hall->space = $request->space;
        $hall->image = $image_url;
        $hall->amount = $request->amount;
        if ($request->discount == 'on') {
            $hall->discount = 'true';
            $hall->discount_amount = $request->discount_amount;
        } else {
            $hall->discount = 'false';
        }
        $hall->save();
        $hall->owners()->detach();
        $hall->owners()->sync(auth('hallowner')->id());

        $notification = array(
            'message' => 'Hall Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        $hall = Hall::findorfail($id);
        $img = $hall->image;
        unlink($img);
        $hall->delete();
        $notification = array(
            'message' => 'Hall Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $hall = Hall::findorfail($id);
        return view('hallowner.hall.edit', compact('hall'));
    }
    public function update(Request $request, $id)
    {

        $hall = Hall::findorfail($id);
        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/parlour-img/hall/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($hall->image != null) {
                $img = $hall->image;
                unlink($img);
            }
        } else {
            $image_url = $request->old_image;
        }


        // Image Handler

        $hall->name = $request->name;
        $hall->details = $request->details;
        $hall->address = $request->address;
        $hall->space = $request->space;
        $hall->image = $image_url;
        $hall->amount = $request->amount;
        if ($request->discount == 'on') {
            $hall->discount = 'true';
            $hall->discount_amount = $request->discount_amount;
        } else {
            $hall->discount = 'false';
        }
        $hall->save();
        $hall->owners()->detach();
        $hall->owners()->sync(auth('hallowner')->id());

        $notification = array(
            'message' => 'Hall Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
