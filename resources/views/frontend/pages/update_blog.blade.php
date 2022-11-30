@extends('frontend.main_master')
@section('blog')
@if(Auth::check())
@php 
$id = Auth::user() -> id;
$user = App\Models\User::find($id);
@endphp
<section class="blog-insert-section">
    <div class="container">
        <div class="row">
            <div class="card blog-insert-card">
                <div class="row blog-insert-user-row">
                    <div class="col-1 d-flex my-auto">
                        <img class="card-img-top rounded-circle avatar-xl mx-auto" src="{{(!empty($user->profile_image))? url('image/upload/admin_update_image/'.$user->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Card image cap">
                    </div>
                    <div class="col-11 d-flex my-auto">
                        <label class="fw-title font-Tiro-Gurmukhi h4 text-light">| {{$user->name}}</label>
                    </div>
                </div>
                <form method="POST" action="{{route('blog.update')}}">@csrf
                    <div class="form-group row tag-row">
                        <div class="col-12">
                            <input type="text" class="form-control tag-input" name="blog_tag" id="blog_tag" placeholder="Tags" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="row form-group blog-title">
                        <div class="col-12">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title...">
                        </div>
                    </div>
                    <div class="form-group row blog-textarea">
                        <div class="col-12">
                            <textarea id="blog_textarea" name="blog_textarea"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="blog-submit" value="Save blog">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endif
@endsection