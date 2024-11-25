@extends('backend.template.main')

@section('title', 'Car: ' . $car->name)

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
                    <a href="{{ route('panel.car.index') }}" class="breadcrumb-link text-gold">Car</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $car->name }}</li>

            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
            <div>
                <h1 class="h4 text-dark font-weight-bold">Car Details: {{ $car->name }}</h1>
                <p class="mb-0 text-muted">Detailed information of this car.</p>
            </div>
            <div>
                <a href="{{ route('panel.car.index') }}" class="btn btn-gradient">
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
                        <td>{{ $car->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Slug</td>
                        <td>{{ $car->slug }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Seat</td>
                        <td>{{ $car->seat }} seats</td>
                    </tr>
                    <tr class="table-row">
                        <td>Fuel</td>
                        <td>{{ ucfirst($car->fuel) }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Transmission</td>
                        <td>{{ ucfirst($car->transmisi) }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Year of Car</td>
                        <td>{{ $car->year_of_car }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Price Per Day</td>
                        <td>Rp. {{ number_format($car->price_day, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Status</td>
                        <td>
                            @if ($car->status == 'available')
                                <span class="badge status-available">Available</span>
                            @else
                                <span class="badge status-unavailable">Not Available</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td>Image</td>
                        <td>
                            <img src="{{ asset('storage/' . $car->image) }}" class="table-image img-tdumbnail"
                                alt="Car Image">
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td>Created At</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($car->created_at)) }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Updated At</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($car->updated_at)) }}</td>
                    </tr>
                </tbody>
                {{-- <!-- Edit Button -->
                @if (auth()->user()->role === 'operator')
                <div class="text-end mt-4">
                    <a href="{{ route('panel.car.edit', $car->uuid) }}" class="btn btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
                @endif --}}
            </table>
        </div>
    </div>
@endsection
