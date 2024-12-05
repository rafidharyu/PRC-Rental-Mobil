@extends('backend.template.main')

@section('title', 'Create Operator')

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
            <li class="breadcrumb-item"><a href="{{ route('panel.operator.index') }}">Operator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Akun Operator</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Buat Akun Operator</h1>
            <p class="mb-0">Tambah Operator PRC</p>
        </div>
        <div>
            <a href="{{ route('panel.operator.index') }}"
                class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                <i class="fas fa-arrow-left me-1"></i> Kembali
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
        <form action="{{ route('panel.operator.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name">Nama Operator</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ?? '' }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email Operator</label>
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') ?? '' }}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Password Operator</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation">Confirm Password Operator</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role">Role Operator</label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" readonly>
                    <option value="operator" selected>operator</option>
                </select>

                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <input type="hidden" name="is_active" value="1">


            <div class="float-end">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection
