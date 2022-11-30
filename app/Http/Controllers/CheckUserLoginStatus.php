<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckUserLoginStatus extends Controller
{
    public function UserLoginStatus() {
        echo $login_status = auth()->user()->login_status;
        if($login_status === 1){
            return redirect()->route('login.reset.password');
        }
        else{
            return redirect('/dashboard ');
        }
        
    }
}
