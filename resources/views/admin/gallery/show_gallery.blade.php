@extends('admin.admin_master')
@section('admin')
<!--<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="page-content">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="card p-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <form method="POST" id="my-great-dropzone" class="dropzone d-flex  dz-clickable dropzoneForm" action="{{route('admin.upload.gallery')}}" enctype="multipart/form-data">@csrf
                            <h1 class="dz-message text-center text-capitalize text-dark font-Tiro-Gurmukhi m-auto cursor-pointer">Drag and drop images <i class="ri-folder-upload-line"></i></h1>
                            @error('file')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </form>
                        <div class="row">
                            <span class="text-muted text-center">
                                Only allow image types are ".png/ .jpg/ .gif/ .bmp/ .jpeg" and after image uploaded.
                            </span>
                        </div>
                        <div class="row">
                            <div class="mt-3" align="center">
                                <button type="submit" class="btn btn-info upload" id="upload">Upload Images</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default mt-3">
                    <div class="panel-heading">
                        <h3 class="panel-title font-Tiro-Gurmukhi">Uploaded Image</h3>
                    </div>
                    <div class="panel-body card m-3 border-2 border-secondary p-3 rounded-3">
                        <div id="preview"></div>
                        <div class="row">
                            {!! $output !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/backend/assets/js/gallery.js')}}"></script>
<script>
Dropzone.options.myGreatDropzone = {
    aramName: "file", // The name that will be used to transfer the file
    method: "post",
    autoProcessQueue: false,
//    uploadMultiple: true,
    acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
    maxFilesize: 10,
    thumbnailWidth: 120,
    thumbnailHeight: 120,
    thumbnailMethod:"crop",
    resizeWidth: 1024,
    resizeHeight: 768,
    resizeMethod: "contain",
    
    init:function(){
        var upload = document.querySelector('#upload');
        var dropzone = this;
        
        upload.addEventListener('click', function(){
            dropzone.processQueue();
            
        });
        
        this.on('complete', function(){
            if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0){
                var _this = this;
                _this.removeAllFiles();
                location.reload();
            }
        });
    }
};
</script>

@endsection