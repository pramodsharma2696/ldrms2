<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Laptop and Desktop Rental Management Sysytem | Add Product Details
        </title>

        <!-- Style-sheets -->
        <!-- Bootstrap Css -->
        <!-- Bars Css -->

        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/bootstrap.css') }}"
        />
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
                <!--// top-bar -->
                @if(session('success'))
                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >
                    {{ session('success') }}
                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif @if(session('error'))
                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >
                    {{ session('error') }}
                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <!-- main-heading -->
                <h2 class="main-title-w3layouts mb-2 text-center">
                    Add Product Details
                </h2>
                <!--// main-heading -->

                <!-- Forms content -->
                <section class="forms-section">
                    <div class="outer-w3-agile mt-3">
                        <h4 class="tittle-w3-agileits mb-4">
                            Add Product Details
                        </h4>
                        <form
                            action="{{ route('store-product')}}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Type</label>
                                    <select
                                        class="form-control"
                                        name="type"
                                        id="type"
                                        required="true"
                                     
                                        value="{{old('type')}}"
                                    >
                                        <option value="">Choose Type</option>
                                        <option value="Laptop" @if(old('type') == 'Laptop') selected @endif>Laptop</option>
                                        <option value="Desktop" @if(old('type') == 'Desktop') selected @endif>Desktop</option>
                                    </select>
                                    @error('type')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Brand</label>
                                    <select
                                        class="form-control"
                                        id="brand"
                                        name="brand"
                                        required="true"
                                     
                                        value="{{old('brand')}}"
                                    >
                                        <option value="">Choose Brand</option>

                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" @if(old('brand') == $brand->id) selected @endif>
                                            {{ $brand->BrandName }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"
                                        >Product Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="proname"
                                        name="proname"
                                        required="true"
                                    
                                        value="{{old('proname')}}"
                                    />
                                    @error('proname')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"
                                        >Processor</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="processor"
                                        name="processor"
                                        required="true"
                                    
                                        value="{{old('processor')}}"
                                    />
                                    @error('processor')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Screen</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="screen"
                                        name="screen"
                                        required="true"
                                  
                                        value="{{old('screen')}}"
                                    />
                                    @error('screen')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Ram</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ram"
                                        name="ram"
                                        required="true"
                                 
                                        value="{{old('ram')}}"
                                    />
                                    @error('ram')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Storage</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="storage"
                                        name="storage"
                                        required="true"
                                    
                                        value="{{old('storage')}}"
                                    />
                                    @error('storage')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Charges</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="charges"
                                        name="charges"
                                        required="true"
                                    
                                        value="{{old('charges')}}"
                                    />
                                    @error('charges')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress"
                                        >Rental Price/Day</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="renprice"
                                        name="renprice"
                                        required="true"
                                  
                                        value="{{old('renprice')}}"
                                    />
                                    @error('renprice')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"
                                        >Product Model</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="modyrs"
                                        name="modyrs"
                                        required="true"
                                 
                                        value="{{old('modyrs')}}"
                                    />
                                    @error('modyrs')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"
                                    >Product Description</label
                                >
                                <textarea
                                    class="form-control"
                                    id="prodesc"
                                    name="prodesc"
                                    rows="3"
                                    required="true"
                         
                                >{{ old('prodesc') }}</textarea>
                                @error('prodesc')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                            </div>
                            <!-- <div class="form-group col-md-12">
                                 <label for="stock_quantity">Stock Quantity</label>
                                 <input
                                     type="number"
                                     class="form-control"
                                     id="stock_quantity"
                                     name="stock_quantity"
                                     required="true"
                                     value="{{ old('stock_quantity') }}"
                                 />
                                 @error('stock_quantity')
                                 <span style="color:red">{{ $message }}</span>
                                 @enderror
                             </div> -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Image</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image"
                                        name="image0"
                                        required="true"
                             
                                        
                                    />
                                    @error('image0')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Image1</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image1"
                                        name="image1"
                                        required="true"
                                    
                                    />
                                    @error('image1')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Image2</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image2"
                                        name="image2"
                                        required="true"
                      
                                    />
                                    @error('image2')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Image3</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image3"
                                        name="image3"
                                        required="true"
                               
                                    />
                                    @error('image3')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Image4</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image4"
                                        name="image4"
                                        required="true"
                                 
                                    />
                                    @error('image4')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Image5</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image5"
                                        name="image5"
                                        required="true"
                                     
                                    />
                                    @error('image5')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <p style="text-align: center">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    name="submit"
                                >
                                    Submit
                                </button>
                            </p>
                        </form>
                    </div>
                    <!--// Forms-3 -->
                    <!-- Forms-4 -->
                </section>

                <!--// Forms content -->

                <script src="{{ asset('admin-js/script.js') }}"></script>
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
