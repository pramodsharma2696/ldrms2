<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Management Sysytem | Profile</title>
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
    <div class="wrapper">
        <!-- Sidebar Holder --> @include('includes.admin-sidebar')
        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar --> @include('includes.admin-header')
            <!--// top-bar -->
            <!-- main-heading -->


            <h2 class="main-title-w3layouts mb-2 text-center"> Admin Profile</h2>
            <!--// main-heading -->
            <!-- Forms content -->
            <section class="forms-section">
                <!-- Forms-3 -->
                <div class="outer-w3-agile mt-3">

                    <h4 class="tittle-w3-agileits mb-4"> Admin Profile</h4>
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
                    <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="post">
                         @csrf
                         @method('patch') 

                         <p style="font-size:16px; color:red" align="center"> </p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">First Name</label>
                                <input class=" form-control" id="adminname" name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Last Name</label>
                                <input class=" form-control" name="last_name" name="username" type="text" value="{{ old('last_name', $user->last_name) }}" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Contact Number</label>
                            <input class="form-control " id="mobile_number" name="contactnumber" type="text" value="{{ old('mobile_number', $user->mobile_number) }}">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Email</label>
                            <input class="form-control " id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required="true">
                            <x-input-error class="mt-2" :messages="$errors->get('email')"  style="color: red;" />

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Reg Date</label>
                                <input class="form-control " id="regdate" name="regdate" type="text" value="{{ old('created_at', $user->created_at) }}" required="true" readonly='true'>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </form>
                </div>
            </section>
            <!--// Forms content --> @include('includes.admin-footer')
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