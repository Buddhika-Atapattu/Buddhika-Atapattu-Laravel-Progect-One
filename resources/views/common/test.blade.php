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
        <title>Register</title>
        <!--ijaboCroptool css file-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}" rel="stylesheet" type="text/css" />
        
    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page my-4 mx-auto">
            <div class="container-fluid p-0 m-auto">
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-center">
                        <div id="alertdiv"></div>
                        
                    </div>
                </div>
                <div class="card m-auto">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{asset('image/Logo-with-red-color.png')}}" height="70" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('image/Logo-with-red-color.png')}}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data" autocomplete="off">@csrf
                                
                                <input type="hidden" class="form-control" name="filename" id="filename">
                                <input type="text" class="form-control d-none" name="remember_token" id="remember_token" value="{{$remember_token}}">
                                
                                <div class="row mb-3">
                                    <!--preview image for image upload-->
                                    <label for="profile_image" role="button" class="mx-auto">
                                        <div class="row">
                                            <div class="col-md-6 mx-auto">
                                                <div class="rounded-circle mx-auto">
                                                    <img id="previewImage" class="user_picture avatar-xl mx-auto mt-3 d-block rounded-circle shadow-4 img-thumbnail" src="{{(!empty($editData->profile_image))? url('image/upload/admin_update_image/'.$editData->profile_image):url('image/upload/admin_update_image/no_image.png')}}" alt="Avatar">
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <span class="text-muted text-center">Click the image to change the profile image</span>
                                    <!--upload input field-->
                                    <input type="file" name="profile_image" id="profile_image" class="d-none" accept="image/png,image/jpeg,image/gif,image/jpg">
                                </div>
                                
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required="required">
                                        @error('name')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="username" type="text" name="username"  placeholder="Username" required="required">
                                        @error('username')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                 
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" name="email" id="email"  placeholder="Email" required="required">
                                        @error('email')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input class="form-control" name="password" id="password" type="password"  autocomplete="new-password" placeholder="Password" required="required">
                                            <div id="show_password" class="input-group-text input-group-btn" role="button">
                                                <span><i id="icon" class="fas fa-eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')<span class="text-danger text-capitalize text-center">{{ $message }}</span>@enderror
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
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
                                
                                <div class="form-group mb-3 row">
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
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" required="required">
                                            <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="{{route('terms')}}" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <input type="submit" id="submit" disabled="disabled" class="btn btn-info w-100 waves-effect waves-light" value="Register">
                                    </div>
                                </div>
    
                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                        <a href="{{route('login')}}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        

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



<?php

namespace App\Mail\frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->details = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        
        return $this
                ->subject('Test')
                ->from('test@test.com')
                ->view('email.frontend_contact_us');
    }
}
