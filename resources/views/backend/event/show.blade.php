@extends('backend.template.main')

@section('title', 'Event: ' . $event->name)

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-custom">
                <li class="breadcrumb-item">
                    <a href="#" class="breadcrumb-link">
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
                    <a href="{{ route('panel.event.index') }}" class="breadcrumb-link text-gold">Event</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
            <div>
                <h1 class="h4 text-dark font-weight-bold">Event Details: {{ $event->name }}</h1>
                <p class="mb-0 text-muted">Detailed information from this event.</p>
            </div>
            <div>
                <a href="{{ route('panel.event.index') }}" class="btn btn-gradient">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
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
                        <td>{{ $event->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Description</td>
                        <td>{{ $event->description }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Status</td>
                        <td>
                            @if ($event->status == 'active')
                                <span class="badge status-available">Active</span>
                            @else
                                <span class="badge status-unavailable">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td>Image</td>
                        <td>
                            <img src="{{ asset('storage/' . $event->image) }}" class="table-image img-thumbnail"
                                alt="Event Image">
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td>Created At</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($event->created_at)) }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Updated At</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($event->updated_at)) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Edit Button -->
        {{-- @if (auth()->user()->role === 'operator')
    <div class="text-end mt-4">
        <a href="{{ route('panel.event.edit', $event->uuid) }}" class="btn btn-edit">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    @endif --}}
    </div>
@endsection
