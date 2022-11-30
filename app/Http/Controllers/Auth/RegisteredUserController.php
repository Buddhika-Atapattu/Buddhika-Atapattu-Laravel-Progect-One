<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Permission;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Image;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    
    public function test()
    {
        echo 'test';
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
//    user image crop system in edit profile page
    public function crop(Request $request) {
        $path = 'image/upload/admin_update_image/'; //define path
        $file = $request->file('profile_image');
        $milliseconds = date('s')/1000;
        $fileName = 'NG-International-UIMG'.'-'.date('Y-m-d-H-i-s-'.$milliseconds.'-').uniqid().'.png';
        $move = $file->move(public_path($path), $fileName);
        
//        checking the file path is work or not
        if(!$move){
            return response()->json(['status' => 0, 'msg' => 'Somthing went worng']);
            
        }
        else {
//            update new user image
            return response()->json(['status'=>1 , 'msg'=>$fileName, 'name'=>$fileName]);

        }
        
    }// end method
    
    public function store(Request $request)
    {
        //
//        $validated = $request->validate([
//                        'name' => ['required', 'string', 'max:255'],
//                        'username' => ['required', 'string', 'max:255', 'unique:users'],
//                        'role_id' => ['required', 'integer'],
//                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
//                    ],[
//                        'name.required'=>"Name field shouldn't be empty",
//                        'username.required'=>"Username field shouldn't be empty",
//                        'role_id.required'=>"Register as field shouldn't be empty",
//                        'email.required'=>"Email field shouldn't be empty",
//                        'password.required'=>"Password field shouldn't be empty",
//                    ]);
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255' ,'regex:/^[a-zA-Z ]*$/'],
            'email' => ['required', 'string', 'max:255', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9]{6,20}$/', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*^<>,.-_=+|])[A-Za-z\d!@#$%&*^<>,.-_=+|]{6,}$/'],
            'password_confirmation' => ['required', 'string', 'same:password', 'min:6', 'max:255'],
            'role_id'=>['required'],
            'address'=>['required'],
        ],[
            'name.required' => "Full name field wouldn't be empty!",
            'name.max' => "Only 255 characters are allowed!",
            'name.min' => "Atleast 4 characters must be entered!",
            'name.regex' => "Only text allowed!",
            'email.required' => "Email field wouldn't be empty!",
            'email.max' => "Only 255 characters are allowed!",
            'email.regex' => "Entered value should be email!",
            'email.unique' => "Email already taken!",
            'username.required' => "Username field wouldn't be empty!",
            'username.max' => "Only 255 characters are allowed!",
            'username.regex' => "For username you have to enter atleast 6 characters with capital letters, simple letters, numbers, maximum 20 characters and no special characters!",
            'username.unique' => "Username already taken!",
            'password.required' => "New password field wouldn't be empty!",
            'password_confirmation.required' => "New password confirm field wouldn't be empty!",
            'password.regex' => "New password must be minimum 6 characters, one capital letter, one speciale character ('!','@','#','$','%','^','&','*','-','_','=','+','|',',','.') and numbers!",
            'role_id.required' => "User role field wouldn't be empty!",
            'address.required' => "Address field wouldn't be empty!",
        ]);

        
        $login_status = 2;
        $status = 1;
        
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'status' => $status,
            'email' => $request->email,
            'profile_image'=>$request -> filename,
            'login_status'=>$login_status,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ]);
        
        
        $user->attachRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    
    
}
