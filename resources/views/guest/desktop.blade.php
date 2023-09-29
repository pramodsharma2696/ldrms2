<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Desktop Page</title>
    
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    .slide-one {
        background-image: url('{{ asset('img/slide-1.jpg') }}');
    }

    .slide-two {
        background-image: url('{{ asset('img/slide-2.jpg') }}');
    }

    .slide-three {
        background-image: url('{{ asset('img/slide-3.jpg') }}');
    }
</style>
  </head>
  <body>
   
    
    
    
@include('includes.header')
    

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Desktop Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ asset('products/images/' . $product->Image) }}" width="400" height='200' style="border:solid 1px #000">
                        </div>
                        <h2><a href="{{route('product.details', $product->id)}}">{{$product->ProductName}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>
                            {{$product->RentalPrice}}/day</del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{route('product.details', $product->id)}}">More Details</a>
                        </div>                       
                    </div>
                </div>
                @endforeach
                
            </div>
            
            <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                         
                        {{ $products->links() }}

                        </nav>
                    </div>
        </div>
    </div>
    
    
@include('includes.footer')
    
  
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
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