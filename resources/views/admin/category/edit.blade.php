@extends('admin.layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/summernote/summernote-bs4.css">
    {{-- <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/jquery-selectric/selectric.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> --}}
@endpush

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.category.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Category</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="name" id="name" autofocus
                                            value="{{ $category->name }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="slug" id="slug" readonly
                                            value="{{ $category->slug }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Icon <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview image-icon-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image_icon" id="image-upload"
                                                accept=".jpg,.jpeg,.png" />
                                            <input type="hidden" name="old_icon" value="{{ $category->image_icon }}">
                                        </div>
                                        <div class="text-danger">* Allowable size 100x100 px</div>

                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background Icon
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview-2" class="image-preview background-preview">
                                            <label for="image-upload-2" id="image-label">Choose File</label>
                                            <input type="file" name="background_image" id="image-upload-2"
                                                accept=".jpg,.jpeg,.png" />
                                            <input type="hidden" name="old_background"
                                                value="{{ $category->background_image }}">
                                        </div>
                                        <div class="text-danger">* Allowable size 420x280 px</div>

                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Show At
                                        Home</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div
                                            class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                            <div class="selectric-hide-select">
                                                <select class="form-control selectric" tabindex="-1" name="show_at_home">
                                                    <option value="1" @selected($category->show_at_home === 1)>Yes</option>
                                                    <option value="0" @selected($category->show_at_home === 0)>No</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div
                                            class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                            <div class="selectric-hide-select">
                                                <select class="form-control selectric" tabindex="-1" name="status">
                                                    <option value="1" @selected($category->status === 1)>
                                                        Active</option>
                                                    <option value="0" @selected($category->status === 0)>
                                                        Inactive</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;
                                            Save</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('style')
    <script src="{{ asset('admin') }}/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/upload-preview/assets/js/my_script_upload.js"></script>

    <script>
        // slug
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/category/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });



        $(document).ready(function() {
            $('.image-icon-preview').css({
                'background-image': 'url({{ asset($category->image_icon) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });

            $('.background-preview').css({
                'background-image': 'url({{ asset($category->background_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        })
    </script>
@endpush
