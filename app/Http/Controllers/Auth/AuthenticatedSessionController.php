<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials =  $request->validate([
                            'username' => 'required',
                            'password' => 'required',
                        ]);
        
        //It will redirect to dashboard if everything is ok
        if (Auth::attempt($credentials)) {
            $request->authenticate();
            $request->session()->regenerate();
            
            if(auth()->user()->login_status === 1){
                return redirect()->route('login.reset.password');
            }
            
            $loginNotification = array('message' => 'User login successfully','alert-type' => 'success');
            return redirect()->intended(RouteServiceProvider::HOME)->with($loginNotification);
        }

        return redirect()->back()->with('error', 'Username or password invalid!');
//        
        
//        $request->authenticate();
//            
//        $request->session()->regenerate();
//
//        $loginNotification = array('message' => 'User login successfully','alert-type' => 'success');
//
//        if(auth()->user()->login_status === 1){
//            return redirect()->route('login.reset.password');
//        }
//
//        return redirect()->intended(RouteServiceProvider::HOME)->with($loginNotification);
         
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
