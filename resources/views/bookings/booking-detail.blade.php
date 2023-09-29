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

    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
  </head>
  <body>
   
  @include('includes.header')

    
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>My Booking</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <b>#{{$booking->BookingNumber}} Booking Details</b>
                             <div class="row">
                    <div class="col-lg-12">

                    <p style="color:#000"><b>Booking #</b>{{$booking->id}}</p>
                    <p style="color:#000"><b>Booking Date : </b>{{$booking->DateofBooking}}</p>
                    <p style="color:#000"><b>State </b>{{$booking->state->name}}</p>
                    <p style="color:#000"><b>City : </b>{{$booking->city->name}}</p>
                    <p style="color:#000"><b>Booking Status :</b>
                                 @php
                                    $status = $booking['status'];
                                @endphp
                                
                                @if ($status == "approved")
                                       Booking has been approved
                                @elseif ($status == "unapproved")
                                       Booking has been Unapproved
                                @else
                                      Waiting for confirmation
                                @endif
</p>

<!-- Invoice -->
<p>
  <a href="{{route('invoice.detail', $booking->id )}}" target="_blank"  title="Booking Invoice" style="color:#000">  <strong style="color:red">Invoice</strong></a>
</p>
                     
                      </div>
                      </div>   
                                     <div class="row" style="margin-top:1%">
                      <div class="col-lg-12">
                     
                     
                     <table cellspacing="0" class="shop_table cart">
                         <tr>                    
                     <th>Booking Number</th>
                     <th>Booking Date</th>
                     <th>From  Date</th>
                     <th>To Date</th>
                     <th>Product Image</th>  
                     <th>Product Name</th> 
                     <th>Quantity</th>    
                     <th>Rental Price</th>   
                     <th>Total Price</th>  
                     
                     </tr>
                     
                     
                     <tr>
                     <td>{{$booking->BookingNumber}}</td>
                     <td>{{$booking->DateofBooking}}</td>
                     <td>{{$booking->FromDate}}</td>
                     <td>{{$booking->ToDate}}</td>
                     <td>
                     <img class="b-goods-f__img img-scale"
                          src="{{ asset('products/images/' . $booking->product->Image) }}"
                          alt="{{ $booking->product->Image }}"
                          width="300"
                          height="250">
                    </td>
                     <td>{{$booking->product->ProductName}}</td> 
                     <td>{{$booking->Quantity}}</td> 
                     <td>{{$booking->product->RentalPrice}}</td> 
                     <td>Rs.{{$booking->TotalCost}}
                     </td>
                     
                     </td>
                         
                     </tr>
                     
                     </table>
                     
                     <p>


 
    <p style="color:red">
        <a href="{{route('bookings.index')}}" title="Back" style="color:red"><strong style="color:red">Back</strong> </a>
    </p>


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
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
 
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    <!-- Main Script -->
    <script src="js/main.js"></script>

  </body>
</html>