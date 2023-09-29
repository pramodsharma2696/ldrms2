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
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Reset Password</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
            <x-auth-session-status class="mb-4" :status="session('status')" style="color:green" />
  
            <form method="POST"  action="{{ route('password.store') }}">
                @csrf
           <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                       @error('email')
                     <span style="color:red">{{$message}}</span>
                     @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                       <input type="password" class="form-control"  type="password" name="password" required autocomplete="new-password">
                       @error('password')
                     <span style="color:red">{{$message}}</span>
                     @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                       <input type="password" class="form-control" type="password"
                                name="password_confirmation" required autocomplete="new-password" >
                       @error('password_confirmation')
                     <span style="color:red">{{$message}}</span>
                     @enderror
                    </div>
     
             
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4" value="Sign In" name="submit">Reset Password</button>
                </form>
                
                <h1 class="paragraph-agileits-w3layouts mt-2">

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