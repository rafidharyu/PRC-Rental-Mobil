@extends('frontend.template.main')

@section('title', 'About')
@section('head', 'About Us')

@section('content')
<!-- About Start -->
@include('frontend.partials._about')
<!-- About End -->

<!-- Fact Counter -->
@include('frontend.partials._counter')
<!-- Fact Counter -->

<!-- Features Start -->
@include('frontend.partials._features')
<!-- Features End -->

<!-- Car Steps Start -->
@include('frontend.partials._steps')
<!-- Car Steps End -->

<!-- Banner Start -->
@include('frontend.partials._banner')
<!-- Banner End -->
@endsection
