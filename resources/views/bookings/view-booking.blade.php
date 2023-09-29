<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop & Desktop Rental Management Sysytem | View Booking Details</title>
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/bootstrap.css') }}">
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/bar.css') }}">
    <!-- Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/pignose.calender.css') }}">
    <!-- Calender Css -->
    <!-- Common Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/style.css') }}">
    <!-- Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/style4.css') }}">
    <!-- Nav Css -->
    <!-- Fontawesome Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/fontawesome-all.css') }}">
    <!-- Fontawesome Css -->
    <!--// Style-sheets -->
    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder --> @include('includes.admin-sidebar')
        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar --> @include('includes.admin-header')
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">View Booking Details</h2>
            <!--// main-heading -->
            <!-- Tables content -->
            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>
             @endif
             @if(session('error'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>
             @endif
            <section class="tables-section">
                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">View Booking Details of Laptop and Desktop</h4>
                    <div class="container-fluid">
                        <div class="row">


                            <table border="1" class="table table-bordered">
                                <tr align="center">
                                    <td colspan="6" style="font-size:20px;color:blue"> User Details </td>
                                </tr>
                                <tr>
                                    <th scope>Full Name</th>
                                    <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                                    <th scope>Email</th>
                                    <td>{{ $booking->user->email }}</td>
                                    <th scope>Mobile Number</th>
                                    <td>{{ $booking->user->mobile_number }}</td>
                                </tr>
                                <tr align="center">
                                    <td colspan="6" style="font-size:20px;color:blue"> Product Details</td>
                                </tr>
                                <tr>
                                    <th scope>Name of Product</th>
                                    <td>
                                        {{ $booking->product->ProductName }}
                                    </td>
                                    <th>Brand Name</th>
                                    <td>
                                        {{ $booking->brand->BrandName  ?? ''  }}
                                    </td>
                                    <th>Processor</th>
                                    <td>
                                        {{ $booking->product->Processor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope>Screen</th>
                                    <td>
                                        {{ $booking->product->Screen }}
                                    </td>
                                    <th>RAM</th>
                                    <td>{{ $booking->product->RAM }}</td>
                                    <th>Storage</th>
                                    <td>{{ $booking->product->Storage }} </td>
                                </tr>
                                <tr>
                                    <th scope>Charges</th>
                                    <td>{{ $booking->product->Charges }} </td>
                                    <th>RentalPrice(per day)</th>
                                    <td>{{ $booking->product->RentalPrice }} </td>
                                    <th>Product Model</th>
                                    <td>{{ $booking->product->ProductModel }} </td>
                                </tr>
                                <tr>
                                    <th>Product Description</th>
                                    <td colspan="6">{{ $booking->product->ProductDescription }} </td>
                                </tr>
                                <tr align="center">
                                    <td colspan="6" style="font-size:20px;color:blue"> Booking Details</td>
                                </tr>
                                <tr>
                                    <th>Booking Date</th>
                                    <td colspan="6">{{$booking->DateofBooking}}</td>
                                </tr>
                                <tr>
                                    <th>From Date</th>
                                    <td>{{$booking->FromDate}}</td>
                                    <th>To Date</th>
                                    <td>{{$booking->ToDate}}</td>
                                    <th>Order Quantity</th>
                                    <td>{{$booking->Quantity}}</td>
                                </tr>
                                <th>Total Days of Rent</th>
                                <td> @php $fromDate = \Carbon\Carbon::parse($booking->FromDate); $toDate = \Carbon\Carbon::parse($booking->ToDate); $totalDaysOfRent = $fromDate->diffInDays($toDate); echo $totalDaysOfRent; @endphp </td>
                                <th>Rental Price</th>
                                <td>{{$booking->product->RentalPrice}}</td>
                                <th>Total Cost</th>
                                <td>{{$booking->TotalCost }}</td>
                                </tr>
                                <tr>
                                    <th>Booking Number</th>
                                    <td>{{$booking->DateofBooking}}</td>
                                    <th>Brand Name</th>
                                    <td>{{$booking->brand->BrandName ?? '' }}</td>
                                    <th>Order Final Status</th>
                                    <td colspan="4"> 
                                        @php 
                                        $status = $booking['status'];
                                         @endphp
                                          @if ($status == "approved")
                                               Booking has been approved 
                                           @elseif ($status == "unapproved") 
                                               Booking has been Unapproved
                                            @else No Response Yet 
                                        @endif</td>
                                </tr>
                            </table> @if($status != "new") <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tr align="center">
                                    <th colspan="5">Response History</th>
                                </tr>
                                <tr>
                                    <th>TotalCost</th>
                                    <th>Remark</th>
                                    <th>Status</th>
                                    <th>Response Time</th>
                                </tr>
                                <tr>
                                    <td>{{$booking->TotalCost}}</td>
                                    <td>{{$booking->Remark}}</td>
                                    <td>{{$booking->status}}</td>
                                    <td>{{$booking->RemarkDate}}</td>
                                </tr>
                            </table> @else <p align="center">
                                <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button>
                            </p>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-hover data-tables">
                                                <form method="post" action="{{ route('booking.updateStatus', ['bookingId' => $booking->id])}}"> @csrf @method('PUT') <tr>
                                                        <th>Remark :</th>
                                                        <td>
                                                            <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Cost :</th>
                                                        <td>
                                                            <input name="cost" value="{{ $booking->TotalCost }}" class="form-control wd-450" required="true" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status :</th>
                                                        <td>
                                                            <select name="status" class="form-control wd-450" required="true">
                                                                <option value="approved" selected="true">Approved</option>
                                                                <option value="unapproved">Unapproved</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div> @endif
                        </div>
                    </div>
                </div>
                <!--// table6 -->
            </section>
            <!--// Tables content --> @include('includes.admin-footer')
        </div>
    </div>
    <!-- Required common Js -->
    <script src="{{ asset('admin-js/jquery-2.2.3.min.js') }}"></script>
    <!-- //Required common Js -->
    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->
    <!-- dropdown nav -->
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            }, function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            });
        });
    </script>
    <!-- //dropdown nav -->
    <!-- Js for bootstrap working-->
    <script src="{{ asset('admin-js/bootstrap.min.js') }}"></script>
    <!-- //Js for bootstrap working -->
</body>

</html>