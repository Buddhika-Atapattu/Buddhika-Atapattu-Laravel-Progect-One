@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.user.view')}}" class="btn btn-secondary rounded-pill text-capitalize font-Tiro-Gurmukhi">
                    <i class="fas fa-arrow-left"></i> Go Back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card p-3">
                    <!--print row-->
                    <?php
                    $user_name = base64_encode($name);
                    $user_username = base64_encode($username);
                    $user_email = base64_encode($email);
                    $user_password = base64_encode($password);
                    $user_address = base64_encode($address);
                    $user_role = base64_encode($role->display_name);
                    $status = base64_encode($user_status->display_name);
                    $login_status = base64_encode($user_login_status->display_name);
                    ?>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <a href="{{route('admin.new.user.make.pdf',['name'=>$user_name ,'username'=>$user_username,'email'=>$user_email, 'password'=>$user_password, 'role'=>$user_role, 'status'=>$status, 'login_status'=>$login_status, 'address'=>$user_address])}}" class="text-decoration-none btn btn-info font-Tiro-Gurmukhi">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <h2 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One text-capitalize">New user {{$name}}</h2>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row form-group mb-4">
                                        <div class="col-sm-2">&nbsp;</div>
                                        <div class="col-sm-8">
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Full name: {{$name}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Username: {{$username}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Email: {{$email}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Password: {{$password}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">User Role: {{$role->display_name}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">User Status: {{$user_status->display_name}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">User Login Status: {{$user_login_status->display_name}}</h4>
                                        </div>
                                        <div class="col-sm-2">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection