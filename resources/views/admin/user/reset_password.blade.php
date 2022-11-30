@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card p-3">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <h2 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One text-capitalize">{{$user->name}}'s Reset The Password</h2>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="card-body">
                        
                        <form method="post" action="{{route('admin.update.reset.password',$user->id)}}" >@csrf
                            
                            <!--new password-->
                            <div class="row form-group mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">New Password</label>
                                <div class="col-md-10">
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
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Confirm Password</label>
                                <div class="col-md-10">
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
                            
                            <div class="row form-group mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Login Status</label>
                                <div class="col-sm-5">
                                    <select class="form-select" name="login_status" id="login_status">
                                        @foreach($login_status as $ls)
                                        @if($user->login_status === $ls->id)
                                        <option value="{{$ls->id}}" selected="selected">{{$ls->display_name}}</option>
                                        @else
                                        <option value="{{$ls->id}}">{{$ls->display_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-5">&nbsp;</div>
                            </div>
                            
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
@endsection

