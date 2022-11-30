@extends('frontend.main_master')
@section('blog')
<link rel="stylesheet" href="{{asset('frontend/assets/css/view_blog.css')}}">
<section class="blog-search-section mt-4">
    <div class="container">
        @foreach($blog as $blog)
        <div class="row mb-3">
            @foreach($user as $admin)
            @if($admin->id == $blog->user_id)
            <div class="col-1 d-flex m-auto">
                <img class="card-img-top rounded-circle avatar-xl mx-auto" src="{{(!empty($admin->profile_image))? url('image/upload/admin_update_image/'.$admin->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Card image cap">
            </div>
            <div class="col-11 d-flex m-auto">
                <h4 class="text-capitalize text-dark font-Tiro-Gurmukhi mb-0">Blog Writer: {{$admin->name}}</h4>
            </div>
            @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 text-capitalize text-center text-dark font-Tiro-Gurmukhi">{{$blog->blog_title}}</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-7 m-auto">
                @if($blog_images->count() > 0 )
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($blog_images as $count)
                        @if($count->count_id == 1)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$count->count_id - 1}}" class="active"></li>
                        @endif
                        @if($count->count_id !== 1)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$count->count_id - 1}}"></li>
                        @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($blog_images as $image)
                        @if($image->count_id == 1)
                        <div class="carousel-item active">
                            <img class="d-block w-100 blog-view-image" src="{{url($image->image)}}" alt="blog images">
                        </div>
                        @endif
                        @if($image->count_id !== 1)
                        <div class="carousel-item">
                            <img class="d-block w-100 blog-view-image" src="{{url($image->image)}}" alt="blog images">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @else
                &nbsp;
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <h5 class="text-capitalize text-dark font-Tiro-Gurmukhi">Blog Category: {{$blog->blog_category}}</h5>
            </div>
            <div class="col-8">
                <h5 class="text-capitalize text-dark font-Tiro-Gurmukhi">Blog Tags:
                    @php $tag = explode(',',$blog->blog_tags) @endphp
                    @foreach($tag as $t)
                    <span class="label label-default bg-dark text-light py-1 px-4 rounded-pill">{{ $t }}</span>
                    @endforeach
                </h5>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                {!! $blog->blog_content !!}
            </div>
        </div>
        <div class="row my-3">
            <div class="col-6 d-flex justify-content-center mx-auto">
                @if($blog->blog_video_url !== "")
                <iframe width="100%"  class="embed-responsive-item video" id="videoPreview" src="{{(!empty($blog->blog_video_url))? url('https://www.youtube.com/embed/'.$blog->blog_video_url):url('https://www.youtube.com/embed/')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection