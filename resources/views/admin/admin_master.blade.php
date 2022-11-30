@php
if(Auth::check()){
$id = Auth::user() -> id;
$adminData = App\Models\User::find($id);
$roleID = $adminData->role_id;
@endphp
<!doctype html>
<html lang="en">
    <head>
        
        <title>Dashboard | NG International - Admin & Dashboard Template</title>
        @include('common.commonHeader')

    </head>
    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            <!--header part-->
            @include('admin.body.header')
            

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.body.side-bar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <!--page main content part-->
                @yield('admin') <!-- make an id part of a yield as admin -->
               
                <!--footer part-->
                @include('admin.body.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!--right side bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- JAVASCRIPT -->
        @include('common.bottom-js');
        
    </body>

</html>
@php
}
else{
    return redirect('/login');
}
@endphp