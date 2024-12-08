<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-judul" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid topbar bg-black d-none d-xl-block w-100">
    <div class="container">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <a href="https://www.google.com/maps/place/SEWA+MOBIL+LAMPUNG+%7C+PRC+RENT+CAR/@-5.3904322,105.2061126,825m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2e40d1b8ca724e5b:0x467c53bfeaf76d93!8m2!3d-5.3904375!4d105.2086875!16s%2Fg%2F11kq3vdq8s!5m1!1e2?entry=ttu&g_ep=EgoyMDI0MTExMS4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-muted me-4"><i class="fas fa-map-marker-alt icon-color me-2"></i>Temukan Lokasi</a>
                    <a href="https://wa.me/6285769040309" target="_blank" class="text-muted me-4"><i class="fab fa-whatsapp icon-color me-2"></i>085769040309</a>
                    <a href="mailto:example@gmail.com" class="text-muted me-0"><i class="fas fa-envelope icon-color me-2"></i>prclampung@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    {{-- <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-twitter"></i></a> --}}
                    <a href="https://www.tiktok.com/@sewamobillampung.krc/" target="_blank" class="btn btn-light btn-sm-square rounded-circle me-3">
                        <i class="fab fa-tiktok icon-color"></i>
                    </a>
                    <a href="https://www.instagram.com/sewamobillampung.co/" target="_blank" class="btn btn-light btn-sm-square rounded-circle me-3">
                        <i class="fab fa-instagram icon-color"></i>
                    </a>
                    <a href="https://wa.me/6285769040309/" target="_blank" class="btn btn-light btn-sm-square rounded-circle me-3">
                        <i class="fab fa-whatsapp icon-color"></i>
                    </a>
                    {{-- <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="" class="navbar-brand p-0">
                <img src="{{ asset('frontend/img/prc.png') }}" alt="Logo" style="width: 50px; height: 50px;" class="me-2">
                <h1 class="display-6  d-inline-block align-middle">PRC</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Beranda</a>
                    <a class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a>
                    <a class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">Layanan</a>
                    <a class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Syarat</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('feature') || request()->routeIs('car') || request()->routeIs('testimonial') || request()->routeIs('404') ? 'active' : '' }}" data-bs-toggle="dropdown">Halaman</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('feature') }}" class="dropdown-item {{ request()->routeIs('feature') ? 'active' : '' }}">Fitur Kami</a>
                            <a href="{{ route('car') }}" class="dropdown-item {{ request()->routeIs('car') ? 'active' : '' }}">Mobil Kami</a>
                            <a href="{{ route('testimonial') }}" class="dropdown-item {{ request()->routeIs('testimonial') ? 'active' : '' }}">Testimoni</a>
                            {{-- <a href="404.html" class="dropdown-item {{ request()->routeIs('404') ? 'active' : '' }}">404 Page</a> --}}
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
                </div>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4 me-2" data-bs-toggle="modal" data-bs-target="#modalBook">Booking</a>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Get Started</a>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->
