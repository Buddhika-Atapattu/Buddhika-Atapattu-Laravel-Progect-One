@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <h2 class="text-center text-capitalize text-dark font-Alumni-Sans-Inline-One pe-none display-3">Home Slide Update</h2>
                        </div>
                        <!--form for home slide-->
                        <form method="post" action="{{route('update.slider')}}" enctype="multipart/form-data">@csrf
                            <!--id-->
                            <div class="row mb-3">
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="id" id="id" value="{{$homeSlider->id}}">
                                </div>
                            </div>
                            <!--end id-->
                            <!--main title-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="inputArea">Main Title</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="inputArea" value="{{$homeSlider->title}}">
                                    </div>
                                </div>
                            </div>
                            <!--end main title-->
                            
                            <!--sub main title-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="inputArea">Sub Title</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="short_title" id="inputArea" value="{{$homeSlider->short_title}}">
                                    </div>
                                </div>
                            </div>
                            <!--end sub main title-->
                            
                            <!--slide image-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="home_slide" class="btn btn-info">Upload Image</label>
                                        <input type="file" class="form-control d-none" name="home_slide" id="home_slide">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <img class="card-img" id="previewImage" src="{{(!empty($homeSlider->home_slide))? url($homeSlider->home_slide):url('image/upload/homeSlide/noUploadedImage.jpg')}}" alt="uploaded image">
                                        </div>
                                    </div>
                                    <div class="col-4">&nbsp;</div>
                                </div>
                            </div>
                            <!--end slide image-->
                            
                            <!--video url-->
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="home_slide">Video URL</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="video_url" id="video_url" value="{{'https://www.youtube.com/watch?v='.$homeSlider->video_url}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--end video url-->
                            
                            <!--video url preview-->
                            <div class="row mb-3">
                                <div class="col-2">
                                    &nbsp;
                                </div>
                                <div class="col-sm-8">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="100%" height="250px" class="embed-responsive-item" id="videoPreview" src="{{(!empty($homeSlider->home_slide))? url('https://www.youtube.com/embed/'.$homeSlider->video_url):url('https://www.youtube.com/embed/')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-2">&nbsp;</div>
                            </div>
                            <!--end video url preview-->
                            
                            <!--submit button-->
                            <div class="row mb-3">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-info" name="submit" id="submit" value="Update Home Slide">
                                </div>
                            </div>
                            <!--end submit button-->
                            
                        </form>
                        <!--end form for home slide-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('backend/assets/js/home_slide_input_area.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
    
    
</script>
@endsection
