<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('photographer.portfolio.create');
    }

    public function show()
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());
        $portfolios = $photographer->portfolios()->orderBy('id', 'DESC')->get();
        return view('photographer.portfolio.show', compact('portfolios'));
    }

    public function store(Request $request)
    {
        // $photographer = Photographer::findorfail(auth('photographer')->id());
        $portfolio = new Portfolio;
        // Image Handler
        $image_url = null;
        $image = $request->file('imageone');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/photographer-img/portfolio/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            // if ($portfolio->imageone != null) {
            //     $img = $portfolio->imageone;
            //     unlink($img);
            // }
        } else {
            // $image_url = $request->old_imageone;
        }

        $imagetwo = null;
        $image2 = $request->file('imagetwo');
        if ($image2) {
            $image2_name = hexdec(uniqid());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext2;
            $upload_path2 = 'public/photographer-img/portfolio/';
            $imagetwo = $upload_path2 . $image2_full_name;
            $success2 = $image2->move($upload_path2, $image2_full_name);
            // if ($portfolio->imagetwo != null) {
            //     $img = $portfolio->imagetwo;
            //     unlink($img);
            // }
        } else {
            // $imagetow = $request->old_imagetwo;
        }

        $imagethree = null;
        $image3 = $request->file('imagethree');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext3;
            $upload_path3 = 'public/photographer-img/portfolio/';
            $imagethree = $upload_path3 . $image3_full_name;
            $success3 = $image3->move($upload_path3, $image3_full_name);
            // if ($portfolio->imagethree != null) {
            //     $img = $portfolio->imagethree;
            //     unlink($img);
            // }
        } else {
            // $imagethree = $request->old_imagethree;
        }

        $imagefour = null;
        $image4 = $request->file('imagefour');
        if ($image4) {
            $image4_name = hexdec(uniqid());
            $ext4 = strtolower($image4->getClientOriginalExtension());
            $image4_full_name = $image4_name . '.' . $ext4;
            $upload_path4 = 'public/photographer-img/portfolio/';
            $imagefour = $upload_path4 . $image4_full_name;
            $success4 = $image4->move($upload_path4, $image4_full_name);
            // if ($portfolio->imagefour != null) {
            //     $img = $portfolio->imagefour;
            //     unlink($img);
            // }
        } else {
            // $imagefour = $request->old_imagefour;
        }
        // Image Handler

        $portfolio->title = $request->title;
        $portfolio->details = $request->details;
        $portfolio->imageone = $image_url;
        $portfolio->imagetwo = $imagetwo;
        $portfolio->imagethree = $imagethree;
        $portfolio->imagefour = $imagefour;
        $portfolio->save();
        $portfolio->photographers()->detach();
        $portfolio->photographers()->sync(auth('photographer')->id());

        $notification = array(
            'message' => 'Portfolio Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findorfail($id);
        $imgone = $portfolio->imageone;
        $imgtwo = $portfolio->imagetwo;
        $imgthree = $portfolio->imagethree;
        $imgfour = $portfolio->imagefour;
        unlink($imgone);
        unlink($imgtwo);
        unlink($imgthree);
        unlink($imgfour);
        $portfolio->delete();
        $notification = array(
            'message' => 'Portfolio Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $portfolio = Portfolio::findorfail($id);
        return view('photographer.portfolio.edit', compact('portfolio'));
    }
    public function update(Request $request, $id)
    {

        $portfolio = Portfolio::findorfail($id);
        // Image Handler
        $image_url = null;
        $image = $request->file('imageone');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/photographer-img/portfolio/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($portfolio->imageone != null) {
                $img = $portfolio->imageone;
                unlink($img);
            }
        } else {
            $image_url = $request->old_imageone;
        }

        $imagetwo = null;
        $image2 = $request->file('imagetwo');
        if ($image2) {
            $image2_name = hexdec(uniqid());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext2;
            $upload_path2 = 'public/photographer-img/portfolio/';
            $imagetwo = $upload_path2 . $image2_full_name;
            $success2 = $image2->move($upload_path2, $image2_full_name);
            if ($portfolio->imagetwo != null) {
                $img = $portfolio->imagetwo;
                unlink($img);
            }
        } else {
            $imagetwo = $request->old_imagetwo;
        }

        $imagethree = null;
        $image3 = $request->file('imagethree');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext3;
            $upload_path3 = 'public/photographer-img/portfolio/';
            $imagethree = $upload_path3 . $image3_full_name;
            $success3 = $image3->move($upload_path3, $image3_full_name);
            if ($portfolio->imagethree != null) {
                $img = $portfolio->imagethree;
                unlink($img);
            }
        } else {
            $imagethree = $request->old_imagethree;
        }

        $imagefour = null;
        $image4 = $request->file('imagefour');
        if ($image4) {
            $image4_name = hexdec(uniqid());
            $ext4 = strtolower($image4->getClientOriginalExtension());
            $image4_full_name = $image4_name . '.' . $ext4;
            $upload_path4 = 'public/photographer-img/portfolio/';
            $imagefour = $upload_path4 . $image4_full_name;
            $success4 = $image4->move($upload_path4, $image4_full_name);
            if ($portfolio->imagefour != null) {
                $img = $portfolio->imagefour;
                unlink($img);
            }
        } else {
            $imagefour = $request->old_imagefour;
        }
        // Image Handler

        $portfolio->title = $request->title;
        $portfolio->details = $request->details;
        $portfolio->imageone = $image_url;
        $portfolio->imagetwo = $imagetwo;
        $portfolio->imagethree = $imagethree;
        $portfolio->imagefour = $imagefour;
        $portfolio->save();
        $portfolio->photographers()->detach();
        $portfolio->photographers()->sync(auth('photographer')->id());

        $notification = array(
            'message' => 'Portfolio Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
