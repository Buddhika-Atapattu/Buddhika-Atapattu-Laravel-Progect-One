@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.user.edit',$users->id)}}" class="btn btn-secondary rounded-pill text-capitalize font-Tiro-Gurmukhi">
                    <i class="fas fa-arrow-left"></i> Go Back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card p-3">
                    <!--print row-->
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{route('admin.reset.password.make.pdf',['id'=>$users->id,'password'=>$new,'status'=>$statut])}}" class="text-decoration-none btn btn-info font-Tiro-Gurmukhi">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-center">
                                <h2 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One text-capitalize">{{$users->name}}'s password reset</h2>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row form-group mb-4">
                                        <div class="col-sm-3">&nbsp;</div>
                                        <div class="col-md-6">
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Full name: {{$users->name}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Username: {{$users->username}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">Email: {{$users->email}}</h4>
                                            <h4 for="example-text-input" class="font-Tiro-Gurmukhi">New Password: {{base64_decode($new)}}</h4>
                                        </div>
                                        <div class="col-sm-3">&nbsp;</div>
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