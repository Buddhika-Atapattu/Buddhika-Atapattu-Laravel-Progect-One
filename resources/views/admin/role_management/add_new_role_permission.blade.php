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
                            <h2 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One text-capitalize">Add new role permission</h2>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route('admin.store.role.permission') }}" >@csrf
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Permission Name</label>
                                        <div class="col-sm-10">
                                            <input name="name" class="form-control" type="text" id="example-text-input" value="" autocomplete="off">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Permission Display Name</label>
                                        <div class="col-sm-10">
                                            <input name="display_name" class="form-control" type="text" id="example-text-input" value="" autocomplete="off">
                                            @error('display_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Permission Description</label>
                                        <div class="col-sm-10">
                                            <input name="description" class="form-control" type="text" id="example-text-input" value="" autocomplete="off">
                                            @error('description')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <input name="submit" class="btn btn-info font-Tiro-Gurmukhi btn-lg" type="submit" value="Insert Permission">
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
