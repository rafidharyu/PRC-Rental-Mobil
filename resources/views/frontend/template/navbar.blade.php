<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid topbar bg-secondary d-none d-xl-block w-100">
    <div class="container">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                    <a href="tel:+01234567890" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+01234567890</a>
                    <a href="mailto:example@gmail.com" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>Example@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in"></i></a>
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
                <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>Cental</h1>
                <!-- <img src="{{ asset('frontend') }}/img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
                    <a class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    <a class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">Service</a>
                    <a class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('feature') || request()->routeIs('car') || request()->routeIs('testimonial') || request()->routeIs('404') ? 'active' : '' }}" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('feature') }}" class="dropdown-item {{ request()->routeIs('feature') ? 'active' : '' }}">Our Feature</a>
                            <a href="{{ route('car') }}" class="dropdown-item {{ request()->routeIs('car') ? 'active' : '' }}">Our Cars</a>
                            <a href="{{ route('testimonial') }}" class="dropdown-item {{ request()->routeIs('testimonial') ? 'active' : '' }}">Testimonial</a>
                            <a href="404.html" class="dropdown-item {{ request()->routeIs('404') ? 'active' : '' }}">404 Page</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4 me-2" data-bs-toggle="modal" data-bs-target="#modalBook">Booking</a>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Get Started</a>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->
