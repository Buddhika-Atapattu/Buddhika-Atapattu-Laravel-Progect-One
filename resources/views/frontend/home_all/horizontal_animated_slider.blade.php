@php
$selectedAnimation = App\Models\selected_animation::find(1);
$selectedID = $selectedAnimation->id;
$images = App\Models\AnimatedSliderImages::all();
$imageCount = (int)$images->count();
$text = App\Models\AnimatedSliderText::find(1);
if($imageCount === 10){
@endphp
<link rel="stylesheet" href="{{asset('frontend/assets/css/'.$section->style.'.css')}}">
<section class="animated-slider-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 slider-row">
                <div class="slider">
                    @foreach($images as $item)
                    <span style="--i:{{$item->id}};"><img src="{{(!empty($item->image))? url($item->image):url('image/upload/animatedSlider/noimage.jpg')}}" alt="Horizontal-image-{{$item->id}}"></span>
                    @endforeach
                </div>
            </div>
            <div class="col-6" style="padding-left: 70px;">
                {!!$text->title!!}
                {!!$text->sub_title!!}
                @php
                $content = $text->content;
                $start = strpos($content, '<p>');
                $end = strpos($content, '</p>', $start);
                echo $paragraph = substr($content, $start, $end-$start+4);
                @endphp
            </div>
        </div>
    </div>
</section>
@php
}
else{
@endphp
<section class="animated-slider-section">
    <div class="container-fluid">
        <div class="row w-100 cube-row">
            <div class="col-6">
                <div class="wrapper">
                    <div class="cube-box">
                        @foreach($images as $item)
                        <img src="{{(!empty($item->image))? url($item->image):url('image/upload/animatedSlider/noimage.jpg')}}" alt="Horizontal-image-{{$item->id}}">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-6" style="padding-left: 70px;">
                {!!$text->title!!}
                {!!$text->sub_title!!}
                @php
                $content = $text->content;
                $start = strpos($content, '<p>');
                $end = strpos($content, '</p>', $start);
                echo $paragraph = substr($content, $start, $end-$start+4);
                @endphp
            </div>
        </div>
    </div>
</section>
<script src="{{asset('frontend/assets/js/'.$section->js.'.js')}}"></script>
@php
}
@endphp