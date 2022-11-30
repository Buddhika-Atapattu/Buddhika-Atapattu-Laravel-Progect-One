<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\frontend\ContactUs;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogTags;
use App\Models\BlogImages;
use App\Models\BlogCategory;

class frontend_all extends Controller
{
//    index route
    public function home() {
        return view('frontend/index');
    }
//    end method
 
//    about route
    public function about() {
        return view('frontend/pages/about');
    }
//    end method
 
//    blog route
    public function blog() {
        
        $blog = DB::table('blogs')->orderBy('created_at', 'desc')->paginate(10);
        $blog_id = Blog::pluck('id');
        $user_id = Blog::pluck('user_id');
        $blog_category = BlogCategory::all();
        $blog_tags = BlogTags::all();
        $user = User::all();
        $blog_images = BlogImages::where('count_id',[1])->select('image','blog_id')->get();
//        $image_count = $blog_images->count();
//        print_r($user->id);

        return view('frontend/pages/blog',compact('user','blog','blog_category','blog_tags','blog_images'));
    }
//    end method
 
//    contact route
    public function contact() {
        return view('frontend/pages/contact');
    }
    
//    contact route
    public function shop() {
        return view('frontend/shop/shop_index');
    }
    
//    terms
    public function terms() {
        return view('frontend.terms_and_conditions');
    }
//    end method

//    blog search
    public function search(Request $request) {
        if($request->ajax()){
            $data=Blog::where('blog_title','like','%'.$request->search.'%')
            ->orwhere('blog_category','like','%'.$request->search.'%')
            ->orwhere('blog_tags','like','%'.$request->search.'%')->get();
            
            $output='';
            
            if(count($data)>0){
                $output = '<div class="row w-100">';
                foreach ($data as $blog){
                    $output .= '<div class="col-4 d-flex justify-content-center">'
                            . '<a href="/view/blog/'.$blog->id.'" class="text-center text-capitalize text-dark font-Tiro-Gurmukhi text-decoration-none">'
                            . '<p class="text-center text-capitalize text-dark font-Tiro-Gurmukhi">Title: '.$blog->blog_title.'</p>'
                            . '</a>'
                            . '</div>'
                            . '<div class="col-4 d-flex justify-content-center">'
                            . '<a href="/view/blog/'.$blog->id.'" class="text-center text-capitalize text-dark font-Tiro-Gurmukhi text-decoration-none">'
                            . '<p class="text-center text-capitalize text-dark font-Tiro-Gurmukhi">Category: '.$blog->blog_category.'</p>'
                            . '</a>'
                            . '</div>'
                            . '<div class="col-4 d-flex justify-content-center">'
                            . '<a href="/view/blog/'.$blog->id.'" class="text-center text-capitalize text-dark font-Tiro-Gurmukhi text-decoration-none">'
                            . '<p class="text-center text-capitalize text-dark font-Tiro-Gurmukhi">Tags: '.$blog->blog_tags.'</p>'
                            . '</a>'
                            . '</div>';
                    
                }
                $output .='</div>';
            }
            else{
                $output .='No results';
            }
            
            return $output;
        }
    }
    
//    view blog
    public function ViewBlog($id) {
        $blog = Blog::where('id',$id)->select()->get();
        $user = User::all();
        $blog_images = BlogImages::where('blog_id',$id)->select()->get();
        return view('frontend.pages.view_blog', compact('blog','blog_images','user'));
    }
    
    public function SendEmail(Request $request) {
        $request->validate([
            'name'=>['required', 'string', 'min:4', 'max:255' ,'regex:/^[a-zA-Z ]*$/'],
            'email'=>['required', 'string', 'max:255', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/'],
            'subject'=>'required',
            'content'=>'required',
        ],[
            'name.required'=>'Name feild cannot be empty!',
            'email.required'=>'Email feild cannot be empty!',
            'subject.required'=>'Subject feild cannot be empty!',
            'content.required'=>'Content feild cannot be empty!',
            'name.min'=>'Name should atleast 4 charecters!',
            'name.max'=>'Name should not be more then 255 charecters!',
            'name.regex'=>'Name should be text!',
            'email.max'=>'Email should not be more then 255 charecters!',
            'email.regex'=>'Email should be valid email!',
        ]);
        
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $content = $request->content;
        
        $details = [
            'subject'=>$subject,
            'body'=>$content,
            'name'=>$name,
            'email'=>$email,
        ];
        
        Mail::to('buddhika12343@gmail.com')->send(new ContactUs($details));
        
        $notification = array('message' => 'Email sent!','alert-type' => 'success');//generate notification
        return redirect()->back()->with($notification);
    }
    
}
