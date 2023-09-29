
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Profile</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


  </head>
  <body>
   
  @include('includes.header')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Change Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="{{route('search.products')}}" method="post">
                            @csrf
                            <input type="text" name="searchtext" required placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                        @foreach ($products as $productItem)
                        <li><a href="{{route('product.details', $productItem->id)}}">{{$productItem->ProductName}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <form enctype="multipart/form-data"  method="post" action="{{ route('password.update') }}"  class="checkout" >
                                @csrf
                                @method('put')
                                
                                     @if(session('success'))
                                     <div class="alert alert-success"">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('status') }}
                                     </div>
                                     @endif
                                     @if(session('error'))
                                     <div class="alert alert-danger">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('status') }}
                                     </div>
                                     @endif
    
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Change Password</h3>
                                          

                                          <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Current Password
                                                </label>
                                               
                                               <input name="current_password" type="password"  id="currentpassword"  required='true' placeholder="Current Password" class="form-control">
                                               <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" style="color: red;" />
                                            </p>
                                       
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">New Password
                                                </label>
                                               
                                              <input type="password" name="password" id="newpassword" required='true' placeholder="New Password" class="form-control">
                                              <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="color: red;" />
                                            </p>

                                           <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Confirm Password
                                                </label>
                                               
                                               <input type="password" name="password_confirmation" id="confirmpassword" value="" required='true' placeholder="Confirm Password" class="form-control">
                                               <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="color: red;"/>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                              <div class="form-row place-order">

                                            <button type="submit" name="submit"><i class="fa fa-check-square"></i> Update</button>


                                        </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>