<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Platform pembelajaran daring untuk siswa SMK Negeri 1 Buahdua</h5>
            <h2 class="section__title">Pilih mata pelajaran yang ingin dipelajari</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        <ul class="nav nav-tabs generic-tab justify-content-center pb-4" id="myTab" role="tablist">
            @foreach ($categories as $index => $item)
                <li class="nav-item">
                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $item->slug }}-tab" data-toggle="tab"
                        href="#{{ $item->slug }}" role="tab" aria-controls="{{ $item->slug }}"
                        aria-selected="true">{{ $item->name }}</a>
                </li>
            @endforeach
        </ul>
    </div><!-- end container -->
    <div class="card-content-wrapper bg-gray pt-50px pb-120px">
        <div class="container">
            <div class="tab-content" id="myTabContent">

                @foreach ($course_category as $index => $item)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="{{ $item->slug }}"
                        role="tabpanel" aria-labelledby="{{ $item->slug }}-tab">
                        <div class="row">

                            @foreach ($item['course'] as $course)
                                <div class="col-lg-4 responsive-column-half">
                                    <div class="card card-item card-preview"
                                        data-tooltip-content="#{{ $course->course_name_slug }}">
                                        <div class="card-image">
                                            <a href="{{ route('course-details', $course->course_name_slug) }}"
                                                class="d-block">
                                                <img class="card-img-top lazy" width="240" height="240"
                                                    src="{{ asset($course->course_image) }}"
                                                    data-src="{{ asset($course->course_image) }}" alt="Card image cap">
                                            </a>
                                            <div class="course-badge-labels">
                                                {{-- <div class="course-badge">
                                                    @if ($course->bestseller == 'yes')
                                                        Bestseller
                                                    @elseif($course->featured == 'yes')
                                                        Featured
                                                    @else
                                                        HighestRated
                                                    @endif
                                                </div> --}}
                                            </div>
                                        </div><!-- end card-image -->
                                        <div class="card-body">
                                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                                                Updated {{ \Carbon\Carbon::parse($course->updated_at)->format('F Y') }}
                                            </h6>
                                            <h5 class="card-title">
                                                <a href="{{ route('course-details', $course->course_name_slug) }}">
                                                    {{ \Illuminate\Support\Str::limit($course->course_name, 50) }}
                                                </a>
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
                                            {{-- <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-price text-black font-weight-bold">12.99 <span
                                                        class="before-price font-weight-medium">129.99</span></p>
                                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                                    title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                            </div> --}}
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div><!-- end col-lg-4 -->
                            @endforeach

                        </div><!-- end row -->
                    </div><!-- end tab-pane -->
                @endforeach

            </div><!-- end tab-content -->
            <div class="more-btn-box mt-4 text-center">
                <a href="course-grid.html" class="btn theme-btn">Lihat Semua Mata Pelajaran<i
                        class="la la-arrow-right icon ml-1"></i></a>
            </div><!-- end more-btn-box -->
        </div><!-- end container -->
    </div><!-- end card-content-wrapper -->
</section>
