
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title text-capitalize">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span class="text-capitalize">Dashboard</span>
                    </a>
                </li>
                
                @if(($roleID === 1) || ($roleID === 2))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-users-gear"></i>
                        <span class="text-capitalize">User management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.user.view')}}" class="text-capitalize">View All Users</a></li>
                        <li><a href="{{route('admin.user.add')}}" class="text-capitalize">Add New User</a></li>
                    </ul>
                </li>
                @endif
                
                @if(($roleID === 1) || ($roleID === 2))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-user-gear"></i>
                        <span class="text-capitalize">Role management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.role.management')}}" class="text-capitalize">View All Roles</a></li>
                        <li><a href="{{route('admin.role.add')}}" class="text-capitalize">Add New Role</a></li>
                        <li><a href="{{route('admin.view.all.role.permissions')}}" class="text-capitalize">View all role permissions</a></li>
                        <li><a href="{{route('admin.add.new.role.permission')}}" class="text-capitalize">Add new role permission</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{{route('admin.view.gallery')}}" class="waves-effect">
                        <i class="ri-gallery-fill"></i>
                        <span class="text-capitalize">Gallery</span>
                    </a>
                </li>
                

<!--                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span class="text-capitalize">Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-preloader.html">Preloader</a></li>
                                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>-->

                <li class="menu-title text-capitalize">Pages</li>
                
                @if(($roleID === 1) || ($roleID === 2))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-slideshow-3-line"></i>
                        <span class="text-capitalize">Home Slide Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('home.slide')}}" class="text-capitalize">Home Slide</a></li>
                        <li><a href="{{route('animated.slide')}}" class="text-capitalize">Animated Slide</a></li>
                    </ul>
                </li>
                @endif
                
                @if(($roleID === 1) || ($roleID === 2))
                <li>
                    <a href="{{route('admin.about')}}" class="waves-effect">
                        <i class="ri-building-fill"></i>
                        <span class="text-capitalize">About Us</span>
                    </a>
                </li>
                @endif
                
                @if(($roleID === 1) || ($roleID === 2))
                <li>
                    <a href="{{route('admin.contact')}}" class="waves-effect">
                        <i class="ri-phone-line"></i>
                        <span class="text-capitalize">Contact Us</span>
                    </a>
                </li>
                @endif
                
                @if(($roleID === 1) || ($roleID === 2) || ($roleID === 4))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-blog"></i>
                        <span class="text-capitalize">Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript: void(0);" class="has-arrow waves-effect"><span class="text-capitalize">Blog Content</span></a>
                            <ul>
                                <li><a href="{{route('all.blog.content')}}" class="text-capitalize">All Blog Content</a></li>
                                <li><a href="{{route('add.blog.content')}}" class="text-capitalize">Add Blog Content</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0);" class="has-arrow waves-effect"><span>Blog Category</span></a>
                            <ul>
                                <li><a href="{{route('all.blog.category')}}" class="text-capitalize">All Blog Category</a></li>
                                <li><a href="{{route('add.blog.category')}}" class="text-capitalize">Add Blog Category</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0);" class="has-arrow waves-effect"><span class="text-capitalize">Blog Tags</span></a>
                            <ul>
                                <li><a href="{{route('all.blog.tags')}}" class="text-capitalize">All Blog Tags</a></li>
                                <li><a href="{{route('add.blog.tags')}}" class="text-capitalize">Add Blog Tags</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif

<!--                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span class="text-capitalize">Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>-->

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
