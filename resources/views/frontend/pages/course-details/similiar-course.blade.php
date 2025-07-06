<div class="course-overview-card pt-4">
    <h3 class="fs-24 font-weight-semi-bold pb-4">Similiar Class</h3>
    <div class="view-more-carousel owl-action-styled">

        @forelse($similarCourses as $course)
            <div class="card card-item card-item-list-layout border border-gray shadow-none">
                <div class="card-image">
                    <a href="{{ route('course-details', $course->course_name_slug) }}" class="d-block">
                        <img class="card-img-top lazy" src="{{ asset($course->course_image) }}"
                            data-src="{{ asset($course->course_image) }}" alt="Card image cap">
                    </a>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h5 class="card-title"><a
                            href="{{ route('course-details', $course->course_name_slug) }}">{{ $course->course_name }}</a>
                    </h5>
                    <p class="card-text">
                        <a href="#">
                            {{ $course['user']['username'] }}
                        </a>
                    </p>
                    <div class="rating-wrap d-flex align-items-center py-2">
                        <div class="review-stars">
                            <span class="rating-number">4.4</span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                        </div>
                        <span class="rating-total pl-1">(20,230)</span>
                    </div><!-- end rating-wrap -->
                    <div class="category-btn-box">
                        <a href="{{ route('course-details', $course->course_name_slug) }}" class="btn theme-btn">Lihat
                            kelas<i class="la la-arrow-right icon ml-1"></i></a>
                    </div><!-- end category-btn-box-->
                </div><!-- end card-body -->
            </div><!-- end card -->
        @empty
            <div class="alert alert-danger">
                <p>No Course Found</p>
            </div>
        @endforelse

    </div><!-- end view-more-carousel -->
</div><!-- end course-overview-card -->
