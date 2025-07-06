@extends('frontend.master')

@section('content')
    <!-- HERO AREA OR SLIDER AREA -->
    @include('frontend.section.hero')

    {{-- FEATURE AREA --}}
    @include('frontend.section.feature')

    {{-- CATEGORY AREA --}}
    @include('frontend.section.category')

    {{-- COURSE FIRST AREA --}}
    @include('frontend.section.course-first')
@endsection
