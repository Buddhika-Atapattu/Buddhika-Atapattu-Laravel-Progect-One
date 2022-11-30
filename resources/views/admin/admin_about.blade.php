@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="card p-3">
                <h2 class="text-center text-capitalize text-dark font-Alumni-Sans-Inline-One pe-none display-3 mb-5">Update About Us Page</h2>
                <form method="POST" action="{{route('update.about')}}" enctype="multipart/form-data">@csrf
                    <div class="row mb-3">
                        <label class="form-label h3 fw-title fw-normal font-Tiro-Gurmukhi">Title</label>
                        <div class="d-flex justify-content-center">
                            <textarea class="d-none" id="title" name="title" rows="" cols="">{{$row->title}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label h3 fw-title fw-normal font-Tiro-Gurmukhi">Sub Title</label>
                        <div class="d-flex justify-content-center">
                            <textarea class="d-none" id="sub_title" name="sub_title" rows="" cols="">{{$row->sub_title}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label h3 fw-title fw-normal font-Tiro-Gurmukhi">Content</label>
                        <div class="d-flex justify-content-center">
                            <textarea class="d-none" id="content" name="content" rows="" cols="">{{$row->content}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="file" class="btn btn-info h3 fw-title fw-normal font-Tiro-Gurmukhi text-light upload-btn">Upload Image</label>
                            <input type="file" name="file" id="file" class="form-control d-none">
                            <div class="d-flex justify-content-center">
                                <div id="preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark-blue fw-title fw-normal font-Tiro-Gurmukhi">Update About Page</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/admin_about.js') }}"></script>
@endsection