@extends('frontend.template.main')

@section('title', 'Mobil')
@section('head', 'Kategori Mobil')

@section('content')

        @include('frontend.partials._car-categories')

        @include('frontend.partials._steps')

        @include('frontend.partials._banner')
        
@endsection
