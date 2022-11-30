<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginResetPassword extends Controller
{
    public function LoginResetPassword() {
        
        $user = Auth::user();
        return view('login_reset_password', compact('user'));
    }
    
    public function LoginUpdatePassword(Request $request) {
        $request->validate([
            'newPassword' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*^<>,.-_=+|])[A-Za-z\d!@#$%&*^<>,.-_=+|]{6,}$/'],
            'confirmPassword' => ['required', 'string', 'same:newPassword', 'min:6', 'max:255'],
        ],[
            'newPassword.required' => "New password field wouldn't be empty!",
            'newPassword.regex' => "New password must be minimum 6 characters, one capital letter, one speciale characters ('!','@','#','$','%','^','&','*','-','_','=','+','|',',','.') and numbers!",
            'confirmPassword.required' => "New password confirm field wouldn't be empty!",
            'confirmPassword.same' => "New password and confirm password must be same!",
        ]);
        
        if(Hash::check($request->newPassword, auth()->user()->password)){
            $request->session()->flash('error', 'Your old password and new password cannot be the same.');
            return redirect()->back();
        }
        else{
            $login_status = 2;
            $password = Hash::make($request->newPassword);
            auth()->user()->update([
                'password'=>$password,
                'login_status'=>$login_status,
            ]);
            
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('success', 'Your password reset successfully please login!');
        }
    }
}
