@extends('admin.admin_master')
@section('admin')
@php

//get data from selected teble
$selectedID = $selectedAnimation->id;
$selectedSectionID = $selectedAnimation->main_section_id;
//find section id
$section = App\Models\animated_main_section::find($selectedID);
$sectionID = $section->id;
//find image row id
$imageRow = App\Models\animated_slider::find($sectionID);
$imageRowID = $imageRow->id;
//get section table rows count
$sectionRowCount = $imageRow->count();
//select all from animated_main_slider table
$sectionAll = App\Models\animated_main_section::all();

@endphp
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row mb-4">
                            <h2 class="text-center text-capitalize text-dark font-Alumni-Sans-Inline-One pe-none display-3">Animated Slider Setting</h2>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div id="alertdiv"></div>
                            </div>
                        </div>
                        <form method="POST" action="{{route('update.animated')}}" enctype="multipart/form-data">@csrf
                            <input type="hidden" class="form-control d-none" name="selectedID" id="selectedID" value="{{$selectedID}}">
                            <!--title row-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-2 d-flex my-auto">
                                        <label for="form-label font-bold text-dark text-capitalize">Title:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input" name="title" placeholder="Title...">
                                    </div>
                                </div>
                            </div>
                            <!--end title row-->
                            
                            <!--sub title row-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-2 d-flex my-auto">
                                        <label for="form-label font-bold text-dark text-capitalize">Sub title:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input" name="sub_title" placeholder="Sub title...">
                                    </div>
                                </div>
                            </div>
                            <!--end sub title row-->
                            
                            <!--content row-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-2 d-flex my-auto">
                                        <label for="form-label font-bold text-dark text-capitalize">Content:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="content" id="input" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--end content row-->
                            
                            <!--section select row-->
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-sm-2 d-flex my-auto">
                                        <label class="form-label font-bold text-dark text-capitalize" for="select_style">Select The Style:</label>
                                    </div>
                                    <div class="col-sm-4 d-flex my-auto">
                                        <select class="form-select" name="animation_style" id="animation_style">
                                            <option value="">Select...</option>
                                        @foreach($sectionAll as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-center">
                                        <section class="animated-slider-section" id="horizontal_animation">
                                            <div class="col-12 slider-row">
                                                <div class="slider">
                                                    <span style="--i:1;"><div class="image"></div></span>
                                                    <span style="--i:2;"><div class="image"></div></span>
                                                    <span style="--i:3;"><div class="image"></div></span>
                                                    <span style="--i:4;"><div class="image"></div></span>
                                                    <span style="--i:5;"><div class="image"></div></span>
                                                    <span style="--i:6;"><div class="image"></div></span>
                                                    <span style="--i:7;"><div class="image"></div></span>
                                                    <span style="--i:8;"><div class="image"></div></span>
                                                    <span style="--i:9;"><div class="image"></div></span>
                                                    <span style="--i:10;"><div class="image"></div></span>
                                                </div>
                                            </div>
                                        </section>
                                        
                                        <section class="cube-slider-section" id="cube_animation">
                                            <div class="col-sm-12">
                                                <div class="wrapper">
                                                    <div class="cube-box">
                                                        <div class="cube-image"></div>
                                                        <div class="cube-image"></div>
                                                        <div class="cube-image"></div>
                                                        <div class="cube-image"></div>
                                                        <div class="cube-image"></div>
                                                        <div class="cube-image"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <div id="sectionPre"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end section select row-->
                            
                            <!--first image section-->
                            <div class="form-group mb-3" id="image_section">
                                <!--input file first row-->
                                <div class="row w-100">
                                    <div class="col-sm-3" id="input_1">
                                        <div class="form-group">
                                            <label class="btn btn-info rounded-3 file-text" for="file_images">Upload Images</label>
                                            <input type="file" class="d-none form-control" name="image[]" id="file_images" accept="image/*" multiple="true"> 
                                        </div>
                                    </div>
                                </div>
                                <!--end input first row-->
                                <!--image preview first row-->
                                <div class="row w-100" id="image_preview">
                                    
                                </div>
                                <!--end image preview first row-->
                            </div>
                            <!--end first image section-->
                            
                            <!--submit button-->
                            <div class="row mt-5">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" value="Update Animation Slider" name="submit" id="submit" class="btn-dark-blue">
                                </div>
                            </div>
                            <!--end submit button-->
                        </form>
                        <!--end form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--animation slider js-->
<script type="text/javascript" src="{{asset('plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/animationSlider.js') }}"></script>
@endsection