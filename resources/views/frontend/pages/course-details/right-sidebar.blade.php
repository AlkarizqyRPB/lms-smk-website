<div class="sidebar sidebar-negative">
    <div class="card card-item">
        <div class="card-body">
            <div class="preview-course-video">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#previewModal">
                    <img src="{{ asset($course->course_image) }}" data-src="{{ asset($course->course_image) }}"
                        alt="course-img" class="w-100 rounded lazy">
                    <div class="preview-course-video-content">
                        <div class="overlay"></div>
                        <div class="play-button">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;"
                                xml:space="preserve">
                                <style type="text/css">
                                    .st0 {
                                        fill: #ffffff;
                                        border-radius: 100px;
                                    }

                                    .st1 {
                                        fill: #000000;
                                    }
                                </style>
                                <g>
                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9">
                                    </circle>
                                    <path class="st1"
                                        d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <p class="fs-15 font-weight-bold text-white pt-3">Preview this course</p>
                    </div>
                </a>
            </div><!-- end preview-course-video -->
            <hr>
            <div class="category-btn-box">
                <a href="{{ route('course-details', $course->course_name_slug) }}" class="btn theme-btn">Lihat
                    kelas<i class="la la-arrow-right icon ml-1"></i></a>
            </div><!-- end category-btn-box-->
        </div>
    </div><!-- end card -->

    {{-- for right side bar optional use (category, etc) --}}
    {{-- @include('frontend.pages.course-details.rightside-option') --}}
</div><!-- end sidebar -->
