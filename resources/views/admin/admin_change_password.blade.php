@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-title text-center my-4"><h1 class="text-secondary">Change password</h1></div>
                    <div class="card-body">
                        
                        @if(count($errors))
                            @foreach($errors -> all() as $error)
                            <p class="alert alert-danger alert-dismissable fade show text-center">{{$error}}</p>
                            @endforeach
                        @endif
                        
                        <form method="post" action="{{route('update.password')}}" >@csrf
                            
                            <!--current password-->
                            <div class="row form-group mb-3">
                                <lable class="col-md-2" for="currentPw">Current password</lable>
                                <div class="col-md-10">
                                    <div class="input-group mb-3">
                                        <input type="password" name="currentPassword" id="currentPw" class="form-control" placeholder="Current password" aria-label="Current password" aria-describedby="basic-addon2">
                                        <span class="input-group-text bg-info" role="button" onclick="currentPw()">
                                            <i id="currectEo" class="fa-solid fa-eye m-auto text-white"></i>
                                            <i id="currentEc" class="fa-solid fa-eye-slash d-none m-auto text-white"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end form group div-->
                            
                            <!--new password-->
                            <div class="row form-group mb-3">
                                <lable class="col-md-2" for="newPw">New password</lable>
                                <div class="col-md-10">
                                    <div class="input-group mb-3">
                                        <input type="password" name="newPassword" id="newPw" class="form-control" placeholder="New password" aria-label="New password" aria-describedby="basic-addon2">
                                        <span class="input-group-text bg-info" role="button" onclick="newPw()">
                                            <i id="newEo" class="fa-solid fa-eye m-auto text-white" ></i>
                                            <i id="newEc" class="fa-solid fa-eye-slash d-none m-auto text-white"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end form group div-->
                            
                            <!--confirm password-->
                            <div class="row form-group mb-3">
                                <lable class="col-md-2" for="confirmPw">Confirm password</lable>
                                <div class="col-md-10">
                                    <div class="input-group mb-3">
                                        <input type="password" name="confirmPassword" id="confirmPw" class="form-control" placeholder="Confirm password" aria-label="Confirm password" aria-describedby="basic-addon2">
                                        <span class="input-group-text bg-info" role="button" onclick="confirmPw()">
                                            <i id="confirmEo" class="fa-solid fa-eye m-auto text-white"></i>
                                            <i id="confirmEc" class="fa-solid fa-eye-slash d-none m-auto text-white"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end form group div-->
                            
                            <div class="row justify-content-lg-center">
                                <div class="col-lg-auto">
                                    <input type="submit" class="btn btn-success btn-rounded px-3 fw-bold fa-2" value="Change password">
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

<script>
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
@endsection
