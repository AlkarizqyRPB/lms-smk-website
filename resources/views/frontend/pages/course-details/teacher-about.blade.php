<div class="course-overview-card pt-4">
    <h3 class="fs-24 font-weight-semi-bold pb-4">About the instructor</h3>
    <div class="instructor-wrap">
        <div class="media media-card">
            <div class="instructor-img">
                <a href="teacher-detail.html" class="media-img d-block">
                    <img class="lazy" src="{{ $course['user']['photo'] }}" data-src="{{ $course['user']['photo'] }}"
                        alt="Avatar image">
                </a>
            </div><!-- end instructor-img -->
            <div class="media-body">
                <h5><a href="#">{{ $course['user']['username'] }}</a></h5>
                <ul class="generic-list-item pt-3">
                    <li><i class="la la-envelope mr-2 text-color-3"></i>{{ $course['user']['email'] }}</li>
                    <li><i class="la la-user mr-2 text-color-3"></i>{{ $course['user']['phone'] }}</li>
                    <li><i class="la la-map-marker mr-2 text-color-3"></i>{{ $course['user']['address'] }}</li>
                </ul>
            </div>
        </div>
    </div><!-- end instructor-wrap -->
</div><!-- end course-overview-card -->
