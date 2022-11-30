<!doctype html>
<html lang="en">
    <head>
        @include('common.commonHeader')
        <title>Login Reset Password | NG International - User Reset Password</title>
        <link rel="stylesheet" href="{{asset('/font.css')}}"/>
    </head>>
    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="card p-3">
                            
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a class="auth-logo">
                                            <img src="{{asset('image/Logo-with-red-color.png')}}" height="70" class="logo-dark mx-auto" alt="">
                                            <img src="{{asset('image/Logo-with-red-color.png')}}" height="30" class="logo-light mx-auto" alt="">
                                        </a>
                                    </div>
                                </div>
                                <h4 class="text-muted text-center font-size-18 mb-3"><b>{{$user->name}}'s Reset the Password</b></h4>
                                @if(session('error'))
                                <span class="alert alert-danger my-3 d-flex justify-content-center">{{session('error')}}</span>
                                @endif
                                <form method="post" action="{{route('login.update.password')}}" >@csrf

                                    <!--new password-->
                                    <div class="row form-group mb-4">
                                        <label for="example-text-input" class="col-sm-3 col-form-label font-Tiro-Gurmukhi">New Password</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="password" name="newPassword" id="newPw" class="form-control" placeholder="New password" aria-label="New password" aria-describedby="basic-addon2">
                                                <span class="input-group-text" role="button" onclick="newPw()">
                                                    <i id="newEo" class="fa-solid fa-eye m-auto" ></i>
                                                    <i id="newEc" class="fa-solid fa-eye-slash d-none m-auto"></i>
                                                </span>
                                            </div>
                                            @error('newPassword')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--end form group div-->

                                    <!--confirm password-->
                                    <div class="row form-group mb-4">
                                        <label for="example-text-input" class="col-sm-3 col-form-label font-Tiro-Gurmukhi">Confirm Password</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="password" name="confirmPassword" id="confirmPw" class="form-control" placeholder="Confirm password" aria-label="Confirm password" aria-describedby="basic-addon2">
                                                <span class="input-group-text" role="button" onclick="confirmPw()">
                                                    <i id="confirmEo" class="fa-solid fa-eye m-auto"></i>
                                                    <i id="confirmEc" class="fa-solid fa-eye-slash d-none m-auto"></i>
                                                </span>
                                            </div>
                                            @error('confirmPassword')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--end form group div-->

                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="submit" class="btn btn-info btn-lg font-Tiro-Gurmukhi" value="Reset password" title="Reset Password">
                                        </div> 
                                    </div>
                                </form>
                                <!--end form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @include('common.bottom-js')
    <script>
        function uncheckShowYear(obj){
            if (obj.checked == false)
            {
                document.getElementById("cbxShowYear").checked = false;
            }
        }
    //    changing password and type js
    //    current password
        function  currentPw(){
            var x = document.getElementById("currentPw");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("currectEo").style.setProperty("display", "none", "important");
                document.getElementById("currentEc").style.setProperty("display", "flex", "important");
            } 
            else {
                x.type = "password";
                document.getElementById("currectEo").style.setProperty("display", "flex", "important");
                document.getElementById("currentEc").style.setProperty("display", "none", "important");
            }
        }
    //    new password
        function  newPw(){
            var x = document.getElementById("newPw");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("newEo").style.setProperty("display", "none", "important");
                document.getElementById("newEc").style.setProperty("display", "flex", "important");
            } 
            else {
                x.type = "password";
                document.getElementById("newEo").style.setProperty("display", "flex", "important");
                document.getElementById("newEc").style.setProperty("display", "none", "important");
            }
        }
    //    confirm password
        function  confirmPw(){
            var x = document.getElementById("confirmPw");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("confirmEo").style.setProperty("display", "none", "important");
                document.getElementById("confirmEc").style.setProperty("display", "flex", "important");
            } 
            else {
                x.type = "password";
                document.getElementById("confirmEo").style.setProperty("display", "flex", "important");
                document.getElementById("confirmEc").style.setProperty("display", "none", "important");
            }
        }


    </script>
</html>
            


