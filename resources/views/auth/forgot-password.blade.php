<!doctype html>
<html lang="en">

    <head>
        
        @include('common.commonHeader');
        <title>Recover Password | NG International</title>

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{asset('image/Logo-with-red-color.png')}}" height="70" class="logo-dark mx-auto" alt="Company Logo">
                                    <img src="{{asset('image/Logo-with-red-color.png')}}" height="30" class="logo-light mx-auto" alt="Company Logo{{asset('backend/')}}">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{route('password.email')}}">@csrf

                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div>
    
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" id="email" name="email" type="email" required="" placeholder="Email">
                                    </div>
                                </div>
    
                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        

        <!-- JAVASCRIPT -->
        @include('common.bottom-js');

    </body>
</html>
