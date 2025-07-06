<!DOCTYPE html>
<html lang="en">

<head>
    <title>LMS - SMK Negeri 1 Buahdua</title>

    @include('frontend.section.link')
</head>

<body>

    <!-- start cssload-loader -->
    @include('frontend.section.loader')
    <!-- end cssload-loader -->

    {{-- HEADER AREA --}}
    @include('frontend.section.header')

    @yield('content')


    {{-- COURSE AREA --}}

    {{-- FUNFACT AREA --}}

    {{-- CTA AREA --}}

    {{-- TESTIMONIAL AREA --}}

    <div class="section-block"></div>

    {{-- ABOUT AREA --}}

    <div class="section-block"></div>

    {{-- REGISTER AREA --}}

    <div class="section-block"></div>

    {{-- CLIENT-LOGO AREA --}}

    {{-- BLOG AREA --}}

    {{-- GET STARTED AREA --}}

    {{-- SUBSCRIBER AREA --}}

    {{-- FOOTER AREA --}}
    @include('frontend.section.footer')

    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->

    {{-- TOOLTIP AREA --}}
    @include('frontend.section.tooltip')

    <!-- template js files -->
    @include('frontend.section.script')
</body>

</html>
