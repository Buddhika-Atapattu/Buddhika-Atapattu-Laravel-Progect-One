<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
        @php
        use Illuminate\Support\Facades\DB;
        $role = DB::table('roles')->whereIn('id',[3,4,5,6])->get();
        $remember_token = uniqid();
        @endphp
        @include('common.commonHeader')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
        <title>Register | NG International - Admin & Dashboard Template</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row main-row">
                <div class="row main-overlay">
                    <div class="card-register-col">
                        <div class="card w-100 p-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{asset('image/Logo-with-red-color.png')}}" height="70" class="logo mx-auto" alt="">
                                    <!--<img src="{{asset('image/Logo-with-red-color.png')}}" height="30" class="logo-light mx-auto" alt="">-->
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
                            </div>
                            <div class="row">
                                @if(session('error'))
                                <span class="alert alert-danger my-1 d-flex justify-content-center">{{session('error')}}</span>
                                @endif
                                @if(session('success'))
                                <span class="alert alert-success my-1 d-flex justify-content-center">{{session('success')}}</span>
                                @endif
                            </div>
                            <div class="row">
                                <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}" autocomplete="off">@csrf
                                    <input type="hidden" class="form-control" name="filename" id="filename">
                                    <input type="text" class="form-control d-none" name="remember_token" id="remember_token" value="{{$remember_token}}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <!--preview image for image upload-->
                                                <label for="profile_image" role="button" class="mx-auto">
                                                    <div class="row">
                                                        <div class="col-12 mx-auto">
                                                            <div class="rounded-circle mx-auto">
                                                                <img id="previewImage" class="user_picture mx-auto rounded-circle shadow-4 img-thumbnail" src="{{(!empty($editData->profile_image))? url('image/upload/admin_update_image/'.$editData->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Avatar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <span class="text-muted text-center">Click the image to change the profile image</span>
                                                <!--upload input field-->
                                                <input type="file" name="profile_image" id="profile_image" class="d-none" accept="image/png,image/jpeg,image/gif,image/jpg">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required="required">
                                                </div>
                                                @error('name')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <input class="form-control" id="username" type="text" name="username"  placeholder="Username" required="required">
                                                </div>
                                                @error('username')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <input class="form-control" type="email" name="email" id="email"  placeholder="Email" required="required">
                                                </div>
                                                @error('email')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <input class="form-control" type="text" name="address" id="address"  placeholder="Address" required="required">
                                                </div>
                                                @error('address')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <input class="form-control" name="password" id="password" type="password"  autocomplete="new-password" placeholder="Password" required="required">
                                                        <div id="show_password" class="input-group-text input-group-btn" role="button">
                                                            <span><i id="icon" class="fas fa-eye"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('password')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <input class="form-control" name="password_confirmation" id="password_confirmation" type="password"  autocomplete="new-password" placeholder="Password Confirmation" required="required">
                                                        <div id="show_password_confirmation" class="input-group-text input-group-btn" role="button">
                                                            <span><i id="pc_icon" class="fas fa-eye"></i></span>
                                                        </div>
                                                    </div>
                                                    @error('password_confirmation')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <select class="form-select" name="role_id" id="role_id" required="required">
                                                        <option value="">Register as</option>
                                                        @foreach($role as $item)
                                                        <option value="{{$item->id}}" class="text-capitalize">{{$item->display_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role_id')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-1 row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" required="required">
                                                        <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="{{route('terms')}}" class="text-muted">Terms and Conditions</a></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center row mt-3 pt-1  d-flex justify-content-center">
                                                <div class="col-4">
                                                    <input type="submit" id="submit" disabled="disabled" class="btn btn-info w-100 waves-effect waves-light btn-lg" value="Register">
                                                </div>
                                            </div>
                                            <div class="form-group mt-2 mb-0 row d-flex justify-content-center">
                                                <div class="col-12 mt-3 text-center">
                                                    <a href="{{route('login')}}" class="text-muted">Already have account?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        @include('common.bottom-js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
        <script src="{{asset('js/register_validation.js')}}"></script>
        <script src="{{asset('frontend/assets/js/scrollTop.js')}}"></script>
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
    </body>
</html>