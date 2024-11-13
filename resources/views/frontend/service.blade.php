@extends('frontend.template.main')

@section('title', 'Service')
@section('head', 'Our Services')

@section('content')
        <!-- Services Start -->
        @include('frontend.partials._services')
        <!-- Services End -->

        <!-- Fact Counter -->
        @include('frontend.partials._counter')
        <!-- Fact Counter -->

        <!-- Testimonial Start -->
        @include('frontend.partials._testimonial')
        <!-- Testimonial End -->

        <!-- Banner Start -->
        @include('frontend.partials._banner')
        <!-- Banner End -->

@endsection
