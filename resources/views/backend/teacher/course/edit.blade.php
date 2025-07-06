@extends('backend.teacher.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Course', 'sub_title' => 'Update Course'])
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between">
                            <h5 class="mb-4">Update Course</h5>
                            <a href="{{ route('teacher.course.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        <form class="row g-3" method="POST" action="{{ route('teacher.course.update', $course->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}" />

                            <div class="col-md-6">
                                <label for="name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course_name" id="name"
                                    placeholder="Enter the course name"
                                    value="{{ old('course_name', $course->course_name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="course_name_slug" id="slug"
                                    placeholder="Enter the slug"
                                    value="{{ old('course_name_slug', $course->course_name_slug) }}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="course_title" class="form-label">Class</label>
                                <input type="text" class="form-control" name="course_title" id="course_title"
                                    placeholder="Enter the course title"
                                    value="{{ old('course_title', $course->course_title) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Choose Category</label>
                                <select class="form-select" name="category_id" id="category"
                                    data-placeholder="Choose a category" required>
                                    <option value="" disabled selected>Select a category</option>
                                    @foreach ($all_categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $course->category_id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="subcategory" class="form-label">Select SubCategory</label>
                                <select class="form-select" name="subcategory_id" id="subcategory"
                                    data-placeholder="Choose a subcategory" required>
                                    <option value="{{ $course->subcategory_id }}" selected>
                                        {{ $course->subCategory['name'] }}</option>
                                    {{-- Using Ajax --}}
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="Photo" accept="image/*">
                                <div style="margin-top: 10px">
                                    <img src="{{ asset($course->course_image) }}" id="photoPreview" class="img-fluid"
                                        style="margin-top: 15px; {{ $course->course_image ? '' : 'display: none' }}"
                                        alt="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="resources" class="form-label">Resources</label>
                                <input class="form-control" type="number" name="resources" id="resources"
                                    placeholder="Enter the Number of Download Resorce"
                                    value="{{ old('resources', $course->resources) }}" />
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control editor" name="description" id="description" required> {{ old('description', $course->description) }} </textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="video_url" class="form-label">YouTube Video URL</label>
                                <input type="url" class="form-control" name="video_url" id="video_url"
                                    placeholder="Enter the YouTube video URL"
                                    value="{{ old('video_url', $course->video_url) }}" required>
                                <iframe id="videoPreview"
                                    style="margin-top: 15px; display: none; width: 100%; height: 400px;" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>

                            <div class="col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select class="form-select" name="label" id="label"
                                    data-placeholder="Choose one thing">
                                    <option selected disabled>select</option>
                                    <option value="beginer" {{ $course->label == 'beginer' ? 'selected' : '' }}>Beginer
                                    </option>
                                    <option value="medium" {{ $course->label == 'medium' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="advance" {{ $course->label == 'advance' ? 'selected' : '' }}>Advance
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="certificate" class="form-label">Certificate</label>
                                <select class="form-select" name="certificate" id="certificate"
                                    data-placeholder="Choose one thing">
                                    <option selected disabled>select</option>
                                    <option value="yes" {{ $course->certificate == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $course->certificate == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="selling_price" class="form-label">Selling Price</label>
                                <input type="number" class="form-control" name="selling_price" id="selling_price"
                                    placeholder="Enter selling price"
                                    value="{{ old('selling_price', $course->selling_price) }}" />
                            </div>

                            <div class="col-md-6">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <input type="number" class="form-control" name="discount_price" id="discount_price"
                                    placeholder="Enter discount price"
                                    value="{{ old('discount_price', $course->discount_price) }}" />
                            </div>

                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label">Course Prerequisites</label>
                                <textarea class="form-control editor" name="prerequisites" id="prerequisites"> {{ old('prerequisites', $course->prerequisites) }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="course_goal" class="form-label"
                                    style="display: flex; align-items:center; justify-content:space-between">
                                    Course Goals
                                    <button type="button" id="addGoalInput" class="btn btn-primary">+</button>
                                </label>

                                <div id="goalContainer">

                                    @foreach ($course_goals as $item)
                                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                            <input type="text" class="form-control" name="course_goals[]"
                                                value="{{ $item->goal_name }}" placeholder="Enter Course Goal" />
                                            <button type="button" class="btn btn-danger removeGoalInput">-</button>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-3">
                                <div class="form-check form-check-success">
                                    <input type="hidden" name="bestseller" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckSuccess"
                                        style="cursor: pointer" value="yes"
                                        {{ $course->bestseller == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckSuccess">bestseller</label>
                                </div>

                                <div class="form-check form-check-danger">
                                    <input type="hidden" name="featured" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDanger"
                                        style="cursor: pointer" value="yes"
                                        {{ $course->featured == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDanger">featured</label>
                                </div>

                                <div class="form-check form-check-warning">
                                    <input type="hidden" name="highestrated" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckWarning"
                                        style="cursor: pointer" value="yes"
                                        {{ $course->highestrated == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckWarning">highestrated</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4 w-100">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!--end row-->

    </div>
@endsection

@push('scripts')
    {{-- slug dan subcategory --}}
    <script src="{{ asset('customjs/teacher/course.js') }}"></script>

    {{-- video youtube preview --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoUrlField = document.getElementById('video_url');
            const videoPreview = document.getElementById('videoPreview');

            // Initialize iframe with existing video URL from database
            const initialVideoUrl = videoUrlField.value; // Get the initial value from the input
            if (initialVideoUrl) {
                const videoId = extractYouTubeID(initialVideoUrl);
                if (videoId) {
                    videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                    videoPreview.style.display = 'block';
                }
            }

            // Update iframe on input change
            videoUrlField.addEventListener('input', function() {
                const videoUrl = this.value;
                if (videoUrl) {
                    const videoId = extractYouTubeID(videoUrl);
                    if (videoId) {
                        videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                        videoPreview.style.display = 'block';
                    } else {
                        alert('Invalid YouTube URL');
                        videoPreview.style.display = 'none';
                        videoPreview.src = '';
                    }
                } else {
                    videoPreview.style.display = 'none';
                    videoPreview.src = '';
                }
            });

            // Function to extract YouTube video ID
            function extractYouTubeID(url) {
                const regex =
                    /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
                const match = url.match(regex);
                return match ? match[1] : null;
            }
        });
    </script>

    {{-- checkbox --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".form-check-input").forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    let hiddenInput = this.previousElementSibling; // Hidden input
                    hiddenInput.value = this.checked ? "yes" :
                        "no"; // Set value based on checked state
                });
            });
        });
    </script>
@endpush
