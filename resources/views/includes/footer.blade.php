    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}"> -->
<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Laptop & Desktop Rental<span>  Management System</span></h2>
 
                        <div class="footer-social">
                            <a href="#" ><i class="fa fa-facebook"></i></a>
                            <a href="#" ><i class="fa fa-twitter"></i></a>
                            <a href="#" ><i class="fa fa-youtube"></i></a>
                            <a href="#" ><i class="fa fa-linkedin"></i></a>
                            <a href="#" ><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Quick Links </h2>
                        <ul>
                  @if (Auth::check())
                    <li>  <a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                    <li> <a href="{{ route('index') }}">Home</a></li>
                    @endif
                     
                        <li><a href="{{route('laptop.shop')}}">Laptop</a></li>
                        <li><a href="{{route('desktop.shop')}}">Desktop</a></li>
                        <li><a href="{{route('get.about-us')}}">About</a></li>
                        <li><a href="{{route('get.contact-us')}}">Contact Us</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="{{route('laptop.shop')}}">Laptop</a></li>
                            <li><a href="{{route('desktop.shop')}}">Desktop</a></li>
                           
                        </ul>                        
                    </div>
                </div>
                
             
            </div>
        </div>
    </div> <!-- End footer top area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; Laptop & Desktop Rental Management System</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
      <!-- jQuery sticky menu -->

      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>