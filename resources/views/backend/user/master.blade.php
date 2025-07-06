<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS | SMK NEGERI 1 BUAHDUA</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.ico') }}" type="image/png" />
    @include('backend.user.section.link')
</head>

<body>
    <!-- start cssload-loader -->
    <div class="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->

    @include('backend.user.section.header')

    <section class="dashboard-area ">
        <div class="off-canvas-menu dashboard-off-canvas-menu off--canvas-menu custom-scrollbar-styled pt-20px">
            <div class="off-canvas-menu-close dashboard-menu-close icon-element icon-element-sm shadow-sm"
                data-toggle="tooltip" data-placement="left" title="Close menu">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
            <div class="logo-box px-4">
                <a href="{{ route('frontend.home') }}" class="logo d-flex align-items-center"><img
                        src="{{ asset('backend/assets/images/logo-192x192.png') }}" class="logo-icon" alt="logo icon"
                        width="20%" height="20%">
                    <h5 class="logo-text mb-0 ml-2">Student Dashboard</h5>
                </a>
            </div>
            @include('backend.user.section.sidebar')

        </div><!-- end off-canvas-menu -->
        <div class="dashboard-content-wrap">
            <div class="dashboard-menu-toggler btn theme-btn theme-btn-sm lh-28 theme-btn-transparent mb-4 ml-3">
                <i class="la la-bars mr-1"></i> Dashboard Nav
            </div>
            <div class="container-fluid">
                @include('backend.user.section.breadcumb')

                @yield('content')


            </div><!-- end container-fluid -->
            @include('backend.user.section.footer')
        </div><!-- end dashboard-content-wrap -->
    </section><!-- end dashboard-area -->



    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->


    @include('backend.user.section.modal')

    @include('backend.user.section.script')
</body>

</html>
