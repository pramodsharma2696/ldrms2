<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop & Desktop Rental Management Sysytem | Sales Report</title>
    
   
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/simplyCountdown.css') }}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <link href="{{ asset('admin-css/simplyCountdown.css') }}" rel="stylesheet" type='text/css' ></link>
    <link href="{{ asset('admin-css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
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
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        @include('includes.admin-sidebar')


        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            @include('includes.admin-header')

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Sales Report</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
   

                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                  
                @if ($requestType === 'mtwise')
            @php
                $month1 = strtotime($fromDate);
                $month2 = strtotime($toDate);
                $m1 = date("F", $month1);
                $m2 = date("F", $month2);
                $y1 = date("Y", $month1);
                $y2 = date("Y", $month2);
                $ftotal = 0;
            @endphp

                         <h4 class="header-title m-t-0 m-b-30" style="text-align: center;">Sales Report Month Wise</h4>
                         <h4 align="center" style="color:blue;padding-top: 10px" >Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
                         <hr />
                                             <div class="container-fluid">
                                                 <div class="row">
                                                     <table class="table table-bordered">
                                          <thead>
                         <tr>
                         <th>S.NO</th>
                         <th>Month / Year </th>
                         <th>Sales</th>
                         </tr>
                         </thead>
                         @foreach ($salesData as $row)
                             <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ $row->lmonth }}/{{ $row->lyear }}</td>
                                 <td>{{ $total = $row->totalprice }}</td>
                             </tr>
                             @php $ftotal += $total; @endphp
                         @endforeach  
                                  
                         
                         <tr>
                                           <td colspan="2" align="center">Total </td>
                                       <td>{{ $ftotal }}</td>
                            
                                          
                                          
                                         </tr>
                                           </table>
                                           @else
                                     @php
                                     $year1 = strtotime($fromDate);
                                         $year2 = strtotime($toDate);
                                         $y1 = date("Y", $year1);
                                         $y2 = date("Y", $year2);
                                         $ftotal = 0;
                                     @endphp
                         
                          <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
                             <h4 align="center" style="color:blue">Sales Report  from {{ $y1 }} to {{ $y2 }}</h4>
                             <hr />
                                           <table class="table table-bordered">
                                             <thead>
                         <tr>
                         <th>S.NO</th>
                         <th> Year </th>
                         <th>Sales</th>
                         </tr>
                         </thead>
                                             
                         @foreach ($salesData as $row)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $row->lyear }}</td>
                            <td>{{ $total = $row->totalprice }}</td>
                        </tr>
                        @php $ftotal += $total; @endphp
                    @endforeach
                    <tr>
                        <td colspan="2" align="center">Total</td>
                        <td>{{ $ftotal }}</td>
                    </tr>

                  </table>
                  @endif

                        </div>
                    </div>
                </div>
                <!--// table6 -->

        

            </section>

            <!--// Tables content -->

            @include('includes.admin-footer')

        </div>
    </div>


    <!-- Required common Js -->
    <script src="{{ asset('admin-js/jquery-2.2.3.min.js') }}"></script>

    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="{{ asset('admin-js/bootstrap.min.js') }}"></script>

    <!-- //Js for bootstrap working -->

</body>

</html>
