@extends('frontend.layouts.master')

@section('contents')
    {{-- BREADCRUMB PART START --}}
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>Forget Password</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Forget Password </li>
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
                        <label class="mb-3">Forgot your password? No problem. Just let us know your email address and
                            we
                            will email you a
                            password reset link that will allow you to choose a new one.</label>

                        @if (session('status'))
                            <div class="alert alert-success mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>email</label>
                                        <input type="email" placeholder="Email" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">Email Password Reset Link</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <p class="create_account">Back to <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- FORGOT PASSWORD END --}}
@endsection
