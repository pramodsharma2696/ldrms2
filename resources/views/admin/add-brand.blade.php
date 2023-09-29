<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laptop and Desktop Rental Management Sysytem | Brands</title>

        <!-- Bootstrap Css -->

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

                <!-- main-heading -->
                <h2 class="main-title-w3layouts mb-2 text-center">Brands</h2>
                <!--// main-heading -->

                <!-- Forms content -->
                <section class="forms-section">
                    <!-- Forms-3 -->
                    <div class="outer-w3-agile mt-3">
                        <h4 class="tittle-w3-agileits mb-4">Brands</h4>

                        <form
                            action="{{ route('store-brand')}}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Brand Name</label>

                                    <input
                                        class="form-control"
                                        id="brandname"
                                        name="brandname"
                                        type="text"
                                        value=""
                                        required="true"
                                    />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Brand Logo</label>

                                    <input
                                        type="file"
                                        class="form-control"
                                        name="images"
                                        id="images"
                                        value=""
                                        required="true"
                                    />
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary"
                                name="submit"
                            >
                                Add
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

        <!-- loading-gif Js -->
        <script src="{{ asset('admin-js/modernizr.js') }}"></script>
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
        <script src="{{ asset('admin-js/script.js') }}"></script>
        <script src="{{ asset('admin-js/bootstrap.min.js') }}"></script>

        <!-- //Js for bootstrap working -->
    </body>
</html>
