
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PRC - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
        <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

        {{-- sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('css')
    </head>

    <body>

        <div class="swal" data-swal="{{ session('success') }}"></div>
        <div class="swal-error" data-swal="{{ session('error') }}"></div>

        {{-- Navbar --}}
        @include('frontend.template.navbar')

        @if (!request()->is('/'))
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">@yield('head')</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active bg-breadcrumb-text">@yield('title')</li>
                </ol>
            </div>
        </div>
        <!-- Header End -->
        @endif

        @yield('content')

        {{-- Footer & JS --}}
        @include('frontend.template.footer')

        {{-- Book Modal --}}
        @include('frontend.partials._modal-book')

        <!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/lib/wow/wow.min.js"></script>
<script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('frontend') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('frontend') }}/lib/counterup/counterup.min.js"></script>
<script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>


<!-- Template Javascript -->
<script src="{{ asset('frontend') }}/js/main.js"></script>

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- sweetalert --}}
<script>
    const swal = $('.swal').data('swal');

    if (swal) {
        Swal.fire({
            title: 'Success!',
            text: swal,
            icon: 'success',
            timer: 2500,
            showConfirmButton: false
        })
    }

    const swalError = $('.swal-error').data('swal');

    if (swalError) {
        Swal.fire({
            title: 'Error!',
            text: swalError,
            icon: 'error',
            timer: 2500,
            showConfirmButton: false
        })
    }
</script>

@stack('js')
</body>

</html>
