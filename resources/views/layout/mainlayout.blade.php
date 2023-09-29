<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management Sysytem | Dashboard</title>
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/simplyCountdown.css') }}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('admin-css/simplyCountdown.css') }}" rel="stylesheet" type='text/css'>
    </link>
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
    <!--// Style-sheets -->
    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>

    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder --> @include('includes.admin-sidebar')
        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar --> @include('includes.admin-header')
            <!--// top-bar -->
            <div class="container-fluid">
                <div class="row">
                @yield('content')
                </div>
            </div> 
            @include('includes.admin-footer')
        </div>
    </div>
      <!-- Required common Js -->
      <script src="{{ asset('admin-js/jquery-2.2.3.min.js') }}"></script>
    <!-- //Required common Js -->
    <!-- loading-gif Js -->
    <script src="{{ asset('admin-js/modernizr.js') }}"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->
    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->
    <!-- Graph -->
    <script src="{{ asset('admin-js/SimpleChart.js') }}"></script>
    <!--// Graph -->
    <!-- Bar-chart -->
    <script src="{{ asset('admin-js/example.js') }}"></script>
    <script src="{{ asset('admin-js/rumcaJS.js') }}"></script>
    <!--// Bar-chart -->
    <!-- Calender -->
    <script src="{{ asset('admin-js/pignose.calender.js') }}"></script>
    <script src="{{ asset('admin-js/moment.min.js') }}"></script>
    <script>
        //<![CDATA[
        $(function() {
            $('.calender').pignoseCalender({
                select: function(date, obj) {
                    obj.calender.parent().next().show().text('You selected ' + (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) + '.');
                }
            });
            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function(date, obj) {
                    obj.calender.parent().next().show().text('You selected ' + (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) + '~' + (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) + '.');
                }
            });
        });
        //]]>
    </script>
    <!--// Calender -->
    <!-- profile-widget-dropdown js-->
    <script src="{{ asset('admin-js/script.js') }}"></script>
    <!--// profile-widget-dropdown js-->
    <!-- Count-down -->
    <script src="{{ asset('admin-js/amcharts.js') }}"></script>
    <script src="{{ asset('admin-js/simplyCountdown.js') }}"></script>
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <!--// Count-down -->
    <!-- pie-chart -->
    <script src="{{ asset('admin-js/amcharts.js') }}"></script>
    <script>
        var chart;
        var legend;
        var chartData = [{
            country: "Lithuania",
            value: 260
        }, {
            country: "Ireland",
            value: 201
        }, {
            country: "Germany",
            value: 65
        }, {
            country: "Australia",
            value: 39
        }, {
            country: "UK",
            value: 19
        }, {
            country: "Latvia",
            value: 10
        }];
        AmCharts.ready(function() {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;
            // WRITE
            chart.write("chartdiv");
        });
    </script>
    <!--// pie-chart -->
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