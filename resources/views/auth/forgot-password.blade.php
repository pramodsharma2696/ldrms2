<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management Sysytem | Forgot Page</title>
    
    <!-- Style-sheets -->
    <link href="{{ asset('admin-css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
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
    <div class="bg-page py-5">
        <div class="container">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Forgot Password</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
            <x-auth-session-status class="mb-4" :status="session('status')" style="color:green" />
  
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                    <div class="form-group">
                        <label>Email</label>
                       <input type="email" class="form-control" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
                       @error('email')
                     <span style="color:red">{{$message}}</span>
                     @enderror
                    </div>
     
                    <div class="d-sm-flex justify-content-between">
                        
                        <div class="forgot col-md-6 text-sm-left text-center">
                            <a href="{{route('loginPage')}}">Signin</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4" value="Sign In" name="submit">Email Password Reset Link</button>
                </form>
                
                <h1 class="paragraph-agileits-w3layouts mt-2">
                    <a href="{{route('index')}}">Back to Home</a>
                </h1>
            </div>


            @include('includes.admin-footer')

   
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