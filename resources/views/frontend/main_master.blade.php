<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="{{asset('image/Company-logo.png')}}">
        <!-- Place favicon.ico in the root directory -->
        
                <!-- CSS here -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/responsive.css')}}">        
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/main.css')}}">        
        <link rel="stylesheet" type="text/css" href="{{asset('font.css')}}">        
        <link rel="stylesheet" type="text/css" href="{{asset('scrollbar.css')}}">        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@600&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('navigation/navStyle.css')}}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
        <title>NG International</title>
        
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('frontend.body.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>
            @yield('main')
            @yield('about')
            @yield('blog')
            @yield('contact')
            @yield('product')
        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
        @include('frontend.body.footer')
        <!-- Footer-area-end -->




		<!-- JS here -->

        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/caf2306f51.js" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
        <!--<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>-->
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/element-in-view.js')}}"></script>
        <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/ajax-form.js')}}"></script>
        <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
        <script src="{{asset('frontend/assets/js/main.js')}}"></script>
        <script src="{{asset('frontend/assets/js/scrollTop.js')}}"></script>
        <script src="{{asset('navigation/navJs.js')}}"></script>
        
        <!--google map-->
        <script type="text/javascript" src="{{ asset('backend/assets/js/google_map.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC5d0P8m4kshSpotlmHmuCJyhA5FpTLu8&libraries=places&callback=initialize"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!--JS and Javascript -->
        <script>
         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}";
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
         }
         @endif 
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </body>
</html>

