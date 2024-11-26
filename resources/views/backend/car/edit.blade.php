@extends('backend.template.main')

@section('title', 'Edit Car')

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
            <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('panel.car.index') }}">Mobil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Mobil</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Data Mobil</h1>
            <p class="mb-0">Ubah Data Mobil PRC</p>
        </div>
        <div>
            <a href="{{ route('panel.car.index') }}"
                class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{ route('panel.car.update', $car->uuid) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $car->name) }}">

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
                            class="form-control @error('price_day') is-invalid @enderror" value="{{ old('price_day', $car->price_day) }}">

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
                        <input type="number" name="seat" id="seat" min="1"
                            class="form-control @error('seat') is-invalid @enderror" value="{{ old('seat', $car->seat) }}">

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
                            <option value="petrol" {{ old('fuel', $car->fuel) == 'bensin' ? 'selected' : '' }}>Bensin</option>
                            <option value="diesel" {{ old('fuel', $car->fuel) == 'diesel' ? 'selected' : '' }}>Diesel</option>
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
                            <option value="manual" {{ old('transmisi', $car->transmisi) == 'manual' ? 'selected' : '' }}>Manual</option>
                            <option value="automatic" {{ old('transmisi', $car->transmisi) == 'automatic' ? 'selected' : '' }}>Automatic</option>
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
                        <input type="number" name="year_of_car" id="year_of_car" min="1900" max="{{ date('Y') }}"
                            class="form-control @error('year_of_car') is-invalid @enderror" value="{{ old('year_of_car', $car->year_of_car) }}">

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
                            <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="unavailable" {{ $car->status == 'not_available' ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="image">Gambar</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="form-control @error('image') is-invalid @enderror">

                <img src="{{ asset('storage/' . $car->image) }}" alt="" class="img-fluid mt-3" width="10%">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
