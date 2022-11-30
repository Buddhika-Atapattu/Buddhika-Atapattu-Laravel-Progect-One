@extends('frontend.main_master')
@section('about')
@php
$row = App\Models\AboutPage::find(1);
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
            <div class="col-12 d-flex justify-content-center">
                <img class="" src="{{(!empty($row->image))? url($row->image):url('image/upload/c/noImage.gif')}}" alt="contact-us">
            </div>
        </div>
    </div>
</section>
@endsection

