@extends('frontend.main_master')
@section('contact')
@php
$id = 1;
$row = App\Models\ContactPage::find($id);
@endphp
<section class="title">
    <div class="container">
        <div class="row">
            {!! $row->title !!}
        </div>
    </div>
</section>
<section class="sub_title">
    <div class="container">
        <div class="row">
            {!! $row->sub_title !!}
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="row">
            {!! $row->content !!}
        </div>
    </div>
</section>
<section class="image-map-row">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="" src="{{(!empty($row->image))? url($row->image):url('image/upload/c/noImage.gif')}}" alt="contact-us">
            </div>
            <div class="col-6">
                <iframe class="map w-100" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAC5d0P8m4kshSpotlmHmuCJyhA5FpTLu8&center={{$row->latitude}},{{$row->longitude}}&zoom=18" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<section class="email-section">
    <div class="container">
        <div class="row">
            <div class="card rounded-3">
                <div class="card-body">
                    <div class="col-lg-12 card-body">
                        <form action="{{route('send.email')}}" method="post">@csrf
                            <h1 class="display-3 font-Alumni-Sans-Inline-One text-center">Contact us via email</h1>
                            <div class="form-group row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label font-Tiro-Gurmukhi" for="name">
                                        Your name
                                    </label>
                                    <input type="text" name="name" id="name" class="form-control rounded-pill" placeholder="Your name">
                                    @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="form-label">
                                    <label class="form-label font-Tiro-Gurmukhi" for="email">
                                        Your email
                                    </label>
                                    <input type="text" name="email" id="email" class="form-control rounded-pill" placeholder="Your email">
                                    @error('email')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label font-Tiro-Gurmukhi" for="subject">
                                        Subject
                                    </label>
                                    <input type="text" name="subject" id="subject" class="form-control rounded-pill" placeholder="Your subject">
                                    @error('subject')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label font-Tiro-Gurmukhi" for="content">
                                        Your message
                                    </label>
                                    <textarea name="content" id="content" class="form-textarea form-control"></textarea>
                                    @error('content')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info btn-lg font-Tiro-Gurmukhi">Send email <i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</section>
<script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<!--tinymce-->
<script type="text/javascript" src="{{asset('plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/tinymce/js/tinymce/init-tinymce.js')}}"></script>
@endsection

