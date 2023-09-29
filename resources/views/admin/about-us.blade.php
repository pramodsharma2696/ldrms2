<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laptop and Desktop Rental Management Sysytem | About Us</title>

        <!-- Style-sheets -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin-css/bootstrap.css') }}"
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

        <!--web-fonts-->
        <link
            href="//fonts.googleapis.com/css?family=Poiret+One"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <link
            href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
            rel="stylesheet"
        />
        <!--//web-fonts-->
        <script
            src="http://js.nicedit.com/nicEdit-latest.js"
            type="text/javascript"
        ></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
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
                <h2 class="main-title-w3layouts mb-2 text-center">About Us</h2>
                <!--// main-heading -->

                <!-- Forms content -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{ session('success') }}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       {{ session('error') }}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                    @endif
                <section class="forms-section">
                    <!-- Forms-3 -->
                    <div class="outer-w3-agile mt-3">
                        <h4 class="tittle-w3-agileits mb-4">About Us</h4>

                        <form
                            action="{{ route('store-about-us') }}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Page Title</label>
                                    <input
                                        type="text"
                                        name="pagetitle"
                                        class="form-control"
                                        required="true"
                                        value="{{ $aboutUs ? $aboutUs->PageTitle : old('pagetitle') }}"
                                    />
                                    @error('pagetitle')
                                   <span style="color:red">{{$message}}</span>
                                   @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"
                                        >Page Description</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="pagedes"
                                        name="pagedescription"
                         
                                        >{!! $aboutUs ? Purifier::clean($aboutUs->PageDescription) : Purifier::clean(old('pagedescription')) !!}</textarea>
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                                name="submit"
                            >
                                Update
                            </button>
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
                            } else {
                                // Form is valid, submit it
                                form.submit();
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
