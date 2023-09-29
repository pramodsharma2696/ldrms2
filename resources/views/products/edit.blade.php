<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management Sysytem | Update Products Details</title>
   

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-css/bootstrap.css') }}">

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
        <!-- Sidebar Holder -->
       @include('includes.admin-sidebar')


        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            @include('includes.admin-header')

            <!--// top-bar -->

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center"> Update Products Details</h2>
            <!--// main-heading -->

            <!-- Forms content -->
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Update Products Details</h4>
                    <form action="{{ route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @method('PUT')
                        <p style="font-size:16px; color:red" align="left"> 

                   <div class="form-row">
                          
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Type</label>
                                <select class="form-control"  name="type" id="type" required="true">
                          
                                    <option value="Laptop"  @if($product->Type == 'Laptop')selected @endif>Laptop</option>
                                    <option value="Desktop" @if($product->Type == 'Desktop')selected @endif>Desktop</option>
                                    </select>
                                    @error('type')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Brand</label>
                               <select class="form-control" id="brand" name="brand" required="true">
                               <option value="{{ $product->BrandID }}">{{ $product->brand->BrandName }}</option>
                                @foreach($brands as $brand)
                                  <option value="{{ $brand->id }}">{{ $brand->BrandName }}</option>
                                @endforeach
                                    </select>
                                    @error('type')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Product Name</label>
                                <input type="text" class="form-control" id="proname" name="proname" required="true" value="{{$product->ProductName}}">
                                @error('proname')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Processor</label>
                               <input type="text" class="form-control" id="processor" name="processor" required="true" value="{{$product->Processor}}" >
                               @error('processor')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Screen</label>
                                <input type="text" class="form-control" id="screen" name="screen" required="true" value="{{$product->Screen}}" >
                                @error('screen')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Ram</label>
                               <input type="text" class="form-control" id="ram" name="ram" required="true" value="{{$product->RAM}}"  >
                               @error('ram')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Storage</label>
                                <input type="text" class="form-control" id="storage" name="storage" required="true" value="{{$product->Storage}}" >
                                @error('storage')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Charges</label>
                               <input type="text" class="form-control" id="charges" name="charges" required="true" value="{{$product->Charges}}">
                                   @error('charges')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Rental Price/Day</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true" value="{{$product->RentalPrice}}" >
                                   @error('renprice')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Product Model</label>
                               <input type="text" class="form-control" id="modyrs" name="modyrs" required="true" value="{{$product->ProductModel}}" >
                                   @error('modyrs')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" id="prodesc" name="prodesc" rows="3" required="true">{{ $product->ProductDescription }}</textarea>
                                    @error('prodesc')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image</label>
                                <img src="{{ asset('products/images/' . $product['Image']) }}" width="200" height="150" alt="Product Image">
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
     
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image1</label>
                                <img src="{{ asset('products/images/' . $product['Image1']) }}" width="200" height="150" alt="Product Image">
                                <input type="file" name="image1" class="form-control">
                                @error('image1')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
     
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image2</label>
                                <img src="{{ asset('products/images/' . $product['Image2']) }}" width="200" height="150" alt="Product Image">
                                <input type="file" name="image2" class="form-control">
                                @error('image2')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
     
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image3</label>
                                <img src="{{ asset('products/images/' . $product['Image3']) }}" width="200" height="150" alt="Product Image">
                                <input type="file" name="image3" class="form-control">
                                @error('image3')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
     
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image4</label>
                                <img src="{{ asset('products/images/' . $product['Image4']) }}" width="200" height="150" alt="Product Image">
                                <input type="file" name="image4" class="form-control">
                                    @error('image4')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
     
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image5</label>
                                <img src="{{ asset('products/images/' . $product['Image5']) }}" width="200" height="150" alt="Product Image">
                                <input type="file" name="image5" class="form-control">
                                @error('image5')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            </div>
     
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Update</button></p>
                    </form>
                </div>
                <!--// Forms-3 -->
                <!-- Forms-4 -->
               
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
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
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
