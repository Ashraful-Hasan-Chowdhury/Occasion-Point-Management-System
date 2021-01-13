<?php

namespace App\Http\Controllers\Parlour;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use App\Models\parlourpackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return view('parlour.package.create');
    }
    public function show()
    {
        $parlour = Parlour::findorfail(auth('parlour')->id());
        $packages = $parlour->packages()->orderBy('id', 'DESC')->get();
        return view('parlour.package.show', compact('packages'));
    }

    public function store(Request $request)
    {
        $package = new parlourpackage;
        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/parlour-img/package/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }

        // Image Handler

        $package->name = $request->name;
        $package->details = $request->details;
        $package->image = $image_url;
        $package->price = $request->price;
        if ($request->discount == 'on') {
            $package->discount = 'true';
            $package->discount_price = $request->discount_price;
        } else {
            $package->discount = 'false';
        }
        $package->save();
        $package->parlours()->detach();
        $package->parlours()->sync(auth('parlour')->id());

        $notification = array(
            'message' => 'Package Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        $package = parlourpackage::findorfail($id);
        $img = $package->image;
        unlink($img);
        $package->delete();
        $notification = array(
            'message' => 'Package Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $package = parlourpackage::findorfail($id);
        return view('parlour.package.edit', compact('package'));
    }
    public function update(Request $request, $id)
    {

        $package = parlourpackage::findorfail($id);
        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/parlour-img/package/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($package->image != null) {
                $img = $package->image;
                unlink($img);
            }
        } else {
            $image_url = $request->old_image;
        }


        // Image Handler

        $package->name = $request->name;
        $package->details = $request->details;
        $package->image = $image_url;
        $package->price = $request->price;
        if ($request->discount == 'on') {
            $package->discount = 'true';
            $package->discount_price = $request->discount_price;
        } else {
            $package->discount = 'false';
        }
        $package->save();
        $package->parlours()->detach();
        $package->parlours()->sync(auth('parlour')->id());

        $notification = array(
            'message' => 'Package Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
