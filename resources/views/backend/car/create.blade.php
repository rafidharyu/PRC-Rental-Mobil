@extends('backend.template.main')

@section('title', 'Create Car')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
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
                <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('panel.car.index') }}">Car</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Car</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Create Car</h1>
                <p class="mb-0">Tambah Sewa Mobil PRC</p>
            </div>
            <div>
                <a href="{{ route('panel.car.index') }}"
                    class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- form --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('panel.car.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price_day">Harga Sewa</label>
                            <input type="number" name="price_day" id="price_day" min="0"
                                class="form-control @error('price_day') is-invalid @enderror" value="{{ old('price_day') }}">

                            @error('price_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="seat">Bangku</label>
                            <input type="number" name="seat" id="seat" min="0"
                                class="form-control @error('seat') is-invalid @enderror" value="{{ old('seat') }}">

                            @error('seat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fuel">Bahan Bakar</label>
                            <select name="fuel" id="fuel" class="form-select @error('fuel') is-invalid @enderror">
                                <option value="">-- select --</option>
                                <option value="bensin">Bensin</option>
                                <option value="diesel">Diesel</option>
                            </select>

                            @error('fuel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="transmisi">Transmisi</label>
                            <select name="transmisi" id="transmisi" class="form-select @error('transmisi') is-invalid @enderror">
                                <option value="">-- select --</option>
                                <option value="manual">Manual</option>
                                <option value="automatic">Automatic</option>
                            </select>

                            @error('transmisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="year_of_car">Tahun Kendaraan</label>
                            <select name="year_of_car" id="year_of_car" class="form-control @error('year_of_car') is-invalid @enderror">
                                <option value="">Pilih Tahun</option>
                                @for ($year = date('Y'); $year >= 1990; $year--)
                                    <option value="{{ $year }}" {{ old('year_of_car') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>

                            @error('year_of_car')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">-- select --</option>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                            </select>

                            @error('year_of_car')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="form-control  @error('image') is-invalid @enderror">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
