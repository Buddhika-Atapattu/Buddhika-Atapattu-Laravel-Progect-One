<!doctype html>
<html lang="en">
    <head>
        @include('common.commonHeader')
        <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
        <title>Login | NG International - Admin & Dashboard Template</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row main-row">
                <div class="row main-overlay">
                    <div class="row position-absolute top-0 start-0">
                        <div class="col-lg-12">
                            <a class="text-decoration-none" href="{{route('home')}}">
                                <button class="go-back-button">
                                    <i class="fas fa-arrow-left"></i> Go back to home
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-main-col">
                        <div class="card w-100 p-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{asset('image/Logo-with-red-color.png')}}" height="70" class="logo mx-auto" alt="">
                                    <!--<img src="{{asset('image/Logo-with-red-color.png')}}" height="30" class="logo-light mx-auto" alt="">-->
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
                            </div>
                            <div class="row">
                                @if(session('error'))
                                <span class="alert alert-danger my-1 d-flex justify-content-center">{{session('error')}}</span>
                                @endif
                                @if(session('success'))
                                <span class="alert alert-success my-1 d-flex justify-content-center">{{session('success')}}</span>
                                @endif
                            </div>
                            <div class="row">
                                <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}" autocomplete="off">@csrf
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-12">
                                            <input id="username" name="username" class="form-control" type="text" placeholder="Username">
                                        </div>
                                        @error('username')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-12">
                                            <input id="password" name="password" class="form-control" type="password" autocomplete="current-password" placeholder="Password">
                                        </div>
                                        @error('password')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input class="form-check-input" id="passwordShower" type="checkbox" onclick="myFunction()">
                                                <label for="passwordShower" class="form-check-label">Show Password</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- Remember Me -->
                                                <div class="d-flex justify-content-end">
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                                        <label class="form-check-label">{{ __('Remember me') }}</label>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mb-3 text-center row mt-3 pt-1  d-flex justify-content-center">
                                        <div class="col-lg-3">
                                            <button class="btn btn-info w-100 waves-effect waves-light btn-lg font-Tiro-Gurmukhi" type="submit">Log In</button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row mt-2">
                                        <div class="col-lg-7 mt-3">
                                            @if (Route::has('password.request'))
                                            <a class="text-sm text-muted text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                <i class="fa-solid fa-lock"></i> {{ __('Forgot your password?') }}
                                            </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-5 mt-3 d-flex justify-content-end">
                                            <a href="{{route('register')}}" class="text-muted"><i class="fa-solid fa-user"></i></i> Create an account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        @include('common.bottom-js')
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } 
                else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>