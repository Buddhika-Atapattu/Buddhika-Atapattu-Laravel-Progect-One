@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <h1 class="text-center font-Alumni-Sans-Inline-One display-3">View gallery image</h1>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="w-100" src="{{url($image->image_path)}}" alt="{{$image->id}} gallary image"/>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-3">
                                <label class="font-Tiro-Gurmukhi text-dark">
                                    Image link
                                </label>
                            </div>
                            <div class="row md-3">
                                <div class="card border-2 rounded-3">
                                    <p>
                                        {{$image->image_url}}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-Tiro-Gurmukhi text-dark">
                                    Image HTML embed
                                </label>
                            </div>
                            <div class="row mb-3">
                                <div class="card border-2 rounded-3">
                                    <p>
                                        &#60;img width="250px"  src="{{url($image->image_path)}}" alt="image-id-{{$image->id}}-gallary-image"/&#62;
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/backend/assets/js/view_gallery_image.js')}}"></script>
<script>
        $('#profile_image').ijaboCropTool({
            preview:'.user_picture',
            setRatio:4/4,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','CANCEL'],
            buttonsColor:['#0703fc','#fc0303', -15],
            processUrl:'{{ route("crop.image") }}',
            withCSRF:['_token','{{ csrf_token() }}'],

            onSuccess:function(message, element, status){
//                alert(message);
                $('#filename').val(message);
            },
            onError:function(message, element, status){
                alert(message);
            }
        });
//        
</script>
@endsection
