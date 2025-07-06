<div class="breadcrumb-content d-flex mb-5">
    <div class="container d-flex align-items-center gap-5 bg-white p-4 rounded shadow w-100">
        <!-- Gambar -->
        <img src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('frontend/images/small-avatar-1.jpg') }}"
            alt="User photo" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">

        <!-- Teks -->
        <div class="ml-4">
            <h2 class="section__title fs-30 mb-2">{{ auth()->user()->username }}</h2>
            <h2 class="section__title fs-30 text-muted">{{ auth()->user()->role }}</h2>
        </div>
    </div><!-- end media -->
</div><!-- end breadcrumb-content -->
{{-- <div class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">
    <input type="file" name="files[]" class="multi file-upload-input">
    <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload a course</span>
</div><!-- file-upload-wrap --> --}}
