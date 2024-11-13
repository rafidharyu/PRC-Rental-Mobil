@extends('frontend.template.main')

@section('title', 'Car')
@section('head', 'Our Cars')

@section('content')

        @include('frontend.partials._car-categories')

        @include('frontend.partials._steps')

        @include('frontend.partials._banner')
        
@endsection
