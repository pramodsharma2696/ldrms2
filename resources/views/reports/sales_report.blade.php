<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop & Desktop Rental Management Sysytem | Sales Report</title>
    
   
    <!-- Style-sheets -->
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

           
            <section class="tables-section">
   

              
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Sales Report</h4>
                   
      
 
                    <div class="container-fluid">
                        <div class="row">
                          <form class="form-horizontal" method="post"   action="{{route('generate.sales.report')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Request Count Reports</h4>
                                   
                                       <div class="form-group row" style="padding-top: 20px">
                                                        <label class="col-6 col-form-label" for="example-email">From Date: </label>
                                                        <div class="col-12">
                                                            <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email">To Date: </label>
                                                        <div class="col-12">
                                                            <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email">Request Type: </label>
                                                        <div class="col-12">
                                                            <input type="radio" name="requesttype" value="mtwise" checked="true">Month wise
                                                       <input type="radio" name="requesttype" value="yrwise">Year wise
                                                        </div>
                                                    </div>
                                                  <div class="col-10">
                                                      <button class="btn-primary btn" type="submit" name="submit">Submit</button>
                                                        </div>
                                                    </div> 
                                                </div>
                                                   </form>       
                        </div>
                    </div>
                </div>
               

        

            </section>

           

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
