<?php

namespace App\Http\Controllers;
    
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogTags;
use App\Models\BlogImages;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
//    view all blog category
    public function AllBlogCategory() {
//        define user
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
//        get all data from blog category table
        $blog_category = BlogCategory::orderBy('created_at' , 'desc')->get();
        return view('admin.blog.all_blog_category', compact('blog_category','user'));
    }
//    end
    
//    add new blog category
    public function AddBlogCategory() {
//        route return for add blog category
        return view('admin.blog.add_blog_category');
    }
//    end
    
//    view all blog content
    public function AllBlogContent() {
//        define user
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
//        get all data from blog table
        $blog = Blog::orderBy('created_at', 'desc')->get();
//        route return to all blog content page
        return view('admin.blog.all_blog_content', compact('user','blog'));
    }
//    end
    
//    add new blog content
    public function AddBlogContent() {
//        get all blog category data to blog content page
        $blog_category = BlogCategory::orderBy('blog_category','ASC')->get();
//        get all data from blog tag table
        $blog_tags = BlogTags::all();
//        route return to add blog content page
        return view('admin.blog.add_blog_content', compact('blog_category','blog_tags'));
    }
//    end
    
//    view all blog tags
    public function AllBlogTags() {
//        define user
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
//        get blog tag data to all blog tag page
        $blog_tag = BlogTags::orderBy('created_at' , 'desc')->get();
        return view('admin.blog.all_blog_tags', compact('blog_tag','user'));
    }
//    end
    
//    add new blog tags
    public function AddBlogTags() {
//        route return for add blog tag
        return view('admin.blog.add_blog_tags');
    }
//    end
    
//    insert blog category
    public function StoreBlogCategory(Request $request) {
//        check whether the input text is existed in blog category table
        if(BlogCategory::where('blog_category', 'LIKE','%'.$request->blog_category.'%')->count()>0){
//            return notification
            $error = array(
                'message' => 'Entered blog category name is existed in database.', 
                'alert-type' => 'error'
            );

            return redirect()->route('add.blog.category')->with($error);
        }
        else{
//            validate input field
            $request->validate([
                'blog_category' => 'required' 

            ],[

                'blog_category.required' => 'Blog Cateogry Name Field is Required',

            ]);
            
//            insert blog category
            BlogCategory::insert([
                    'blog_category' => $request->blog_category,
                    'created_at'=>Carbon::now(),
                ]); 
            
//            return notification
            $notification = array(
                'message' => 'Blog Category Inserted Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog.category')->with($notification);
        }
       
    }
//    end
    
//    edit category
    public function EditBlogCategory($id) {
//        return to edit blog category
        $blog_edit_category = BlogCategory::findOrFail($id);
        return view('admin.blog.edit_blog_category_name', compact('blog_edit_category'));
    }
//    end
    
//    update blog category name
    public function UpdateBlogCategory(Request $request, $id) {
//        validate input field
        $request->validate([
            'blog_category' => 'required' 

        ],[

            'blog_category.required' => 'Blog Cateogry Name Field is Required',

        ]);
        
//        update blog category
        BlogCategory::findOrFail($id)->update([
                'blog_category' => $request->blog_category,
            ]); 
        
//        return notification
        $notification = array(
            'message' => 'Blog Category Updated Successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.blog.category')->with($notification);
    }
//    end
    
//    delete blog category
    public function DeleteBlogCategory($id) {
//        delete blog category
        BlogCategory::findOrFail($id)->delete();
        
//        return notification
        $notification = array(
            'message' => 'Blog Category Deleted Successfully', 
            'alert-type' => 'warning'
        );
        
        return redirect()->back()->with($notification);
    }
//    end
    
//    insert blog tag
    public function StoreBlogTag(Request $request) {
//        check whether the input text is exist in tag table
        if(BlogTags::where('tag_name', 'LIKE','%'.$request->tag_name.'%')->count()>0){
//            return error notification
            $error = array(
                'message' => 'Entered blog tag name is existed in database.', 
                'alert-type' => 'error'
            );

            return redirect()->back()->with($error);
            
        }
        else{
//            validate input field
            $request->validate([
                    'tag_name' => 'required' 

            ],[

                'tag_name.required' => 'Blog Tag Name Field is Required',

            ]);
            
//            insert blog tag
            BlogTags::insert([
                    'tag_name' => $request->tag_name,
                    'created_at'=>Carbon::now(),
                ]); 
            
//            return notification
            $notification = array(
                'message' => 'Blog Tag Inserted Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog.tags')->with($notification);
        }
            
    }
//    end
    
//    edit blog tag
    public function EditBlogTag($id) {
//        return to edit blog tag name page
        $blog_edit_tag = BlogTags::findOrFail($id);
        return view('admin.blog.edit_blog_tag_name', compact('blog_edit_tag'));
    }
//    end
    
//    update blog tag
    public function UpdateBlogTag(Request $request, $id) {
//        validate input field
        $request->validate([
            'tag_name' => 'required' 

        ],[

            'tag_name.required' => 'Blog Tag Name Field is Required',

        ]);
        
//        update tag name
        BlogTags::findOrFail($id)->update([
                'tag_name' => $request->tag_name,
            ]); 
        
//        return notification
        $notification = array(
            'message' => 'Blog Tag Updated Successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.blog.tags')->with($notification);
    }
//    end
    
//    delete blog category
    public function DeleteBlogTag($id) {
//        delete blog tag
        BlogTags::findOrFail($id)->delete();
        
//        return notification
        $notification = array(
            'message' => 'Blog Category Deleted Successfully', 
            'alert-type' => 'warning'
        );
        
        return redirect()->back()->with($notification);
    }
//    end
    
//    store content
    public function StoreBlogContent(Request $request) {
//        validate input field
        $request->validate([
            'blog_category' => 'required', 
            'title' => 'required', 
            'content' => 'required', 

        ],[

            'blog_category.required' => 'Please select blog category',
            'title.required' => 'Title field is required',
            'content.required' => 'Content field is required',

        ]);
        
//        user id
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
        $user_id = $user->id;
//        take category id and name
        $category_id = (int)$request-> blog_category;
        $category = BlogCategory::where('id',$category_id)->pluck('blog_category')->first();
//        title
        $title = $request-> title;
//        get youtube url from input field
        $url = $request -> video_url;
//        get tags from input field
        $tags = $request -> tags;
//        turn into array
        $tags_explode = explode(',',$tags);
//        get content form input field
        $content = $request->content;
//        check whether url is in correct format and empty or not
        if(($url !== "") && (filter_var($url, FILTER_VALIDATE_URL))){
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            $youtubeURLID = $match[1];//youtube video id
        }
        else{
            $youtubeURLID = "";
        }
        
        foreach ($tags_explode as $tag){
            if(BlogTags::where('tag_name', 'LIKE','%'.$tag.'%')->count()>0){
//                inserted tag name
                $old_tag = $tag;
            }
            else{
                if($tag !== ""){
//                    insert new tags
                    BlogTags::insert([
                        'tag_name' => $tag,
                        'created_at'=>Carbon::now(),
                    ]);
                }
            }
        }
        
//        insert new blog
        $blog = Blog::insert([
            'user_id' => $user_id,
            'blog_category' => $category,
            'blog_title' => $title,
            'blog_tags' => $tags,
            'blog_content' => $content,
            'blog_video_url' => $youtubeURLID,
            'created_at'=>Carbon::now(),
        ]);
        
//        get blog last inserted row id
        $blog_id = DB::getPdo()->lastInsertId();
        
        if($request->hasFile('image')){
            for($i = 0; $i < count($request->image); $i++){
//                image count id
                $count = $i + 1;
//                take file
                $file = $request->image[$i];
//                rename file name
                $filename = hexdec(uniqid()).'-'.date('Y-m-d-H-i-s').'.png';
//                path
                $path = 'image/upload/blog/';
//                save directory
                $savedDirectory = $file->move(public_path($path), $filename);
                
//                file path for database
                $filepath = $path.$filename;
                
//                chech whether file move to the file directory
                if(!$savedDirectory){
                    $notification = array('message' => 'Images dose not move to the directory','alert-type' => 'denger');//generate notification
                    return redirect()->back()->with($notification);//return to the home slide page with notification
                }
                else{
//                    insert blog images
                    BlogImages::insert([
                        'blog_id' => $blog_id,
                        'image' => $filepath,
                        'count_id' => $count,
                        'created_at'=>Carbon::now(),
                    ]);
                }
            }
           
        }
        
//        return notification
        $notification = array('message' => 'Blog inserted successfully','alert-type' => 'success');//generate notification
        return redirect()->route('all.blog.content')->with($notification);//return to the home slide page with notification
    }
//    end
    
//    edit blog
    public function EditBlog($id) {
//        user id
        $auth_id = Auth::user() -> id;//get user id
        $user = User::find($auth_id);
        $user_id = $user->id;
//        find blog
        $blog = Blog::findOrFail($id);
//        get all blog category
        $blog_category = BlogCategory::orderBy('blog_category','ASC')->get();
//        get blog images
        $blog_images = BlogImages::where('blog_id',$id)->select('id','image','count_id')->get();
        return view('admin.blog.edit_blog_content',compact('user_id','blog','blog_category','blog_images'));
        
    }
//    end
    
//    delete blog image
    public function DeleteBlogImage($id) {
//        delete blog image
        BlogImages::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Blog Image Deleted Successfully', 
            'alert-type' => 'warning'
        );
        
        return redirect()->back()->with($notification);
    }
//    end
    
//    update blog
    public function UpdateBlog(Request $request,$id) {
        //        validate input field
        $request->validate([
            'blog_category' => 'required', 
            'title' => 'required', 
            'content' => 'required', 

        ],[

            'blog_category.required' => 'Please select blog category',
            'title.required' => 'Title field is required',
            'content.required' => 'Content field is required',

        ]);
        
//        find blog row
        $blog = Blog::findOrFail($id);
//        blog row id
        $blog_id = $blog->id;
//        user id
        $auth_id = Auth::user() -> id;//get user id
        $user = User::find($auth_id);
        $user_id = $user->id;
//        take category id and name
        $category_id = (int)$request-> blog_category;
        $category = BlogCategory::where('id',$category_id)->pluck('blog_category')->first();
//        title
        $title = $request-> title;
//        video url
        $url = $request -> video_url;
//        tags
        $tags = $request -> tags;
//        tags convert into array
        $tags_explode = explode(',',$tags);
//        content
        $content = $request->content;
//        check whether url is in correct format and empty or not
        if(($url !== "") && (filter_var($url, FILTER_VALIDATE_URL))){
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            $youtubeURLID = $match[1];//youtube video id
        }
        else{
            $youtubeURLID = "";
        }
        
//        check whether input tags are already inserted or not if not it will insert new tags
        foreach ($tags_explode as $tag){
            if(BlogTags::where('tag_name', 'LIKE','%'.$tag.'%')->count()>0){
                $old_tag = $tag;
            }
            else{
                if($tag !== ""){
                    BlogTags::insert([
                        'tag_name' => $tag,
                        'created_at'=>Carbon::now(),
                    ]);
                }
            }
        }
        
//        update blog row
        $blog->update([
            'user_id' => $user_id,
            'blog_category' => $category,
            'blog_title' => $title,
            'blog_tags' => $tags,
            'blog_content' => $content,
            'blog_video_url' => $youtubeURLID,
        ]);
        

        
//        chech file has file
        if($request->hasFile('image')){
            for($i = 0; $i < count($request->image); $i++){
                
                $row_count = DB::table('blog_images')->where('blog_id',$id)->count();
                $count = $row_count + 1 + $i;
                $file = $request->image[$i];//image file
                $filename = hexdec(uniqid()).'-'.date('Y-m-d-H-i-s').'.png';//rename image name
                $path = 'image/upload/blog/';//file path
                $savedDirectory = $file->move(public_path($path), $filename);//save directory
                
//                upload file path
                $filepath = $path.$filename;
                
//                check file is move to the directory
                if(!$savedDirectory){
                    $notification = array('message' => 'Images dose not move to the directory','alert-type' => 'denger');//generate notification
                    return redirect()->back()->with($notification);//return to the home slide page with notification
                }
                else{
//                    insert new images
                    BlogImages::insert([
                        'blog_id' => $blog_id,
                        'image' => $filepath,
                        'count_id' => $count,
                        'created_at'=>Carbon::now(),
                    ]);
                }
            }
           
        }
        
//        return notification
        $notification = array('message' => 'Blog Updated successfully','alert-type' => 'success');//generate notification
        return redirect()->route('all.blog.content')->with($notification);//return to the home slide page with notification
    }
//    end
    
//    delete blog
    public function DeleteBlog($id) {
//        find blog image rows
        $blog_images = BlogImages::where('blog_id',$id)->pluck('image');
        foreach ($blog_images as $image){
            if($image !== ""){
//                delete images in the folder
                unlink($image);
            }
//            delete images where blod id equal
            BlogImages::where('blog_id',$id)->delete();
        }
//        delete blog
        Blog::findOrFail($id)->delete();
        
//        return notification
        $notification = array(
            'message' => 'Blog Deleted Successfully', 
            'alert-type' => 'warning'
        );
        
        return redirect()->back()->with($notification);
        
    }
//    end
}
