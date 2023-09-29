<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management System | Search </title>
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <!-- Style-sheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/simplyCountdown.css') }}">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/bar.css') }}">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/pignose.calender.css') }}">
    <!--// Calender Css -->
    <!-- Common Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/style.css') }}">
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/style4.css') }}">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/fontawesome-all.css') }}">
    <!--// Fontawesome Css -->
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
            <h2 class="main-title-w3layouts mb-2 text-center">Search Booking</h2>
            <!--// main-heading -->
            <!-- Tables content -->
            <section class="tables-section">
                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                    <form name="search" method="post" action="{{ route('search.booking') }}"> @csrf <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Search Booking</h4>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label" for="example-email">Booking Number/Name/ Mobile Number/ Email Id </label>
                                        <div class="col-6">
                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-10">
                                            <button class="btn-primary btn" type="submit" name="search">Search</button>
                                        </div>
                                    </div>
                                </div>
                    </form> @if(isset($bookings)) @if(count($bookings) > 0) <h4 align="center">Result against "{{ $searchData }}" keyword</h4>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">S.NO</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody> @foreach($bookings as $booking) <tr data-expanded="true">
                                        <td> {{ $bookings->firstItem()+$loop->index }} </td>
                                        <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                                        <td>{{ $booking->BookingNumber }}</td>
                                        <td>{{ $booking->product->ProductName }}</td>
                                        <td>{{ $booking->DateofBooking }}</td>
                                        <td>{{ $booking->status }} </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{route('bookings.details',$booking->bid)}}">View</a>
                                        </td>
                                    </tr> @endforeach </tbody>
                            </table>
                            {{$bookings->links()}}
                        </div>
                    </div> @else <h4 align="center">No record found against this search</h4> @endif @endif
                </div>
        </div>
    </div>
    <!--// table6 -->
    </section>
    <!--// Tables content --> @include('includes.admin-footer') </div>
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