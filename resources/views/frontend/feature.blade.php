@extends('frontend.template.main')

@section('title', 'Feature')
@section('head', 'Our Features')

@section('content')
        <!-- Feature Start -->
        @include('frontend.partials._features')
        <!-- Feature End -->

        <!-- Fact Counter -->
        @include('frontend.partials._counter')
        <!-- Fact Counter -->

        <!-- Banner Start -->
        @include('frontend.partials._banner')
        <!-- Banner End -->

@endsection
