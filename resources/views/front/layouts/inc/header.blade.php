{{-- <!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<html lang="en" dir="">

<head>
    <title>@yield('title', 'Unknow')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href=" {{ asset('front/images/icons/favicon.png') }} " />
    <!--===============================================================================================-->
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" href=" {{ asset('front/vendors/animate/animate.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" href=" {{ asset('front/vendors/css-hamburgers/hamburgers.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('front/vendors/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" href=" {{ asset('front/vendors/daterangepicker/daterangepicker.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" href=" {{ asset('front/vendors/slick/slick.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" href=" {{ asset('front/vendors/MagnificPopup/magnific-popup.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" href=" {{ asset('front/vendors/perfect-scrollbar/perfect-scrollbar.css') }} ">
    <!--===============================================================================================-->
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <!--===============================================================================================-->
     @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <link rel="stylesheet" href=" {{ asset('front/css/util_RTL.css') }} ">
        <link rel="stylesheet" href=" {{ asset('front/css/main_RTL.css') }} ">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style_RTL.css') }}">
        <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }} " rel="stylesheet">
    @else
        <link rel="stylesheet" href=" {{ asset('front/css/util.css') }} ">
        <link rel="stylesheet" href=" {{ asset('front/css/main.css') }} ">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    @endif
    <!--===============================================================================================-->
    <link href="{{ asset('admin/assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!--===============================================================================================--> --}}








<html lang="en">

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Aviato | E-commerce template</title>

    <!-- Mobile Specific Metas  -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="ThemeFisher">
    <meta name="generator" content="ThemeFisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontEnd/images/favicon.png') }}" />

    <!-- ThemeFisher Icon font -->
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/themefisher-font/style.css') }}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/animate/animate.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">

</head>

<body id="body">

    @yield('content')


    @include('front.layouts.inc.footer')



    <!-- Essential Scripts -->

    <!-- Main jQuery -->
    <script src="{{ asset('frontEnd/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('frontEnd/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('frontEnd/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('frontEnd/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('frontEnd/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('frontEnd/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('frontEnd/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontEnd/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('frontEnd/plugins/google-map/gmap.js') }}"></script> --}}

    <!-- Main Js File -->
    <script src="{{ asset('frontEnd/js/script.js') }}"></script>

</body>

</html>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/bootstrap/js/popper.js') }}"></script>
    <!--===============================================================================================-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!--===============================================================================================-->

    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('front/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->

    <script src="{{ asset('front/vendors/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('front/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('front/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('front/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!--===============================================================================================-->
    <script src=" {{ asset('front/js/main.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> --}}
