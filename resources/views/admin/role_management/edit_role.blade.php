@extends('admin.admin_master')
@section('admin')
@php
use Illuminate\Support\Facades\DB;
@endphp
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-3 h2 display-3 font-Alumni-Sans-Inline-One text-capitalize">Edit Role And Permissions of {{$role->display_name}}</h4>
                        <form method="post" action="{{ route('admin.role.update',$role->id) }}" >@csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Role Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="example-text-input" value="{{$role->name}}" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Role Display Name</label>
                                <div class="col-sm-10">
                                    <input name="display_name" class="form-control" type="text" id="example-text-input" value="{{$role->display_name}}" autocomplete="off">
                                    @error('display_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Role Description</label>
                                <div class="col-sm-10">
                                    <input name="description" class="form-control" type="text" id="example-text-input" value="{{$role->description}}" autocomplete="off">
                                    @error('description')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="row mb-3 w-100">
                                    <label for="permission" class="font-Tiro-Gurmukhi mb-3">Role Permissions</label>
                                </div>
                                @error('permission')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                @if($count > 0)
                                @foreach($permissions as $permissions)
                                @php $permission_identities = explode(',',$permissions->permission_identities); @endphp
                                @if(in_array($permissions->id , $permission_identities))
                                <div class="col-sm-3 mb-3">
                                    <input type="checkbox" name="permission[]" id="permission_{{$permissions->id}}" value="{{$permissions->id}}" class="form-check-inline" checked="">
                                    <label for="permission_{{$permissions->id}}" class="form-check-label font-Tiro-Gurmukhi">
                                        {{$permissions->display_name}}
                                    </label>
                                </div>
                                @else
                                <div class="col-sm-3 mb-3">
                                    <input type="checkbox" name="permission[]" id="permission_{{$permissions->id}}" value="{{$permissions->id}}" class="form-check-inline">
                                    <label for="permission_{{$permissions->id}}" class="form-check-label font-Tiro-Gurmukhi">
                                        {{$permissions->display_name}}
                                    </label>
                                </div>
                                @endif
                                @endforeach
                                @else
                                @foreach($new_permissions as $permissions)
                                <div class="col-sm-3 mb-3">
                                    <input type="checkbox" name="permission[]" id="permission_{{$permissions->id}}" value="{{$permissions->id}}" class="form-check-inline">
                                    <label for="permission_{{$permissions->id}}" class="form-check-label font-Tiro-Gurmukhi">
                                        {{$permissions->display_name}}
                                    </label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <input type="submit" name="submit" id="submit" class="btn btn-info btn-lg btn-submit font-Tiro-Gurmukhi" value="Update Role">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var allowed = ('#allowed').next('label').text();
    alert('HI');
});
</script>
@endsection