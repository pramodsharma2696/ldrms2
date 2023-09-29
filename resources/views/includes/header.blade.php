    <!-- Custom CSS -->


<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                            <li><a href="{{ route('profile.edit') }}"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href=" {{ route('profile.change-password')}} "><i class="fa fa-heart"></i> Change Password</a></li>
                            <li>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fa fa-user"></i> Logout
                            </x-dropdown-link>
                        </form>
                            </li>
                            <li><a href="{{ route('bookings.index') }}"><i class="fa fa-lock"></i> My Booking</a></li>
           
                    @endauth
                </div>
            @endif


                        </ul>
                    </div>
                </div>
                @guest
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            
                           
                            <li><a href="{{ route('loginPage') }}" ><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="{{ route('register') }}" ><i class="fa fa-sign-in"></i> Signup</a></li>
                            <!-- <li><a href="admin/login.php"><i class="fa fa-user"></i> Admin</a></li> -->
                       
                        </ul>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1>
                        @if (Auth::check())
                          <a href="{{ route('dashboard') }}">Laptop & Desktop Rental<span>  Management System</span>
                         @else
                         <a href="{{ route('index') }}">Laptop & Desktop Rental<span>  Management System</span>
                        @endif
                        </a>
                    </h1>
                    </div>
                </div>
                
              
            </div>
        </div>
    </div> <!-- End site branding area -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    @if (Auth::check())
                       <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                           <a href="{{ route('dashboard') }}" class="add_to_cart_button" style="color: #fff !important">Dashboard</a>
                       </li>
                   @else
                       <li class="{{ request()->is('/') ? 'active' : '' }}">
                           <a href="{{ route('index') }}" class="add_to_cart_button" style="color: #fff !important">Home</a>
                       </li>
                   @endif
                  <li class="{{ request()->is('laptop*') ? 'active' : '' }}">
                        <a href="{{ route('laptop.shop') }}">Laptop</a>
                    </li>
                    <li class="{{ request()->is('desktop*') ? 'active' : '' }}">
                        <a href="{{ route('desktop.shop') }}">Desktop</a>
                    </li>
                    <li class="{{ request()->is('get/about-us*') ? 'active' : '' }}">
                        <a href="{{ route('get.about-us') }}">About</a>
                    </li>
                    <li class="{{ request()->is('get/contact-us*') ? 'active' : '' }}">
                        <a href="{{ route('get.contact-us') }}">Contact Us</a>
                    </li>
                        
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
      <!-- jQuery sticky menu -->
