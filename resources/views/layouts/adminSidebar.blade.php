<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light pl-5">Admin AllWin </span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/admin_public/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin AllWin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                <li class="nav-item">
                    <a href="{{ route ('admin/dashboard') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a href="{{ route ('admin/cms') }}" class="nav-link">-->
                <!--        <i class="far fa-circle nav-icon"></i>-->
                <!--        <p>cms</p>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a href="{{ route ('admin/blog') }}" class="nav-link">
                        <i class="far fa-comment-alt nav-icon"></i>
                        <p>Blog</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route ('admin/faq') }}" class="nav-link">
                        <i class="far fa-comment-alt nav-icon"></i>
                        <p>Blog Faq</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route ('admin/whatourclientsay') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>What Our Client Says</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url ('/admin/displayvideo') }}" class="nav-link">
                        <i class="far fa-play-circle nav-icon"></i>
                        <p>Videos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url ('admin/displayourclient') }}" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>Our Clients</p>
                    </a>
                </li>
                </li>
              
                <li class="nav-item">
                    <a href="{{ url ('admin/product') }}" class="nav-link">
                        <i class="fas fa-barcode nav-icon"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                       Inquiry
                    <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin/productpricelist') }}" class="nav-link">
                                <i class="far fa-circle nav-icon nav-icon"></i>
                                <p>Product Price Listing</p>
                            </a>
                        </li>   
                        <li class="nav-item">
                            <a href="{{ route('admin/qouteinquiry') }}" class="nav-link">
                                <i class="far fa-circle nav-icon nav-icon"></i>
                                <p>Quote</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="{{ route('admin/inquiryheader') }}" class="nav-link">
                                <i class="far fa-circle nav-icon nav-icon"></i>
                                <p>Quote Header</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="{{ route('admin/distributor') }}" class="nav-link">
                                <i class="far fa-circle nav-icon nav-icon"></i>
                                <p>Distributor Inquiry</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="{{ route('admin/venture') }}" class="nav-link">
                                <i class="far fa-circle nav-icon nav-icon"></i>
                                <p>venture Inquiry</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="{{ route('admin/Catelogue') }}" class="nav-link">
                                <i class="far fa-circle nav-icon nav-icon"></i>
                                <p>Catelogue</p>
                            </a>
                        </li>  
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url ('admin/category') }}" class="nav-link">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route ('admin/certificate') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Certificate</p>
                    </a>
                </li>          
                <li class="nav-item">
                    <a href="{{ route ('admin/productapp') }}" class="nav-link">
                        <i class="fas fa-file nav-icon"></i>
                        <p>Product Application</p>
                    </a>
                </li>   
                {{-- <li class="nav-item">
                    <a href="{{ route('admin/productpricelist') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Product Price Listing</p>
                    </a>
                </li>   
                <li class="nav-item">
                    <a href="{{ route('admin/qouteinquiry') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Quote</p>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="{{ route('admin/inquiryheader') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Quote Header</p>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="{{ route('admin/distributor') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Distributor Inquiry</p>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="{{ route('admin/Catelogue') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Catelogue</p>
                    </a>
                </li>   --}}
                <li class="nav-item">
                    <a href="{{ route ('admin/casestudy') }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Case study</p>
                    </a>
                </li>        
                    
                {{-- <li class="nav-item">
                    <a href="{{ route('admin/news') }}" class="nav-link">
                        <i class="far fa-newspaper nav-icon"></i>
                        <p>News</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin/socialmedia') }}" class="nav-link">
                        <i class="fa fa-hashtag nav-icon"></i>
                        <p>Social Media</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin/solarstore') }}" class="nav-link">
                        <i class="fa fa-solar-panel nav-icon"></i>
                        <p>Solar Store</p>
                    </a>
                </li> --}}
           
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                        <p>LogOut</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
