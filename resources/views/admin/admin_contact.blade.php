@extends('admin.admin_master')
@section('admin')
@php
$id = 1;
$row = App\Models\ContactPage::find($id);
@endphp
<div class="page-content">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="card">
                <h2 class="text-center text-capitalize text-dark font-Alumni-Sans-Inline-One pe-none display-3 mb-5">Update Contact Us Page</h2>
                <form method="POST" action="{{route('update.contact')}}" enctype="multipart/form-data">@csrf
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
                        <div class="col-6">
                            <label for="file" class="btn btn-info h3 fw-title fw-normal font-Tiro-Gurmukhi text-light upload-btn">Upload Image</label>
                            <input type="file" name="file" id="file" class="form-control d-none">
                            <div class="d-flex justify-content-center">
                                <div id="preview"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input type="text" class="form-control map-search map-search" name="search_address" value="{{$row->address}}" id="search_address" placeholder="Search Address...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <input type="text" class="form-control latitude" name="latitude" id="latitude" value="{{$row->latitude}}" placeholder="Latitude...">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control longitude" name="longitude" id="longitude" value="{{$row->longitude}}" placeholder="Longitude...">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control reg-input-city" name="city" id="city" value="{{$row->city}}" placeholder="City...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div id="googleMap" style="width:100%;height:400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark-blue h3 fw-title fw-normal font-Tiro-Gurmukhi">Update Contact Page</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/assets/js/admin_contact.js')}}"></script>
@endsection