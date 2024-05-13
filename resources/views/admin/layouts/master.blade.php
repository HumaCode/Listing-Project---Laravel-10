<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard &mdash; Listing Project</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/fontawesome/css/all.min.css">

    @stack('css')


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/components.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>


            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('contents')
            </div>


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="https://nauval.in/">HumaCode</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/popper.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/tooltip.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/stisla.js"></script>


    <!-- Template JS File -->
    <script src="{{ asset('admin') }}/assets/js/scripts.js"></script>


    @stack('style')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

</body>

</html>
