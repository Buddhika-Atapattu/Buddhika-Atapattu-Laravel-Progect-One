<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Image;

class HomeSliderController extends Controller
{
    
//    home slider route method
    public function homeSlider(){
        $homeSlider = HomeSlide::find(1);//get home slide id
        return view('admin.homeSlide.home_slide_all', compact('homeSlider'));
    }
//    end home slider route method 
    
//    home slider update method
    public function updateSlider(Request $request){
        $slide_id = $request -> id;
        
        if($request -> file('home_slide')){
            $slideId = HomeSlide::findOrFail($slide_id);//define home slide id
            $image = $request -> file('home_slide');//get home slide image data
            $imageName = hexdec(uniqid()).'.'.'png';//define image name
            
            $path = 'image/upload/homeSlide/uploadedImage/'; //define path
            
//            get image orientation, widht and height
            $orientation = getimagesize($image);
            $width = $orientation[0];
            $height = $orientation[1];
            
//            echo $width." ".$height;
            
            if($width > $height){
                Image::make($image)->resize(900,600)->save($path.$imageName);//resize the image
            }
            else{
                Image::make($image)->resize(600,900)->save($path.$imageName);//resize the image
            }
            
            $saveURL = $path.$imageName;//path define with image name
            
//            checking the file path is work or not
            if(!$saveURL){
                return response()->json(['status' => 0, 'msg' => 'Somthing went worng']);
            }
            else {
//                delete old image if existed
                $oldImage = $slideId->home_slide;
                if($oldImage != ''){
                    unlink($oldImage);// removing the current file and store new one
                }
//                update new home slide
                
                $url = $request->video_url;//get typed video url
                
//                get only youtube video id
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                
                $youtubeURLID = $match[1];//youtube video id
                
//                update homeSlide table with image
                
                $title = $request->title;
                $rTitle = str_replace("'", "\'", $title);
                
                $subTitle = $request->short_title;
                $rSubTitle = str_replace("'", "\'", $subTitle);
                
                $slideId->update([
                    'title' => $rTitle,
                    'short_title' => $rSubTitle,
                    'video_url' => $youtubeURLID,
                    'home_slide' => $saveURL,
                ]);
                
                $slideId->save(); // saving data
                $notification = array('message' => 'Home slide successfully updated with image','alert-type' => 'success');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification

            }
        }
        else{
//            get typed url
            $url = $request->video_url;
            
//            get only youtube video id
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

            $youtubeURLID = $match[1];//youtube video id
            
//            update homeSlide table without image
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $youtubeURLID,
            ]);
            
            $notification = array('message' => 'Home slide successfully updated without image','alert-type' => 'success');//generate notification
            return redirect()->back()->with($notification);//return to the home slide page with notification
        }
    }
//    end home slider update method
}
