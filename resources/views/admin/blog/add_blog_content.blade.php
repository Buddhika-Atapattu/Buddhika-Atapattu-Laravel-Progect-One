@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--page-content-->
<div class="page-content">
    <!--container-fluid-->
    <div class="container-fluid">
        <!--row-->
        <div class="row">
            <!--col-12-->
            <div class="col-lg-12">
                <!--card-->
                <div class="card">
                    <!--card body-->
                    <div class="card-body">
                        <!--page title-->
                        <h1 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One">Add Blog</h1>
                        <!--end page title-->
                        
                        <!--form-->
                        <form method="post" action="{{ route('store.blog.content') }}" enctype="multipart/form-data">@csrf
                            
                            <!--blog category-->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="blog_category">
                                        <option selected="" value="">Select...</option>
                                        @foreach($blog_category as $item)
                                        <option value="{{$item->id}}">{{$item->blog_category}}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end blog category-->
                            
                            <!--blog title-->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Blog title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input">
                                    @error('title')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end blog title-->
                            
                            <!--blog tags-->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input name="tags" class="form-control" type="text" id="example-text-input" value="NG International" data-role="tagsinput">
                                    @error('tags')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end blog tags-->
                            
                            <!--blog video url-->
                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label font-Tiro-Gurmukhi" role="button">Blog Video URL</label>
                                <div class="col-sm-10">
                                    <input type="text" name="video_url" id="video_url" class="form-control">
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <div class="col-sm-8 d-flex justify-content-center"><div class="w-100" id="videoPreview"></div></div>
                                    <div class="col-sm-2">&nbsp;</div>
                                </div>
                            </div>
                            <!--end blog video url-->
                            
                            <!--blog images-->
                            <div class="row mb-3">
                                <label for="images" class="col-sm-2 col-form-label btn btn-info font-Tiro-Gurmukhi" role="button">Blog images</label>
                                <div class="col-sm-10">
                                    <input type="file" class="d-none form-control" name="image[]" id="images" accept="image/*" multiple="true">
                                </div>
                            </div>
                            <!--end blog images-->
                            
                            <!--image preview-->
                            <div id="previewImages" class="row"></div>
                            <!--end image preview-->
                            
                            <!--blog content-->
                            <div class="row mb-3">
                                <label for="content" class="col-form-label font-Tiro-Gurmukhi">Blog Content</label>
                                <div class="col-sm-12">
                                    <textarea id="content" name="content"></textarea>
                                    @error('content')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end blog content-->
                            
                            <!--submit button-->
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-info waves-effect waves-light fw-bold font-Tiro-Gurmukhi" value="Insert Blog">
                                </div>
                            </div>
                            <!--end submit button-->
                        </form>
                        <!--end form-->
                    </div>
                    <!--end card body-->
                </div>
                <!--end card-->
            </div>
            <!--end col 12-->
        </div>
        <!--end row-->
    </div>
    <!--end container-fluid-->
</div>
<!--end page-content-->

<script src="{{asset('/backend/assets/js/blog_page.js')}}"></script>


@endsection