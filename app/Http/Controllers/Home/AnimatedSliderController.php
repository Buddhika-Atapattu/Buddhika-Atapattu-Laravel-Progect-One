<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnimatedSliderImages;
use App\Models\AnimatedSliderText;
use App\Models\selected_animation;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Image;
use DB;

class AnimatedSliderController extends Controller
{
//    animated slider route method
    public function animatedSlider(){
        $selectedAnimation = selected_animation::find(1);//get home slide id
        return view('admin.homeSlide.animated_slider', compact('selectedAnimation'));
    }
//    end animated slider route method
    
//    animated slider upload method
    public function updateAnimated(Request $request) {
        
        
        
//        define table and count
        $table = AnimatedSliderImages::all();
        $tableCount = (int)$table->count();
        
        $created = date('Y-m-d-H-i-s');
        
//        selected animation table id
        $selectedID = $request->selectedID;
        
//        form selected animation id
        $styleID = $request -> animation_style;
        
//        define file path
        $definePath = 'image/upload/animatedSlide/uploadedimages/';
        
//        count files in the directory
        $allFileAmount = (int)count(File::allFiles($definePath));
        
//        get all files in the directory
        $allFile = File::allFiles($definePath);
        
//        check whether file input has file
        if($request ->hasFile('image')){
            
            $textID = 1;
            $textRow = AnimatedSliderText::findOrFail($textID);
            
            $title = $request -> title;
            $subTitle = $request -> sub_title;
            $content = $request -> content;
            
            $textRow->update([
                'title' => $title,
                'sub_title' => $subTitle,
                'content' => $content,
            ]);
            
//            check whether folder and table has file or not
            if(($allFileAmount !== 0) || ($tableCount !== 0)){
                
//                delete all file in the derectory
                File::delete($allFile);
                
//                delete all rows in the table
                AnimatedSliderImages::truncate();
                
//                foreach for image uploading if there is any file in the folder and table
                foreach($request -> file('image') as $file){
//                    define file name
                    $filename = hexdec(uniqid()).'-'.date('YmdHis').'.png';
                    $path = 'image/upload/animatedSlide/uploadedimages/';

////                    get file saved directory
//                    $savedDirectory = $definePath.$filename;
                    $savedDirectory = $file->move(public_path($path), $filename);
                    $filepath = $path.$filename;
                    
//                    check whether file move to the directory
                    if(!$savedDirectory){
                        $notification = array('message' => 'Images dose not move to the directory','alert-type' => 'denger');//generate notification
                        return redirect()->back()->with($notification);//return to the home slide page with notification
                    }
                    else{
                        
                        $data = array(
                            'selected_animation_id'=>$selectedID,
                            'animation_main_section_id'=>$styleID,
                            'image'=>$filepath,
                            'created_at'=>$created,
                            'updated_at'=>$created,
                        );
                        
                        DB::table('animated_slider_images')->insert($data);
                    }
//                    end check whether file move to the directory
                }
//                end foreach for image uploading if there is any file in the folder and table
                $notification = array('message' => 'Animate images uploaded successfully with text','alert-type' => 'success');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification
            }
            else{
//                foreach for image uploading if not any file in folder and table
                foreach($request -> file('image') as $file){
//                    define file name
                    $filename = hexdec(uniqid()).'-'.date('YmdHis').'.png';
                    $path = 'image/upload/animatedSlide/uploadedimages/';
//                    get image orientation, widht and height
                    $orientation = getimagesize($file);

//                    get file saved directory
//                    $savedDirectory = $definePath.$filename;
                    $savedDirectory = $file->move(public_path($path), $filename);
                    $filepath = $path.$filename;

//                    check whether file move to the directory
                    if(!$savedDirectory){
                        $notification = array('message' => 'Images dose not move to the directory','alert-type' => 'denger');//generate notification
                        return redirect()->back()->with($notification);//return to the home slide page with notification
                    }
                    else{
                        
                        $data = array(
                            'selected_animation_id'=>$selectedID,
                            'animation_main_section_id'=>$styleID,
                            'image'=>$filepath,
                            'created_at'=>$created,
                            'updated_at'=>$created,
                        );
                        
                        DB::table('animated_slider_images')->insert($data);
                    }
//                    end check whether file move to the directory
                }
//                end foreach for image uploading if not any file in folder and table
                
//                notification for image upload successfully
                $notification = array('message' => 'Animate images uploaded successfully with text.','alert-type' => 'success');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification
            }
//            end check whether folder and table has file or not
        }
        else{
            
            $textID = 1;
            $textRow = AnimatedSliderText::findOrFail($textID);
            
            $title = $request -> title;
            $subTitle = $request -> sub_title;
            $content = $request -> content;
            
            $textRow->update([
                'title' => $title,
                'sub_title' => $subTitle,
                'content' => $content,
            ]);
//            error message for image uploading
            $notification = array('message' => 'Animation section uploaded without images','alert-type' => 'warning');//generate notification
            return redirect()->back()->with($notification);//return to the home slide page with notification
        }
//        end check whether file input has file   
    }
//    end animated slider upload method
}
//end class
