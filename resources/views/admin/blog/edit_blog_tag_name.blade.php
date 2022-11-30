@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One">Edit Blog Tag name ({{$blog_edit_tag->tag_name}}) </h4> <br><br>
                        <form method="post" action="{{ route('update.blog.tag',$blog_edit_tag->id) }}" >@csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label font-Tiro-Gurmukhi">Blog Tag Name</label>
                                <div class="col-sm-10">
                                    <input name="tag_name" value="{{$blog_edit_tag->tag_name}}" class="form-control" type="text" id="example-text-input">
                                    @error('blog_category')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light font-Tiro-Gurmukhi" value="Update Blog Category">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>





@endsection