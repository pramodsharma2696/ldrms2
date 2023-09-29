<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Single Product Details</title>
    
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
                        <h2>Single Product Details</h2>
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
                        

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                <div class="product-main-img">
                                        <img src="{{ asset('products/images/' . $product->Image) }}" alt="{{ $product->ProductName }}">
                                    </div>

                                    
                                    <div class="product-gallery">
                                    <img src="{{ asset('products/images/' . $product->Image1) }}" alt="{{ $product->ProductName }}">
                                    <img src="{{ asset('products/images/' . $product->Image2) }}" alt="{{ $product->ProductName }}">
                                    <img src="{{ asset('products/images/' . $product->Image3) }}" alt="{{ $product->ProductName }}">
                                    <img src="{{ asset('products/images/' . $product->Image4) }}" alt="{{ $product->ProductName }}">                                
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->ProductName }}</h2>
                                    <div class="product-inner-price">
                                        <ins> Rent Price: Rs: {{ $product->RentalPrice }}/day</ins>
                                    </div>
                                    
                                    <div role="tabpanel">
                      
                                        <h3 class="add_to_cart_button">Product Description</h3>
                                        <div class="tab-content">
                                                              <!-- Quantity Input Field -->
                             
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                
                                                <p>{{ $product->ProductDescription }}.</p>
                                                <p><strong>Type: </strong>{{ $product->Type }}.</p>
                                                <p><strong>Processor: </strong>{{ $product->Processor }}.</p>
                                                <p><strong>Screen: </strong>{{ $product->Screen }}.</p>
                                                <p><strong>RAM: </strong>{{ $product->RAM }}.</p>
                                                <p><strong>Storage: </strong>{{ $product->Storage }}.</p>
                                                <p><strong>Charges: </strong>{{ $product->Charges }}.</p>
                                                <p><strong>Rental Price: </strong>Rs: {{ $product->RentalPrice }} (per day).</p>
                                                <p><strong>Product Model: </strong>{{ $product->ProductModel }}.</p>
                                                </div>

                                          </div>
                                          </div>
                                    @if (Auth::check())
                                    <form method="POST" action="{{ route('book.product', $product->id) }}">
                                                    @csrf
                                                <p><strong>Quantity: </strong><input type="number" id="quantity" name="quantity" value="1" min="1" max="5"  class="form-control" ></p>
                                                <p><strong>Select Locking Period: </strong>
                                                <select  name="lockingperiod" id="lockingperiod" class="form-control"  value="{{ old('lockingperiod') }}">
                                                  <option value="" selected>Select Locking Period</option>
                                                    <option value="3">3 months</option>
                                                    <option value="6">6 months</option>
                                                    <option value="12">12 months</option>
                                                    <option value="manual">Select Manually</option>
                                                </select>
                                                @error('lockingperiod')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                                </p>
                                                <div id="dateInputs" style="display: none;">
                                         <p><strong>From Date: </strong>
                                            <input type="date" name="fromdate" id="fromdate" required="true" class="form-control" value="{{ old('fromdate') }}">
                                            @error('fromdate')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p><strong>To Date: </strong>
                                            <input type="date" name="todate" id="todate" required="true" class="form-control" value="{{ old('todate') }}">
                                            @error('todate')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </p>
                                      </div>
                                                <button type="submit" class="add_to_cart_button" style="color: #fff !important">Rent Now</button>
                                    </form>
                                   @else

                                       <a href="{{ route('loginPage') }}" class="add_to_cart_button" style="color: #fff !important">Log In to Book</a>
                                   @endif
                                 
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>                
                </div>
            </div>
        </div>
    </div>


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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const fromDateInput = document.getElementById("fromdate");
        const toDateInput = document.getElementById("todate");

        // Set the minimum date for the "From Date" input to today's date
        fromDateInput.min = new Date().toISOString().slice(0, 10);

        fromDateInput.addEventListener("change", function () {
            const fromDate = new Date(fromDateInput.value);
            const minToDate = new Date(fromDate);
            minToDate.setMonth(minToDate.getMonth() + 3); // Minimum locking period of 3 months

            if (toDateInput.value === "" || new Date(toDateInput.value) < minToDate) {
                toDateInput.value = minToDate.toISOString().slice(0, 10); // Set the "To Date" to the minimum allowed date
            }

            // Update the minimum date for the "To Date" input to 3 months after the "From Date"
            toDateInput.min = minToDate.toISOString().slice(0, 10);
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const lockingPeriodDropdown = document.getElementById("lockingperiod");
        const dateInputs = document.getElementById("dateInputs");
        const fromDateInput = document.getElementById("fromdate");
        const toDateInput = document.getElementById("todate");

        lockingPeriodDropdown.addEventListener("change", function () {
            if (lockingPeriodDropdown.value === "manual") {
                dateInputs.style.display = "block";
            } else {
                dateInputs.style.display = "none";

                // Automatically set the dates based on the locking period
                const today = new Date();
                const endDate = new Date(today);
                endDate.setMonth(endDate.getMonth() + parseInt(lockingPeriodDropdown.value));

                fromDateInput.value = today.toISOString().slice(0, 10);
                toDateInput.value = endDate.toISOString().slice(0, 10);
            }
        });
    });
</script>
  </body>
</html>