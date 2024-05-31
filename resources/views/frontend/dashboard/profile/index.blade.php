@extends('frontend.layouts.master')

@section('contents')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" name="name" placeholder="Name"
                                                            value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>phone <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" name="phone" value="{{ $user->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="email" name="email" placeholder="Email"
                                                            value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>Address <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" name="address" placeholder="Address"
                                                            value="{{ $user->address }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>About Me <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <textarea cols="3" rows="3" name="about" placeholder="Your Text">{{ $user->about }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Website</label>
                                                    <div class="input_area">
                                                        <input type="text" name="website" placeholder="Website"
                                                            value="{{ $user->website }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Facebook</label>
                                                    <div class="input_area">
                                                        <input type="text" name="fb_link" placeholder="Facebook"
                                                            value="{{ $user->fb_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>X</label>
                                                    <div class="input_area">
                                                        <input type="text" name="x_link" placeholder="X"
                                                            value="{{ $user->x_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>LinkedIn</label>
                                                    <div class="input_area">
                                                        <input type="text" name="in_link" placeholder="LinkedIn"
                                                            value="{{ $user->in_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Whatsapp</label>
                                                    <div class="input_area">
                                                        <input type="text" name="wa_link" placeholder="Whatsapp"
                                                            value="{{ $user->wa_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Instagram</label>
                                                    <div class="input_area">
                                                        <input type="text" name="instra_link" placeholder="Instagram"
                                                            value="{{ $user->instra_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">

                                        <div class="my_listing_single">
                                            <label> Avatar</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{ asset($user->avatar) }}" alt="avatar"
                                                    class="imf-fluid w-100">
                                                <input type="file" name="avatar">
                                                <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                                            </div>
                                        </div>

                                        <div class="my_listing_single">
                                            <label> Banner</label>
                                            <div class="profile_pic_upload ">
                                                <img src="{{ asset($user->banner) }}" alt="banner"
                                                    class="imf-fluid w-100">
                                                <input type="file" name="banner">
                                                <input type="hidden" name="old_banner" value="{{ $user->banner }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="read_btn">upload</button>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar">
                            <h4>change password</h4>
                            <form action="{{ route('user.profile-password.update') }}" method="POST">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>current password</label>
                                            <div class="input_area">
                                                <input type="password" placeholder="Current Password"
                                                    name="current_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>new password</label>
                                            <div class="input_area">
                                                <input type="password" placeholder="New Password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="my_listing_single">
                                            <label>confirm password</label>
                                            <div class="input_area">
                                                <input type="password" placeholder="Confirm Password"
                                                    name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">Update Password</button>
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
