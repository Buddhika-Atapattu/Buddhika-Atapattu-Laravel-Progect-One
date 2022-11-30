@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-3 h2 display-3 font-Alumni-Sans-Inline-One">Add Role</h4>
                        <form method="post" action="{{ route('admin.role.store') }}" >@csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">New Role Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="example-text-input" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">New Role Display Name</label>
                                <div class="col-sm-10">
                                    <input name="display_name" class="form-control" type="text" id="example-text-input" autocomplete="off">
                                    @error('display_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">New Role Description</label>
                                <div class="col-sm-10">
                                    <input name="description" class="form-control" type="text" id="example-text-input" autocomplete="off">
                                    @error('description')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="font-Tiro-Gurmukhi mb-3">New Role Permission</label>
                                @error('permission')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                @foreach($permissions as $permissions)
                                <div class="col-sm-3 mb-3">
                                    <input type="checkbox" name="permission[]" id="permission_{{$permissions->id}}" value="{{$permissions->id}}" class="form-check-inline">
                                    <label for="permission_{{$permissions->id}}" class="form-check-label font-Tiro-Gurmukhi">
                                        {{$permissions->display_name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light font-Tiro-Gurmukhi" value="Add New Role">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>





@endsection