<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\LoginStatus;
use App\Models\Role;
use Barryvdh\DomPDF\PDF;


class UserController extends Controller
{
    
    public function AdminUserView() {
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
        $all_user = User::orderBy('created_at' , 'desc')->get();
        return view('admin.user.view_all_user', compact('user','all_user'));
    }
    
    public function AdminUserAdd() {
        $role = Role::all();
        $status = UserStatus::all();
        $login_status = LoginStatus::all();
        return view('admin.user.add_new_user',compact('role','status','login_status'));
    }
    
    public function AdminUserEdit($id) {
        $user = User::findOrFail($id);
        $role = Role::all();
        $status = UserStatus::all();
        return view('admin.user.edit_user',compact('user','status','role'));
    }
    
    public function AdminUpdateUser(Request $request,$id) {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255' ,'regex:/^[a-zA-Z ]*$/'],
            'email' => ['required', 'string', 'max:255', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/'],
            'username' => ['required', 'string', 'max:255', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9]{6,20}$/'],
            'address' => ['required'],
        ],[
            'name.required' => "Full name field wouldn't be empty!",
            'email.required' => "Email field wouldn't be empty!",
            'username.required' => "Username field wouldn't be empty!",
            'name.max' => "Only 255 characters are allowed!",
            'name.min' => "Atleast 4 characters must be entered!",
            'name.regex' => "Only text allowed!",
            'email.max' => "Only 255 characters are allowed!",
            'email.regex' => "Entered value should be email!",
            'username.max' => "Only 255 characters are allowed!",
            'username.regex' => "For username you have to enter atleast 6 characters with capital letters, simple letters, numbers, maximum 20 characters and no special characters!",
            'address.required' => "Address field wouldn't be empty!",
        ]);
        
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;
        $user_status = $request->status;
        $role_id = $request->role_id;
        $address = $request->address;
        
        $user = User::findOrFail($id);
        
        $user->update([
            'name'=>$name,
            'role_id'=>$role_id,
            'status'=>$user_status,
            'email'=>$email,
            'username'=>$username,
            'address'=>$address,
        ]);
        
        $notification = array('message' => 'User successfully updated','alert-type' => 'success');//generate notification
        return redirect()->route('admin.user.view')->with($notification);//return to the home slide page with notification
    }
    
    public function AdminUserDelete($id) {
//        delete user
        User::findOrFail($id)->delete();
        
//        return notification
        $notification = array(
            'message' => 'User Deleted Successfully', 
            'alert-type' => 'warning'
        );
        
        return redirect()->back()->with($notification);
    }
    
    public function AdminResetPassword($id) {
        $user = User::findOrFail($id);
        $login_status = LoginStatus::all();
        return view('admin.user.reset_password', compact('user','login_status'));
    }
    
    public function AdminUpdateResetPassword(Request $request,$id) {
        $request->validate([
            'newPassword' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*^<>,.-_=+|])[A-Za-z\d!@#$%&*^<>,.-_=+|]{6,}$/'],
            'confirmPassword' => ['required', 'string', 'same:newPassword', 'min:6', 'max:255'],
            'login_status' => ['required'],
        ],[
            'newPassword.required' => "New password field wouldn't be empty!",
            'confirmPassword.required' => "New password confirm field wouldn't be empty!",
            'login_status.required' => "Login status wouldn't be empty!",
            'newPassword.regex' => "New password must be minimum 6 characters, one capital letter, one speciale characters ('!','@','#','$','%','^','&','*','-','_','=','+','|',',','.') and numbers!",
        ]);
        
        
        $new = base64_encode($request->newPassword);
        $confirm = $request->confirmPassword;
        $statut = $request->login_status;
        
        
        $users = User::findOrFail($id);
        $users -> password = bcrypt($request->newPassword);
        $users -> login_status = $request->login_status;
        $users -> save();
//        session()->flash('message','Password is successfully updated.');
        $notification = array('message' => 'Password successfully reseted','alert-type' => 'success');//generate notification
        return view('admin.user.view_reset_password', compact('users','new', 'statut'))->with($notification);//return to the home slide page with notification
//        return redirect()->back();
    }
    
    public function AdminResetPasswordMakePDF($id,$password,$status) {
        
        $pdf = \App::make('dompdf.wrapper');
        $filename = 'password-reset-report.pdf';
        $pdf->setPaper('A4', 'portrait');
        $pdf->loadHTML($this->DataIntoPdf($id,$password,$status));
        return $pdf->stream($filename);
    }
    
    public function DataIntoPdf($id,$password,$status) {
        
        $user = User::findOrFail($id);
        if((int)$status === 1){
           $s_result = 'Reset Password The After Login'; 
        }
        else{
            $s_result = 'Don Not Reset The Password After Login'; 
        }
        $new_password = base64_decode($password);
        
        $output = '<div style="position: relative; display: block; background-color: #1d1e24; width: 100vh; padding: 10px;">'
                . '<img style="position: relative; display: block; margin-left: 35%; margin-right: 50%; width:250px;" src="'. public_path('image/Logo.png').'">'
                . '</div>'
                . '<br>'
                . '<h1 style="text-align: center; color:#000; text-transform: uppercase; text-decoration: underline;">'.$user->name.'\'s '.'Reset Password Report</h1>'
                . '<br>'
                . '<br>'
                . '<p style="font-size:16pt;">Name: '.$user->name.'</p>'
                . '<p style="font-size:16pt;">Username: '.$user->username.'</p>'
                . '<p style="font-size:16pt;">Email: '.$user->email.'</p>'
                . '<p style="font-size:16pt;">Email: '.$user->address.'</p>'
                . '<p style="font-size:16pt;">New Password: '.$new_password.'</p>'
                . '<p style="font-size:16pt;">Login Status: '.$s_result.'</p>'
                . '<a style="text-decoration:none; font-size:16pt;" href="'.url('/login').'">Login</a>';
        
        return $output;
    }
    
    public function AdminStoreUser(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255' ,'regex:/^[a-zA-Z ]*$/'],
            'email' => ['required', 'string', 'max:255', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9]{6,20}$/', 'unique:users'],
            'newPassword' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*^<>,.-_=+|])[A-Za-z\d!@#$%&*^<>,.-_=+|]{6,}$/'],
            'confirmPassword' => ['required', 'string', 'same:newPassword', 'min:6', 'max:255'],
            'role_id'=>['required'],
            'status'=>['required'],
            'login_status'=>['required'],
            'address'=>['required'],
        ],[
            'name.required' => "Full name field wouldn't be empty!",
            'email.required' => "Email field wouldn't be empty!",
            'username.required' => "Username field wouldn't be empty!",
            'role_id.required' => "User role field wouldn't be empty!",
            'status.required' => "User status field wouldn't be empty!",
            'login_status.required' => "Login status field wouldn't be empty!",
            'name.max' => "Only 255 characters are allowed!",
            'name.min' => "Atleast 4 characters must be entered!",
            'name.regex' => "Only text allowed!",
            'email.max' => "Only 255 characters are allowed!",
            'email.regex' => "Entered value should be email!",
            'email.unique' => "Email already taken!",
            'username.max' => "Only 255 characters are allowed!",
            'username.regex' => "For username you have to enter atleast 6 characters with capital letters, simple letters, numbers, maximum 20 characters and no special characters!",
            'username.unique' => "Username already taken!",
            'newPassword.required' => "New password field wouldn't be empty!",
            'confirmPassword.required' => "New password confirm field wouldn't be empty!",
            'login_status.required' => "Login status wouldn't be empty!",
            'newPassword.regex' => "New password must be minimum 6 characters, one capital letter, one speciale character ('!','@','#','$','%','^','&','*','-','_','=','+','|',',','.') and numbers!",
            'address' => "Address field wouldn't be empty!"
        ]);
        
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;
        $password = $request->newPassword;
        $role_id = $request->role_id;
        $status = $request->status;
        $login_status = $request->login_status;
        $address = $request->address;
        
        $role = Role::findOrFail($role_id);
        $user_status = UserStatus::findOrFail($status);
        $user_login_status = LoginStatus::findOrFail($login_status);
        
        $user = User::create([
            'name' => $name,
            'username' => $username,
            'role_id' => $role_id,
            'status' => $status,
            'email' => $email,
            'login_status'=>$login_status,
            'password' => Hash::make($password),
            'address' => $address,
        ]);
        
        $user->attachRole($request->role_id);
        event(new Registered($user));
        
        $notification = array('message' => 'New user add successfully','alert-type' => 'success');//generate notification
        return view('admin.user.view_new_user', compact('name','email', 'username','password','role','user_status','user_login_status','address'))->with($notification);//return to the home slide page with notification
    }
    
    public function AdminNewUserMakePDF($name,$username,$email,$password,$role,$status,$login_status,$address) {
        
//        $name = $user->name.'-password-reset-report';
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'portrait');
        $pdf->loadHTML($this->UserDataIntoPdf($name,$username,$email,$password,$role,$status,$login_status,$address));
        return $pdf->stream('new-user-report.pdf');
    }
    
    public function UserDataIntoPdf($name,$username,$email,$password,$role,$status,$login_status,$address) {
        
        $user_name = base64_decode($name);
        $user_username = base64_decode($username);
        $user_email = base64_decode($email);
        $user_password = base64_decode($password);
        $user_role = base64_decode($role);
        $user_status = base64_decode($status);
        $user_login_status = base64_decode($login_status);
        $user_address = base64_decode($address);
        
        $output = '<div style="position: relative; display: block; background-color: #1d1e24; width: 100vh; padding: 10px;">'
                . '<img style="position: relative; display: block; margin-left: 35%; margin-right: 50%; width:250px;" src="'. public_path('image/Logo.png').'">'
                . '</div>'
                . '<br>'
                . '<h1 style="text-align: center; color:#000; text-transform: uppercase; text-decoration: underline;">'.$user_name.'\'s '.'New User Report</h1>'
                . '<br>'
                . '<br>'
                . '<p style="font-size:16pt;">Name: '.$user_name.'</p>'
                . '<p style="font-size:16pt;">Username: '.$user_username.'</p>'
                . '<p style="font-size:16pt;">Email: '.$user_email.'</p>'
                . '<p style="font-size:16pt;">Address: '.$user_address.'</p>'
                . '<p style="font-size:16pt;">Password: '.$user_password.'</p>'
                . '<p style="font-size:16pt;">User Role: '.$user_role.'</p>'
                . '<p style="font-size:16pt;">User Status: '.$user_status.'</p>'
                . '<p style="font-size:16pt;">Login Status: '.$user_login_status.'</p>'
                . '<a style="text-decoration:none; font-size:16pt;" href="'.url('/login').'">Login</a>';
        
        return $output;
    }
}

