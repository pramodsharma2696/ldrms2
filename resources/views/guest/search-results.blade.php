<!DOCTYPE html>
<html lang="en">
  <head>
    <
    <title>Laptop and Desktop Rental Management System || Search Result</title>
    
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
  </head>

  <body>
   
  @include('includes.header')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Search result againt keyword "{{ $searchText }}"</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if ($products->isEmpty())
        <h3 style="color:red;">No product Found againt this search</h3>
    @else
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            @foreach ($products as $product)
           <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ asset('products/images/' . $product->Image) }}" width="300" height='200' style="border:solid 1px #000">
                        </div>
                        <h2><a href="{{route('product.details', $product->id)}}">{{$product->ProductName}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>{{$product->RentalPrice}}/day</del>
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
                             <ul class="pagination" >
                             {{ $products->links() }}
                             </ul>
                        </nav>
                    </div>
        </div>
    </div>
    @endif
    @include('includes.footer')

   
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