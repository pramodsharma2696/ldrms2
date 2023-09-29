<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Laptop and Desktop Rental Management System| View Register Users
        </title>

        <!-- Style-sheets -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/simplyCountdown.css') }}"
        />

        <link
            href="css/bootstrap.css"
            rel="stylesheet"
            type="text/css"
            media="all"
        />
        <!-- Bootstrap Css -->
        <!-- Bars Css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/bar.css') }}"
        />
        <!--// Bars Css -->
        <!-- Calender Css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/pignose.calender.css') }}"
        />
        <!--// Calender Css -->
        <!-- Common Css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/style.css') }}"
        />
        <!--// Common Css -->
        <!-- Nav Css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/style4.css') }}"
        />

        <!--// Nav Css -->
        <!-- Fontawesome Css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/fontawesome-all.css') }}"
        />
        <!--// Fontawesome Css -->
        <!--// Style-sheets -->

        <!--web-fonts-->
        <link
            href="//fonts.googleapis.com/css?family=Poiret+One"
            rel="stylesheet"
        />
        <link
            href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
            rel="stylesheet"
        />
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
                <h2 class="main-title-w3layouts mb-2 text-center">
                    View Register Users
                </h2>
                <!--// main-heading -->

                <!-- Tables content -->
                <section class="tables-section">
                    <!-- table6 -->
                    <div class="outer-w3-agile mt-3">
                        <h4 class="tittle-w3-agileits mb-4">
                            View Register Users
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.NO</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">MobileNumber</th>
                                            <th scope="col">Email Address</th>
                                            <th scope="col">Reg Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-expanded="true">
                                            @foreach($users as $user)
                                            <td>
                                                {{
                                                $users->firstItem()+$loop->index
                                                }}
                                            </td>
                                            <td>
                                                {{$user->first_name}}
                                                {{$user->last_name}}
                                            </td>
                                            <td>{{$user->mobile_number}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

        <script src="{{ asset('admin-js/modernizr.js') }}"></script>
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
