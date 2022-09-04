<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calendify | Responsive Bootstrap 4 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://templates.iqonic.design/calendify/html/assets/images/favicon.ico" />

    <link rel="stylesheet" href="{{ asset('assets/css/backend.minf700.css?v=1.0.1') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        {{ $slot }}
        <!-- Wrapper End-->
        <footer class="iq-footer">
            <div class="container-fluid container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        Copyright 2020 <a href="#">Calendify</a> All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- Backend Bundle JavaScript -->
        <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>

        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('assets/js/customizer.js') }}"></script>


        <!-- app JavaScript -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

<!-- Mirrored from templates.iqonic.design/calendify/html/backend/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Sep 2022 09:26:35 GMT -->

</html>