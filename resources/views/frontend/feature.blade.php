@extends('frontend.template.main')

@section('title', 'Fitur')
@section('head', 'Fitur Kami')

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
