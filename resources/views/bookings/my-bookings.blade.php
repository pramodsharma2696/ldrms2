<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || My Booking</title>
    
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
                        <h2>My Booking's</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                               
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <table cellspacing="0" class="shop_table cart">
                            <tr>
                <th>#</th>
                <th>Booked By</th>
                <th>Booking Number</th>
                <th>Product Name</th>  
                <th>Booking Date</th>
                <th>Booking Status</th>
                <th>View Details</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td> {{ $bookings->firstItem()+$loop->index }} </td>
                <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                <td>{{ $booking->BookingNumber }}</td>
                <td>{{ $booking->product->ProductName }}</td>
                <td>{{ $booking->created_at }}</td>
                <td>{{ $booking->status }}</td>
             <td>
                <a href="{{route('single.booking.detail',$booking->id)}}" class="btn theme-btn-dash">View Details</a>
            </td>       

            </tr>
            @endforeach
        </tbody>
   
</tr>

</table>

   {{ $bookings->links() }}

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