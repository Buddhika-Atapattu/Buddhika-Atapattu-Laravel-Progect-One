@extends('admin.admin_master')
@section('admin')
@php
$user_roleID = $editData->role_id;
$role = DB::table('roles')->get();

@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('store.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="filename" name="filename">
                            <!--profile image-->
                            <div class="row mb-3">
                                <!--preview image for image upload-->
                                <label for="image" class="mx-auto" role="button">
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="rounded-circle mx-auto">
                                                <img id="previewImage" class="user_picture avatar-xl mx-auto mt-3 d-block rounded-circle shadow-4 img-thumbnail" src="{{(!empty($editData->profile_image))? url('image/upload/admin_update_image/'.$editData->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Avatar">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <span class="text-muted text-center">Click the image to change the profile image</span>
                                <!--upload input field-->
                                <input type="file" name="profile_image" id="image" class="d-none" accept="image/png,image/jpeg,image/gif,image/jpg">
                            </div>
                            <!--end div-->
                        
                            <!--user name-->
                            <div class="row mb-3">
                                <label for="name" class="form-label col-md-2">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" id="name" placeholder="Custmize your name" class="form-control" value="{{$editData->name}}">
                                </div>
                            </div>
                            <!--end div-->
                            
                            <!--user email-->
                            <div class="row mb-3">
                                <label for="email" class="form-label col-md-2">Email:</label>
                                <div class="col-md-10">
                                    <input type="email" name="email" id="email" placeholder="Custmize your email" class="form-control" value="{{$editData->email}}">
                                </div>
                            </div> 
                            <!--end div-->
                            
                            <!--user username-->
                            <div class="row mb-3">
                                <label for="username" class="form-label col-md-2">Username:</label>
                                <div class="col-md-10">
                                    <input type="text" name="username" id="username" placeholder="Custmize your username" class="form-control" value="{{$editData->username}}">
                                </div>
                            </div>  
                            
                            <!--end div-->
                            @if(($user_roleID === 1) || ($user_roleID === 2))
                            <!--user role-->
                            <div class="row mb-3">
                                <label for="username" class="form-label col-md-2">User Role:</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="role_id" id="role_id">
                                        @foreach($role as $r)
                                            @if($user_roleID === $r->id)
                                            <option class="text-capitalize" value="{{$r->id}}">{{$r->display_name}}</option>
                                            @else
                                            <option class="text-capitalize" value="{{$r->id}}">{{$r->display_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end user role-->
                            @endif
                            <!--<input type="text" id="test" name="test" class="form-control">-->
                            <!--submit button-->
                            <div class="row justify-content-lg-center">
                                <div class="col-lg-auto">
                                    <input type="submit" class="btn btn-success btn-rounded px-3 fw-bold fa-2" value="Update Profile">
                                </div> 
                            </div>
                            <!--end div-->
                        </form>
                        <!--end form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
//        image preview jquery
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload =function(e){
                $('#previewImage').attr('src',e.target.result);
//                $('#test').val(e.target.result);
            };
            reader.readAsDataURL(e.target.files['0']);
        });
        
//        image crop
        $('#image').ijaboCropTool({
            preview:'.user_picture',
            setRatio:2/2,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            processUrl:'{{route("crop.image")}}',
            withCSRF:['_token','{{csrf_token()}}'],
            
            onSuccess:function(message, element, status){
                $('#filename').val(message);
//                alert(message);
            },
            onError:function(message, element, status){
                alert(message);
            }
        });
        
//        $.getJSON();
    });
</script>
@endsection
