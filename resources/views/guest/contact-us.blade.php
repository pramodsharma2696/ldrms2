<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || About Us</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
  </head>
  <body>
   
    
    
    
    
    
  @include('includes.header')

  
  <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>CONTACT US</h2>
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
                        <h2 class="sidebar-title">{{$data->PageTitle}}</h2>
                        <p><i class="fa fa-map-marker"></i>  {{$data->PageDescription}}</p>
                       <p><i class="fa fa-phone"></i> {{$data->MobileNumber}}</p>
                       <p><i class="fa fa-envelope"></i> {{$data->Email}}</p>
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


                            <form method="POST" action="{{ route('store_inquiry') }}">
                            @csrf
                            @if(session('success'))
                                     <div class="alert alert-success">
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
                                            <h3>Drop Us A Message With Any Inquiry</h3>
                                          

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">First Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                               <input type="text" placeholder="Enter First Name" name="first_name" value="{{old('first_name')}}"  required="true" class="input-text">
                                               @error('first_name')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror    
                                            </p>
                   

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Last Name<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" placeholder="Enter Last Name" name="last_name" value="{{old('last_name')}}"  required="true" class="form-control">
                                                @error('last_name')
                                                  <span style="color:red">{{$message}}</span>
                                                @enderror  
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" placeholder="Enter Phone Number" name="phone" value="{{old('phone')}}" required="true" class="form-control">
                                                @error('phone')
                                                  <span style="color:red">{{$message}}</span>
                                                @enderror  
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Email <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="email" placeholder="Enter Your Email Address" name="email" value="{{old('email')}}" required="true" class="form-control">
                                                @error('email')
                                                  <span style="color:red">{{$message}}</span>
                                                @enderror  
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Message <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <textarea name="message" id="message" rows="4" required>  </textarea> 
                                                @error('message')
                                                  <span style="color:red">{{$message}}</span>
                                                @enderror  
                                            </p>
                                        </div>
                                    </div>
                                </div>
                              <div class="form-row place-order">
                                            <button type="submit" ><i class="fa fa-check-square"></i> Submit</button>
                                        </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    @include('includes.footer')
    
  

    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
 
    
    <!-- jQuery easing -->
    <script src="{{ asset('js/jquery.easing.1.3.min.js') }}"></script>

    
    <!-- Main Script -->
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>