@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <img class="card-img-top rounded-circle avatar-xl mx-auto mt-3" src="{{(!empty($adminData->profile_image))? url('image/upload/admin_update_image/'.$adminData->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="text-center">Name: {{$adminData->name}}</h1><hr>
                        <h5 class="text-center">Email: {{$adminData->email}}</h5><hr>
                        <h5 class="text-center">Username: {{$adminData->username}}</h5><hr>
                        <h5 class="text-center">Role: <?php  if(($adminData->role_id) === 1){ echo 'Super Admin';} elseif (($adminData->role_id) === 2) {echo 'Admin';} else{echo 'User';} ?> </h5><hr>
                        <div class="row justify-content-lg-center">
                            <div class="col-lg-auto">
                                <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded px-3 fw-bold">Edit Profile</a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
