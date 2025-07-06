@extends('backend.admin.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', [
            'title' => 'Info Box',
            'sub_title' => 'Manage Info',
        ])
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center mt-3">
                        <h5>INFO BOX 1</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('admin.info.update', $first_info->id ?? '1') }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="icon" class="form-label">Icon</label>
                                <textarea class="form-control" name="icon" id="icon" placeholder="Enter the svg icon only" rows="5">{{ $first_info->icon ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" name="title" id="title" placeholder="Enter the title"
                                    value="{{ $first_info->title ?? '' }}" />
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter the description" rows="3">{{ $first_info->description ?? '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center mt-3">
                        <h5>INFO BOX 2</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST"
                            action="{{ route('admin.info.update', $second_info->id ?? '2') }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="icon" class="form-label">Icon</label>
                                <textarea class="form-control" name="icon" id="icon" placeholder="Enter the svg icon only" rows="5">{{ $second_info->icon ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" name="title" id="title" placeholder="Enter the title"
                                    value="{{ $second_info->title ?? '' }}" />
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter the description" rows="3">{{ $second_info->description ?? '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center mt-3">
                        <h5>INFO BOX 3</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST"
                            action="{{ route('admin.info.update', $third_info->id ?? '3') }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="icon" class="form-label">Icon</label>
                                <textarea class="form-control" name="icon" id="icon" placeholder="Enter the svg icon only" rows="5">{{ $third_info->icon ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" name="title" id="title" placeholder="Enter the title"
                                    value="{{ $third_info->title ?? '' }}" />
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter the description" rows="3">{{ $third_info->description ?? '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
        <!--end row-->

    </div>
@endsection
