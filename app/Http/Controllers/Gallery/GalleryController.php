<?php

namespace App\Http\Controllers\Gallery;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageGallery;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
//    view images in show gallery page
    public function AdminViewGallery() {
        $image = ImageGallery::orderBy('created_at' , 'desc')->get();
        
        $output = '<div class="row">';
        foreach($image as $image){
            $host_name = $_SERVER['HTTP_HOST'];
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                $image_url = 'https://'.$host_name.'/'.$image->image_path;
            }
            else{
                $image_url = 'http://'.$host_name.'/'.$image->image_path;
            }
            $output .='<div class="col-sm-3 mb-2">'
                    . '<a href="/gallery/delete/image/'.$image->id.'" class="text-decoration-none">'
                    . '<button class="btn btn-danger rounded-3 top-0 position-absolute"><i class="ri-delete-bin-5-line"></i></button>'
                    . '</a>'
                    . '<a href="/gallery/view/image/'.$image->id.'" class="text-decoration-none">'
                    . '<img style="width: 100%;" src="'.$image_url.'" alt="image">'
                    . '</a>'
                    . '</div>';
        }
        $output .= '</div>';
        
        return view('admin.gallery.show_gallery',compact('image','output'));
        
    }
    
//    upload gallery images
    public function AdminUploadGallery(Request $request) {
        
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
        $user_id = $user->id;
        $image = $request->file('file');
        $imagename = hexdec(uniqid()).'-gallery-image-'.date('Y-m-d-H-i-s').'.png';
        $path = 'image/upload/gallery/';
        $move = $image->move(public_path($path), $imagename);
        $image_path = $path.$imagename;
        $host_name = $_SERVER['HTTP_HOST'];
        
        
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
            $image_url = 'https://'.$host_name.'/'.$path.$imagename;
        }
        else{
            $image_url = 'http://'.$host_name.'/'.$path.$imagename;
        }
        
        if(!$move){
            
        }
        else{
            ImageGallery::insert([
                'user_id'=>$user_id,
                'image_path'=>$image_path,
                'image_url'=>$image_url,
                'created_at'=>Carbon::now(),
            ]);
        }
        
//        return response()->json(['success' => $imagename]);
        $notification = array(
            'message' => 'Successfully Uploaded', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
    
//    delete gallery images
    public function DeleteImage($id) {
        $image = ImageGallery::findOrFail($id);
        
        if($image -> image_path !== ""){
            unlink($image -> image_path);
        }
        
        $image->delete();
        
        $notification = array(
            'message' => 'Image Deleted Successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
        
    }
    
//    view single image and url
    public function ViewImage($id) {
        $image = ImageGallery::findOrFail($id);
        return view('admin.gallery.view_image', compact('image'));
    }
}
