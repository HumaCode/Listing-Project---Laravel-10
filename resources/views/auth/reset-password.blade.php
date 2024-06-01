@extends('frontend.layouts.master')

@section('contents')
    {{-- BREADCRUMB PART START --}}
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>Reset Password</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Reset Password </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- BREADCRUMB PART END --}}

    {{-- FORGOT PASSWORD START --}}
    <section class="wsus__login_page">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">


                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" name="email" readonly
                                            value="{{ old('email', $request->email) }}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Password</label>
                                        <input type="password" placeholder="New Password" name="password">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Password Confirmation</label>
                                        <input type="password" placeholder="Password Confirmation"
                                            name="password_confirmation">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">Reset Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- FORGOT PASSWORD END --}}
@endsection
