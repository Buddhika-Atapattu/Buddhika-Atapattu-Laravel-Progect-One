@extends('frontend.main_master')
@section('blog')

<section class="blog-search-section">
    <div class="container">
        <div class="row mb-4">
            <div class="input-group blog-search-input-group">
                <input type="text" class="form-control blog-search-input" name="search" id="search" placeholder="Search blog..." autocomplete="off" onfocus="this.value=''">
            </div>
            <div class="row search-container-row">
                <div class="col-12 search-container-col">
                    <div class="card">
                        <div class="card-body">
                            <div class="search-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($blog as $blog_all)
        <div class="row mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row my-1">
                        @foreach($user as $admin)
                        @if($admin->id == $blog_all->user_id)
                        <div class="col-1 d-flex m-auto">
                            <img class="card-img-top rounded-circle avatar-xl mx-auto" src="{{(!empty($admin->profile_image))? url('image/upload/admin_update_image/'.$admin->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Card image cap">
                        </div>
                        <div class="col-11 d-flex m-auto">
                            <h4 class="text-capitalize text-dark font-Tiro-Gurmukhi mb-0">{{$admin->name}}</h4>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <h2 class="text-center text-capitalize text-dark cursor-default font-Tiro-Gurmukhi">{{$blog_all->blog_title}}</h2>
                    <div class="row">
                        <div class="col-5">
                            <h5 class="text-capitalize text-dark cursor-default font-Tiro-Gurmukhi">Blog Category: {{$blog_all->blog_category}}</h5>
                        </div>
                        <div class="col-7">
                            <h5 class="text-capitalize text-dark cursor-default font-Tiro-Gurmukhi">Blog Tags:
                                @php $tag = explode(',',$blog_all->blog_tags) @endphp
                                @foreach($tag as $t)
                                <span class="bg-dark text-light py-1 px-3 rounded-pill">{{ $t }}</span> 
                                @endforeach
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                            @foreach($blog_images as $image)
                            @if(($image->blog_id == $blog_all->id) && ($image->count() > 0))
                            <img class="blog-preview-image" src="{{url($image->image)}}" alt="Blog image"/>
                            @else
                            &nbsp;
                            @endif
                            @endforeach
                        </div>
                        <div class="col-6">
                            <p class="text-center text-dark">
                                @php
                                $content = $blog_all->blog_content;
                                $start = strpos($content, '<p>');
                                $end = strpos($content, '</p>', $start);
                                echo $paragraph = substr($content, $start, $end-$start+4);
                                @endphp
                            </p>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <a href="{{route('view.blog',$blog_all->id)}}" class="btn btn-blue pull-right">Read More <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <p class="text-capitalize text-center text-dark font-Tiro-Gurmukhi">Created at: {{Carbon\Carbon::parse($blog_all->created_at)->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--Pagination-->
        <div class="d-flex justify-content-center">
            {{$blog->onEachSide(1)->links()}}
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/frontend/assets/js/frontend_blog_page.js')}}"></script>
@endsection
