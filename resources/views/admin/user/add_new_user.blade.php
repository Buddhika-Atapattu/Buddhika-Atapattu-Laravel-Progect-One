@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-3 h2 display-3 font-Alumni-Sans-Inline-One">Add User</h4>
                        <form method="post" action="{{ route('admin.store.user') }}" >@csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Full Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="example-text-input" placeholder="Full name" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" id="example-text-input" placeholder="Email" autocomplete="off">
                                    @error('email')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Username</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" id="example-text-input" placeholder="Username" autocomplete="off">
                                    @error('username')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Address</label>
                                <div class="col-sm-10">
                                    <input name="address" class="form-control" type="text" id="example-text-input" placeholder="Address" autocomplete="off">
                                    @error('address')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
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
                            
                            <div class="row form-group mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">User Role</label>
                                <div class="col-sm-5">
                                    <select class="form-select" name="role_id" id="login_status">
                                        <option value="" selected="selected">Select...</option>
                                        @foreach($role as $r)
                                        <option value="{{$r->id}}">{{$r->display_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">&nbsp;</div>
                            </div>
                            
                            <div class="row form-group mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">User Status</label>
                                <div class="col-sm-5">
                                    <select class="form-select" name="status" id="login_status">
                                        <option value="" selected="selected">Select...</option>
                                        @foreach($status as $s)
                                        <option value="{{$s->id}}">{{$s->display_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">&nbsp;</div>
                            </div>
                            
                            <div class="row form-group mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Login Status</label>
                                <div class="col-sm-5">
                                    <select class="form-select" name="login_status" id="login_status">
                                        <option value="" selected="selected">Select...</option>
                                        @foreach($login_status as $ls)
                                        <option value="{{$ls->id}}">{{$ls->display_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('login_status')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">&nbsp;</div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-info btn-lg font-Tiro-Gurmukhi" value="Add User" title="Add User">
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
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