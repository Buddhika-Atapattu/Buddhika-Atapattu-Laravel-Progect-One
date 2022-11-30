@php
$homeSlider = App\Models\HomeSlide::find(1);
@endphp

<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
                    <img src="{{asset($homeSlider->home_slide)}}" alt="">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    {!!$homeSlider->title!!}
                    {!!$homeSlider->short_title!!}
                    <a href="{{route('about')}}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about us</a>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">Scroll down</a>
    </div>-->
    <div class="banner__video">
        <a href="{{'https://www.youtube.com/watch?v='.$homeSlider->video_url}}" class="popup-video"><i class="fas fa-play"></i></a>
    </div>

</section>