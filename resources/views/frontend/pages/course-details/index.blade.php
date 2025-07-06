@extends('frontend.master')
@section('content')
    @include('frontend.pages.course-details.breadcrumb')

    <section class="course-details-area pb-20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pb-5">
                    <div class="course-details-content-wrap pt-90px">

                        @include('frontend.pages.course-details.learn-section')

                        @include('frontend.pages.course-details.course-content')

                        @include('frontend.pages.course-details.similiar-course')

                        @include('frontend.pages.course-details.teacher-about')

                        {{-- feedback --}}
                        {{-- @include('frontend.pages.course-details.student-feedback') --}}

                        {{-- review --}}
                        {{-- @include('frontend.pages.course-details.review') --}}

                    </div><!-- end course-details-content-wrap -->

                </div><!-- end col-lg-8 -->

                <div class="col-lg-4">
                    @include('frontend.pages.course-details.right-sidebar')
                </div><!-- end col-lg-4 -->

            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end course-details-area -->

    {{-- modal --}}
    @include('frontend.pages.course-details.course-preview-modal')
    @include('frontend.pages.course-details.related-course')
    @include('frontend.pages.course-details.become-teacher')

    <div class="section-block"></div>

    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->
@endsection

@push('scripts')
@endpush
