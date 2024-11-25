@extends('backend.template.main')

@section('title', 'Create Car')

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
                    <a href="{{ route('panel.car.index') }}" class="breadcrumb-link text-gold">Cars</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create Car</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
            <div>
                <h1 class="h4 text-dark font-weight-bold">Create Car</h1>
                <p class="mb-0 text-muted">Add a new car for rental.</p>
            </div>
            <div>
                <a href="{{ route('panel.car.index') }}" class="btn btn-gradient">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>

        <!-- Success and Error Alerts -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <form action="{{ route('panel.car.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <thead class="table-header">
                            <tr>
                                <th>Kolom</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row">
                                <td><label for="name">Name</label></td>
                                <td>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="price_day">Price Per Day</label></td>
                                <td>
                                    <input type="number" name="price_day" id="price_day" min="0"
                                        class="form-control @error('price_day') is-invalid @enderror"
                                        value="{{ old('price_day') }}">
                                    @error('price_day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="seat">Seats</label></td>
                                <td>
                                    <input type="number" name="seat" id="seat" min="1"
                                        class="form-control @error('seat') is-invalid @enderror"
                                        value="{{ old('seat') }}">
                                    @error('seat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="fuel">Fuel Type</label></td>
                                <td>
                                    <select name="fuel" id="fuel"
                                        class="form-select @error('fuel') is-invalid @enderror">
                                        <option value="">-- select --</option>
                                        <option value="bensin" {{ old('fuel') == 'bensin' ? 'selected' : '' }}>Bensin
                                        </option>
                                        <option value="diesel" {{ old('fuel') == 'diesel' ? 'selected' : '' }}>Diesel
                                        </option>
                                    </select>
                                    @error('fuel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="transmisi">Transmission</label></td>
                                <td>
                                    <select name="transmisi" id="transmisi"
                                        class="form-select @error('transmisi') is-invalid @enderror">
                                        <option value="">-- select --</option>
                                        <option value="manual" {{ old('transmisi') == 'manual' ? 'selected' : '' }}>Manual
                                        </option>
                                        <option value="automatic" {{ old('transmisi') == 'automatic' ? 'selected' : '' }}>
                                            Automatic</option>
                                    </select>
                                    @error('transmisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="year_of_car">Year of Car</label></td>
                                <td>
                                    <select name="year_of_car" id="year_of_car"
                                        class="form-control @error('year_of_car') is-invalid @enderror">
                                        <option value="">Pilih Tahun</option>
                                        @for ($year = date('Y'); $year >= 1990; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('year_of_car') == $year ? 'selected' : '' }}>{{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('year_of_car')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="status">Status</label></td>
                                <td>
                                    <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror">
                                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                                            Available</option>
                                        <option value="not_available"
                                            {{ old('status') == 'not_available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="image">Image</label></td>
                                <td>
                                    <input type="file" name="image" id="image" accept="image/*"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
