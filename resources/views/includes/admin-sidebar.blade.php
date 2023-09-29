<nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="{{route('admin-dashboard')}}">LDRMS</a>
                </h1>
                
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{route('admin-dashboard')}}">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
     
                
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">
                        <i class="far fa-file"></i>
                        Brand
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="{{route('create-brand')}}">Add Brand</a>
                        </li>
                        <li>
                            <a href="{{route('brand.index')}}">Manage Brand</a>
                        </li>
                      
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        Products
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li>
                            <a href="{{route('create-product')}}">Add</a>
                        </li>
                        <li>
                            <a href="{{route('products.index')}}">Manage</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false">
                       <i class="far fa-window-restore"></i>
                        Pages
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu4">
                        <li>
                            <a href="{{route('add-aboutus')}}">About Us</a>
                        </li>
                        <li>
                            <a href="{{route('add-contactus')}}">Contact Us</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="{{route('reg-users')}}">
                        <i class="fa fa-users"></i>
                        Reg Users
                    </a>
                </li>
               
                <li>
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false">
                       <i class="far fa-window-restore"></i>
                        Booking For Rent
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu7">
                        <li>
                            <a href="{{route('get-new-bookings')}}">New Booking</a>
                        </li>
                        <li>
                            <a href="{{route('get-approved-bookings')}}">Approved Booking</a>
                        </li>
                        <li>
                            <a href="{{route('get-unapproved-bookings')}}">Unapproved Booking</a>
                        </li>
                        <li>
                            <a href="{{route('get-all-bookings')}}">All Booking</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                
               
               
                <li>
                    <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false">
                       <i class="far fa-window-restore"></i>
                        Report
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu8">
                        <li>
                            <a href="{{route('between.dates.report.form')}}">B/w dates Reports</a>
                        </li>
                        <li>
                            <a href="{{route('count.report.form')}}">Count Report</a>
                        </li>
                        <li>
                            <a href="{{route('sales.report.form')}}">Sales Report</a>
                        </li>
                       
                        
                    </ul>
                </li>

                 <li>
                    <a href="#pageSubmenu11" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-search"></i>
                        Search Booking
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11">
                        
                        <li>
                            <a href="{{route('search.form')}}">Search Booking</a>
                        </li>
                                            
                        
                    </ul>
                </li>
                <li>
                    <a href="{{route('get-user-queries')}}">
                        <i class="fa fa-comments"></i>
                            Inquiry and Feedback 
                    </a>
                </li>
               
            </ul>
            
        </nav>