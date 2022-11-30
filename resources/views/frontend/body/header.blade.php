@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Models\userRole;
@endphp
<link rel="stylesheet" href="{{asset('font.css')}}"/>
<link rel="stylesheet" href="{{asset('scrollBar.css')}}"/>
<header class="navbar-header">
    <!--large screen-->
    <nav class="navbar navbar-expand-xl main-nav-bar p-0">
        <div class="navbar-over header-over-section three-d-effect w-100">
            <div class="container-fluid">
                <!--nav brand-->
                <div class="row w-100 mx-auto nav-brand">
                    <div class="d-flex justify-content-center">
                        <a class="navbar-brand text-decoration-none" href="/">
                            <img class="nav-company-logo" src="{{asset('image/Logo.png')}}" alt="company-logo"/>
                        </a>
                    </div>
                </div>
                <!--end nav brand-->
                
                <!--nav item-->
                <div class="row w-100 mx-auto navbar-item">
                    <div class="container-fluid" id="nav_item_overlay">
                        <div class="row w-100">
                            <!--menu item-->
                            <div class="col-12 d-flex mx-auto">
                                <div class="d-flex mx-auto">
                                    <ul class="d-flex">
                                        <!--home-->
                                        <li class="nav-item home-text">
                                            <a class="text-decoration-none" href="{{route('home')}}">
                                                <div class="row w-100 m-0">
                                                    <h4 class="text-center text-light m-0 font-Tiro-Gurmukhi item-text">Home</h4>
                                                </div>
                                                <div class="row w-100 m-0">
                                                    <p class="text-center text-light home triangle-up m-0 w-100">&#9650;</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end home-->

                                        <!--products-->
                                        <li class="nav-item product-text dropdown" id="dropdown_container" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <a class="text-decoration-none" href="javascript:void(0)" role="button" id="product_text">
                                                <div class="row w-100 m-0">
                                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi item-text" id="product">Products</h4>
                                                </div>
                                                <div class="row w-100 m-0">
                                                    <p class="text-center text-light products triangle-up p-0 m-0 w-100">&#9650;</p>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu-container" id="dropdownMenu">
                                                <div class="container-fluid p-0">
                                                    <div class="dropdown-overlay">
                                                        <!--Ladies Wear-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Ladies Wear</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Ladies Wear-->

                                                        <!--Mens Wear-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Mens Wear</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Mens Wear-->

                                                        <!--Kids Wear-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Kids Wear</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Kids Wear-->

                                                        <!--Knitwear-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Knitwear</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Knitwear-->

                                                        <!--Woven wear-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Woven wear</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Woven wear-->

                                                        <!--Fabrics-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Fabrics</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Fabrics-->

                                                        <!--Yarn-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">Yarn</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end Yarn-->

                                                        <!--P.P items-->
                                                        <div class="row m-auto">
                                                            <div class="col-12">
                                                                <h5>
                                                                    <a class="text-decoration-none text-center text-capitalize text-light font-Tiro-Gurmukhi" href="#">P.P items</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--end P.P items-->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!--end products-->

                                        <!--blog-->
                                        <li class="nav-item blog-text">
                                            <a class="text-decoration-none" href="{{route('blog')}}">
                                                <div class="row w-100 m-0">
                                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi item-text">Blog</h4>
                                                </div>
                                                <div class="row w-100 m-0">
                                                    <p class="text-center text-light blog triangle-up p-0 m-0 w-100">&#9650;</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end blog-->

                                        <!--about us-->
                                        <li class="nav-item about-text">
                                            <a class="text-decoration-none" href="{{route('about')}}">
                                                <div class="row w-100 m-0">
                                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi item-text">About us</h4>
                                                </div>
                                                <div class="row w-100 m-0">
                                                    <p class="text-center text-light about triangle-up p-0 m-0 w-100">&#9650;</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end about us-->

                                        <!--contact us-->
                                        <li class="nav-item contact-text">
                                            <a class="text-decoration-none" href="{{route('contact')}}">
                                                <div class="row w-100 m-0">
                                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi item-text">Contact us</h4>
                                                </div>
                                                <div class="row w-100 m-0">
                                                    <p class="text-center text-light contact triangle-up p-0 m-0 w-100">&#9650;</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end contact us-->

                                        <!--shop us-->
                                        <li class="nav-item shop-text">
                                            <a class="text-decoration-none" href="{{route('shop')}}">
                                                <div class="row w-100 m-0">
                                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi item-text">Shop</h4>
                                                </div>
                                                <div class="row w-100 m-0">
                                                    <p class="text-center text-light shop triangle-up p-0 m-0 w-100">&#9650;</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end shop us-->
                                    </ul>
                                </div>
                            </div>
                            <!--end menu item-->

                            <!--search bar-->
<!--                            <div class="col-4 m-auto p-0">
                                <form method="GET" action="{{route('search')}}" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control search-input" type="text" name="search_input" id="search_input" placeholder="Search...">
                                            <button type="submit" class="search-btn">    
                                                <div class="input-group-text " role="button">
                                                    <span>
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>-->
                            <!--end search bar-->

                            <!--admin-->
<!--                            <div class="col-2 p-0">
                                <div class="d-flex justify-content-end">
                                    @if(Auth::check())
                                    @php
                                        $id = Auth::user() -> id;
                                        $admin = User::find($id);
                                        $roleID = $admin->role_id;
                                    @endphp
                                    @if(($roleID === 1) || ($roleID === 2))
                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi admin">
                                        <a class="text-center text-decoration-none p-0" href="{{route('admin')}}">{{$admin->name}}</a>
                                    </h4>
                                    @else
                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi admin">
                                        <a class="text-center text-decoration-none p-0" href="{{route('user')}}">{{$admin->name}}</a>
                                    </h4>
                                    @endif
                                    
                                    @else
                                    <h4 class="text-center text-light p-0 m-0 font-Tiro-Gurmukhi login-register">
                                        <a class="nav-link text-light white hover-underline-animation p-0" href="{{route('login')}}">Login</a>/ 
                                        <a class="nav-link text-light white hover-underline-animation p-0" href="{{route('register')}}">Register</a>
                                    </h4>
                                    @endif
                                </div>
                            </div>-->
                            <!--end admin-->
                        </div>
                    </div>
                </div>
                <!--end nav item-->
            </div>
        </div>
    </nav>
    <!--end large screen-->
    
<!--################################################################################################################################################-->
    
    <!--small screen-->
    <nav class="navbar navbar-expand-xl mobile-navbar">
        <!--overlay-->
        <div class="mobile-navbar-overlay w-100">
            <!--container-->
            <div class="container-fluid">
                <!--image row-->
                <div class="row w-100 m-auto mb-3 image-row">
                    <!--image col-->
                    <div class="col-12 m-auto">
                        <!--image link-->
                        <a class="text-decoration-none d-flex m-auto" href="{{route('home')}}">
                            <!--company logo-->
                            <img class="m-auto w-60" src="{{asset('image/Logo.png')}}" alt="company-logo"/>
                        </a>
                        <!--end image link-->
                    </div>
                    <!--end image col-->
                </div>
                <!--end image row-->
                
                <!--menu button and user row-->
                <div class="row w-100 m-auto mb-1 mobile-menu-row">
                    <div class="col-9 font-Tiro-Gurmukhi text-light text-capitalize d-flex my-auto">
                        &nbsp;
<!--                        @if(Auth::check())
                        <a class="text-capitalize text-decoration-none text-light font-Tiro-Gurmukhi hover-underline-animation p-0">
                            @php
                                $id = Auth::user() -> id;
                                $admin = User::find($id);
                                echo $admin->name;
                            @endphp
                        </a>
                        @else
                        <a class="nav-link text-light white hover-underline-animation font-Tiro-Gurmukhi p-0" href="{{route('login')}}">Login</a>/ 
                        <a class="nav-link text-light white hover-underline-animation font-Tiro-Gurmukhi p-0" href="{{route('register')}}">Register</a>
                        @endif-->
                    </div>
                    <div class="col-3 m-auto">
                        <div class="d-flex justify-content-end text-light">
                            <div class="menu-button">
                                <i class="fas fa-toggle-off"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end menu button and user row-->
                <!--search bar row-->
<!--                <div class="row w-100 m-auto mobile-search-row">
                    <div class="col-12 m-auto">
                        <form method="GET" action="{{route('search')}}">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control search-input" type="text" name="search_input" id="search_input" placeholder="Search...">
                                    <button class="search-btn">    
                                        <div class="input-group-text">
                                            <span>
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>-->
                <!--end search bar row-->
                <!--menu item container row-->
                <div class="row w-100 position-fixed top-0 left-0">
                    <div class="container-fluid position-fixed mobile-menu-item-container">
                        <div class="row mobile-menu-item-sub-container">
                            <div class="pt-4 mobile-menu-item-sub-container-overlay">
                                <!--menu close button-->
                                <div class="row w-100 mb-4">
                                    <div class="col-12 d-flex justify-content-end my-auto text-light">
                                        <div class="menu-button">
                                            <i class="fas fa-toggle-on"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--end menu close button-->
                                <!--nav menu row-->
                                <div class="row d-flex w-100 mobile-menu-page-text-main-row">
                                    <ul>
                                        <!--home row-->
                                        <li class="nav-item m-0 p-0">
                                            <a class="text-decoration-none" href="{{route('home')}}">
                                                <div class="row w-100 mb-4">
                                                    <div class="col-9 d-flex my-auto">
                                                        <h5 class="font-Tiro-Gurmukhi text-capitalize text-light d-flex my-auto">home</h5>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <img class="mobile-menu-icon" src="{{asset('navigation/images/triangle-right.png')}}" alt="menu button"/>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end home row-->
                                        <!--product row-->
                                        <li class="nav-item mobile-dropdown m-0 p-0">
                                            <a class="text-decoration-none" href="javascript:void(0)">
                                                <div class="row w-100 mb-4">
                                                    <div class="col-9 d-flex my-auto">
                                                        <h5 class="font-Tiro-Gurmukhi text-capitalize text-light d-flex my-auto">product</h5>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <img class="mobile-menu-icon mobile-dropdown-icon" src="{{asset('navigation/images/triangle-right.png')}}" alt="menu button"/>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--dropdown-->
                                            <div class="row mobile-dropdown-main w-100">
                                                <div class="mobile-dropdown-container">
                                                    <ul>
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Ladies Wear</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Mens Wear</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Kids Wear</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Knitwear</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Woven wear</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Fabrics</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">Yarn</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                        <!--ladies wear-->
                                                        <li class="dropdown-item">
                                                            <a class="text-decoration-none" href="">
                                                                <h5 class="text-capitalize text-light text-center">P.P items</h5>
                                                            </a>
                                                        </li>
                                                        <!--end ladies wear-->
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end dropdown-->
                                        </li>
                                        <!--end product row-->
                                        <!--blog row-->
                                        <li class="nav-item m-0 p-0">
                                            <a class="text-decoration-none" href="{{route('blog')}}">
                                                <div class="row w-100 mb-4">
                                                    <div class="col-9 d-flex my-auto">
                                                        <h5 class="font-Tiro-Gurmukhi text-capitalize text-light d-flex my-auto">blog</h5>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <img class="mobile-menu-icon" src="{{asset('navigation/images/triangle-right.png')}}" alt="menu button"/>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end blog row-->
                                        <!--about row-->
                                        <li class="nav-item m-0 p-0">
                                            <a class="text-decoration-none" href="{{route('about')}}">
                                                <div class="row w-100 mb-4">
                                                    <div class="col-9 d-flex my-auto">
                                                        <h5 class="font-Tiro-Gurmukhi text-capitalize text-light d-flex my-auto">about us</h5>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <img class="mobile-menu-icon" src="{{asset('navigation/images/triangle-right.png')}}" alt="menu button"/>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end about row-->
                                        <!--contact row-->
                                        <li class="nav-item m-0 p-0">
                                            <a class="text-decoration-none" href="{{route('contact')}}">
                                                <div class="row w-100 mb-4">
                                                    <div class="col-9 d-flex my-auto">
                                                        <h5 class="font-Tiro-Gurmukhi text-capitalize text-light d-flex my-auto">contact us</h5>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <img class="mobile-menu-icon" src="{{asset('navigation/images/triangle-right.png')}}" alt="menu button"/>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end contact row-->
                                        <!--shop row-->
                                        <li class="nav-item m-0 p-0">
                                            <a class="text-decoration-none" href="{{route('contact')}}">
                                                <div class="row w-100 mb-4">
                                                    <div class="col-9 d-flex my-auto">
                                                        <h5 class="font-Tiro-Gurmukhi text-capitalize text-light d-flex my-auto">Shop</h5>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <img class="mobile-menu-icon" src="{{asset('navigation/images/triangle-right.png')}}" alt="menu button"/>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--end shop row-->
                                    </ul>
                                </div>
                                <!--end nav menu row-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end menu item container row-->
            </div>
            <!--end container-->
        </div>
        <!--end overlay-->
    </nav>
    <!--end small screen-->
</header>