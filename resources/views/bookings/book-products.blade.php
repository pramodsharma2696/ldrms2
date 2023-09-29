<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Book Your Product</title>
    
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


      <!-- Include jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  </head>
  <body>
   
  @include('includes.header')

    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Book Your Laptop or Desktop </h2>
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
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
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


                            <form enctype="multipart/form-data" action="{{route('book.order', $product->id)}}" class="checkout" method="post" >
                               @csrf
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Total number of days you want to rent this product: {{ $numberOfDays }} Days</h3>
                    

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">From Date <abbr title="required" class="required">*</abbr>
                                                </label>
                                               <input type="date" name="fromdate" required="true" class="form-control"  readonly value="{{ $fromDateStr }}">
                                               @error('fromdate')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">To Date <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="date" name="todate" required="true" class="form-control" readonly value="{{ $toDateStr }}">
                                                @error('todate')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                            </p> 
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Quantity<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="quantity" required="true" class="form-control"  value="{{ $quantity }}" readonly>
                                                @error('quantity')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last">
                                                <label class="">Order Price</label>
                                                <input type="text" name="totalCost" id="totalCost" value="{{ $totalCost }}" readonly class="form-control">
                                            </p>
                                            <!-- <p id="billing_last_name_field" class="form-row form-row-last">
                                                <label class="">Select Locking Period</label>
                                                <select name="lockingperiod" >
                                                    <option value="3 months">3 months</option>
                                                    <option value="6 months">6 months</option>
                                                    <option value="12 months">12 months</option>
                                                </select>
                                            </p> -->

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Used For<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select name="usedfor" required="true" >
                                                    <option value="" >Select</option>
                                                    <option value="Individual"  @if(old('usedfor') == 'Individual') selected @endif>Individual</option>
                                                    <option value="Corporate"  @if(old('usedfor') == 'Corporate') selected @endif>Corporate</option>
                                                </select>
                                                @error('usedfor')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                            </p>
                                       <div id="gstNumberField">
                                             <p id="billing_last_name_field" class="form-row form-row-last">
                                            <label class="">GST Number</label>
                                            <input type="text" name="GSTNO" class="form-control">
                                            @error('GSTNO')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                             </p>
                                         </div>    
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Select State<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select name="state" id="state"  class="js-example-responsive" >
                                                  <option value="">-- Select a State --</option>
                                                  @foreach ($states as $state)
                                                      <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                  @endforeach
                                              </select>
                                                @error('state')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Select City<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select name="city" id="city"  class="js-example-responsive" >
                                                    <option value="">-- Select a City --</option>
                                                </select>
                                            </p>


                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Delivery Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <textarea name="deladdress" required="true"  class="form-control">{{old('deladdress')}}</textarea>
                                                @error('deladdress')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror
                                                
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Delivery Address Proof<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="file" name="image" required="true" class="form-control">
                                                @error('image')
                                                <span style="color:red">{{$message}}</span>
                                              @enderror     
                                            </p>
                                         <input type="hidden" name="rentalprice" value="{{$product->RentalPrice}}">  

                                        </div>
                                    </div>
                                </div>

                             <div class="form-row place-order">
                                    <button type="submit" name="submit"><i class="fa fa-check-square"></i> Submit</button>
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
    
 <script>
$(document).ready(function() {

    // Add a change event listener to the "Used For" select element
    $("select[name='usedfor']").change(function() {
        // Check if the selected value is "Corporate"
        if ($(this).val() === "Corporate") {
            // If Corporate is selected, show the GST Number field
            $("#gstNumberField").show();
            $("input[name='GSTNO']").prop('required', true);
        } else {
            // If not Corporate, hide the GST Number field
            $("#gstNumberField").hide();
            $("input[name='GSTNO']").prop('required', false);
        }
    });
});
</script>

<script>
$(document).ready(function() {
    // Function to calculate the order price
    function calculatePrice() {
        const quantity = parseInt($("input[name='quantity']").val());
        const lockingPeriod = parseInt($("select[name='lockingperiod']").val());
        const rentalPricePerDay = parseFloat($("input[name='rentalprice']").val());

        // Calculate the total cost
        const totalPrice = quantity * lockingPeriod * rentalPricePerDay;

        // Update the order price field
        $("input[name='orderprice']").val(totalPrice.toFixed(2)); // You can adjust the formatting as needed
    }

    // Call the calculatePrice function when the quantity or locking period changes
    $("input[name='quantity'], select[name='lockingperiod']").on('change', calculatePrice);

    // Trigger the initial calculation
    calculatePrice();
});
</script>

<script>

   $(document).on('change', '#state', function() {
       var selectedStateId = $(this).val();
       var citySelect = $('#city');

       if (selectedStateId) {
           $.ajax({
               url: '{{ route('getCities') }}', // Use the Laravel route() helper to generate the URL
               type: 'GET',
               data: { stateId: selectedStateId },
               dataType: 'json',
               success: function(data) {
                   citySelect.empty();
                   citySelect.append('<option value="">-- Select a City --</option>');
                   $.each(data, function(key, value) {
                       citySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                   });
               },
               error: function(xhr, status, error) {
                   // Handle the error scenario
               }
           });
       } else {
           citySelect.empty();
           citySelect.append('<option value="">-- Select a City --</option>');
       }
   });
</script>

<script>
 // Prevent Double Submits
 document.querySelectorAll('form').forEach(form => {
	form.addEventListener('submit', (e) => {
		// Prevent if already submitting
		if (form.classList.contains('is-submitting')) {
			e.preventDefault();
		}
		
		// Add class to hook our visual indicator on
		form.classList.add('is-submitting');
	});
});
</script>
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