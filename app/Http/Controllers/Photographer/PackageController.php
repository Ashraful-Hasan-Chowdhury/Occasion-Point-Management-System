<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\Photographerpackage;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return view('photographer.package.create');
    }
    public function show()
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());
        $packages = $photographer->packages()->orderBy('id', 'DESC')->get();
        return view('photographer.package.show', compact('packages'));
    }

    public function store(Request $request)
    {
        $package = new Photographerpackage;
        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/photographer-img/package/';
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
        $package->photographers()->detach();
        $package->photographers()->sync(auth('photographer')->id());

        $notification = array(
            'message' => 'Package Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        $package = Photographerpackage::findorfail($id);
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
        $package = Photographerpackage::findorfail($id);
        return view('photographer.package.edit', compact('package'));
    }
    public function update(Request $request, $id)
    {

        $package = Photographerpackage::findorfail($id);
        // Image Handler
        $image_url = null;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/photographer-img/package/';
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
        $package->photographers()->detach();
        $package->photographers()->sync(auth('photographer')->id());

        $notification = array(
            'message' => 'Package Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
