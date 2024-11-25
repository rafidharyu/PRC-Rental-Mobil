@extends('backend.template.main')

@section('title', 'Review: ' . $review->transaction->code)

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-custom">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('panel.dashboard') }}" class="breadcrumb-link text-gold">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('panel.review.index') }}" class="breadcrumb-link text-gold">Review</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $review->transaction->code }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
        <div>
            <h1 class="h4 text-dark font-weight-bold">Review: {{ $review->transaction->code }}</h1>
            <p class="mb-0 text-muted">Rental: {{ $review->transaction->code }} PRC Car Rental</p>
        </div>
        <div>
            <a href="{{ route('panel.review.index') }}" class="btn btn-gradient">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card border-0 shadow mb-4">
            <table class="table table-bordered align-middle">
                <thead class="table-header">
                    <tr>
                        <th>Kolom</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td>Name</td>
                        <td>{{ $review->transaction->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Car</td>
                        <td>{{ $review->transaction->car->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Rating</td>
                        <td>{{ $review->rate }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Comments</td>
                        <td style="word-break: break-word; max-width: 100%; white-space: normal;">
                            {{ $review->comment }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td>Created at</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($review->created_at)) }}</td>
                    </tr>
                </tbody>
            </table>
    </div>


</div>
@endsection
