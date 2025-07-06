<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
    <div class="media media-card align-items-center">
        <div class="media-img media--img media-img-md rounded-full">
            <img class="rounded-full"
                src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('frontend/images/small-avatar-1.jpg') }}"
                alt="Student thumbnail image">
        </div>
        <div class="media-body">
            <h2 class="section__title fs-30">{{ auth()->user()->username }}</h2>
        </div><!-- end media-body -->
    </div><!-- end media -->
    {{-- <div class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">
        <input type="file" name="files[]" class="multi file-upload-input">
        <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload a course</span>
    </div><!-- file-upload-wrap --> --}}
</div><!-- end breadcrumb-content -->
