@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="card p-3">
                <!-- start page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center">
                            <h2 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One text-capitalize">Edit User: {{$user->name}}</h2>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route('admin.update.user',$user->id) }}" >@csrf
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Full name</label>
                                        <div class="col-sm-10">
                                            <input name="name" class="form-control" type="text" id="example-text-input" value="{{$user->name}}" autocomplete="off">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" class="form-control" id="example-text-input" value="{{$user->email}}" autocomplete="off">
                                            @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Username</label>
                                        <div class="col-sm-10">
                                            <input name="username" class="form-control" type="text" id="example-text-input" value="{{$user->username}}" autocomplete="off">
                                            @error('username')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Username</label>
                                        <div class="col-sm-10">
                                            <input name="address" class="form-control" type="text" id="example-text-input" value="{{$user->address}}" autocomplete="off">
                                            @error('username')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="user_status" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Status</label>
                                        <div class="col-sm-5">
                                            <select class="form-select" name="status" id="user_status">
                                                @foreach($status as $s)
                                                @if($user->status === $s->id)
                                                <option value="{{$s->id}}" selected="selected">{{$s->display_name}}</option>
                                                @else
                                                <option value="{{$s->id}}">{{$s->display_name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-5">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="user_status" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Role</label>
                                        <div class="col-sm-5">
                                            <select class="form-select" name="role_id" id="user_status">
                                                @foreach($role as $r)
                                                @if($user->role_id === $r->id)
                                                <option value="{{$r->id}}" selected="selected">{{$r->display_name}}</option>
                                                @else
                                                <option value="{{$r->id}}">{{$r->display_name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-5">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 d-flex justify-content-between">
                                            <a class="text-decoration-none btn btn-secondary font-Tiro-Gurmukhi btn-lg" href="{{route('admin.reset.password',$user->id)}}" title="Reset Password">Reset Password</a>
                                            <input name="submit" class="btn btn-info font-Tiro-Gurmukhi btn-lg" type="submit" value="Update user" title="Update User">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection