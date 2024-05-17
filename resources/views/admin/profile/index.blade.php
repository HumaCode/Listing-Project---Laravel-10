@extends('admin.layouts.master')


@push('css')
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
@endpush

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></div>
                <div class="breadcrumb-item">Update Profile</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Avatar <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview avatar-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="avatar" id="image-upload" />
                                            <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview-2" class="image-preview banner-preview">
                                            <label for="image-upload-2" id="image-label-2">Choose File</label>
                                            <input type="file" name="banner" id="image-upload-2" />
                                            <input type="hidden" name="old_banner" value="{{ $user->banner }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $user->address }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple" style="display: none;" name="about">{!! $user->about !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="website"
                                            value="{{ $user->website }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="fb_link"
                                            value="{{ $user->fb_link }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">X</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="x_link"
                                            value="{{ $user->x_link }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Linkedin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="in_link"
                                            value="{{ $user->in_link }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Whatsapp</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="wa_link"
                                            value="{{ $user->wa_link }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="instra_link"
                                            value="{{ $user->instra_link }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.profile-password.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Confirm Password
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
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
    <script src="{{ asset('admin') }}/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('admin') }}/assets/js/page/features-post-create.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('.avatar-preview').css({
                'background-image': 'url({{ asset($user->avatar) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });

            $('.banner-preview').css({
                'background-image': 'url({{ asset($user->banner) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        })


        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
