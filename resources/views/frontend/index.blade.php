@extends('frontend.template.main')

@section('title', 'Home')

@section('content')
<!-- Carousel Start -->
<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($events->where('status', 'active') as $key => $event)
            <li data-bs-target="#carouselId" data-bs-slide-to="{{ $key }}"
                class="{{ $key == 0 ? 'active' : '' }}">
            </li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach ($events as $key => $event)
            @if ($event->status === 'active') <!-- Filter hanya untuk status 'active' -->
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid w-100" alt="{{ $event->name }}"/>
                    <div class="carousel-caption">
                        <div class="container py-4">
                            <div class="row g-5">
                                <div class="col-lg-6 text-start fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start">
                                        <h1 class="display-5 text-white">{{ $event->name }}</h1>
                                        <p>{{ $event->description }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-lg-flex fadeInRight animated"
                                    data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
    <!-- Carousel End -->

    <!-- About Start -->
    @include('frontend.partials._about')
    <!-- About End -->

    <!-- Fact Counter -->
    @include('frontend.partials._counter')
    <!-- Fact Counter -->

    <!-- Services Start -->
    @include('frontend.partials._services')
    <!-- Services End -->


    <!-- Features Start -->
    @include('frontend.partials._features')
    <!-- Features End -->

    {{-- <!-- Car categories Start -->
        @include('frontend.partials._car-categories')
        <!-- Car categories End --> --}}

    <!-- Car Steps Start -->
    @include('frontend.partials._steps')
    <!-- Car Steps End -->

    <!-- Banner Start -->
    @include('frontend.partials._banner')
    <!-- Banner End -->

    {{--
    <!-- Testimonial Start -->
    @include('frontend.partials._testimonial')
    <!-- Testimonial End --> --}}

@endsection
