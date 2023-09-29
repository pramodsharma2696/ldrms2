<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management Sysytem | Change Password</title>
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
    <script type="text/javascript">
    </script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder --> @include('includes.admin-sidebar')
        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar --> @include('includes.admin-header')
            <!--// top-bar -->
            <!-- main-heading -->

            <h2 class="main-title-w3layouts mb-2 text-center"> Change Password</h2>
            <!--// main-heading -->
            <!-- Forms content -->
            <section class="forms-section">
                <!-- Forms-3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"> Change Password</h4>
                    <form enctype="multipart/form-data" method="post" action="{{ route('password.update') }}">
                         @csrf 
                         @method('put')
                         @if(session('success'))
                                     <div class="alert alert-success">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('status') }}
                                     </div>
                                     @endif
                                     @if(session('error'))
                                     <div class="alert alert-danger">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('status') }}
                                     </div>
                                     @endif
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Current Password:</label>
                                <input type="password" name="current_password" class=" form-control" required="true" value="">
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" style="color: red;" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">New Password:</label>
                                <input type="password" name="password" class="form-control" value="">
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="color: red;" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Confirm Password:</label>
                            <input type="password" name="password_confirmation" class="form-control" value="">
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="color: red;" />
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Change</button>
                    </form>
                </div>
            </section>
            <!--// Forms content -->
             @include('includes.admin-footer')
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
    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->
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