@extends('backend.template.main')

@section('title', 'Edit Operator')

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
                    <a href="{{ route('backend.operators.index') }}" class="breadcrumb-link text-gold">Operators</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Operator</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
            <div>
                <h1 class="h4 text-dark font-weight-bold">Edit Operator</h1>
                <p class="mb-0 text-muted">Update the information for this operator.</p>
            </div>
            <div>
                <a href="{{ route('backend.operators.index') }}" class="btn btn-gradient">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>

        <!-- Alerts -->
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
                <form action="{{ route('backend.operators.update', $operator->id) }}" method="post">
                    @csrf
                    @method('PUT')
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
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $operator->name) }}" readonly>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="email">Email</label></td>
                                <td>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $operator->email) }}" readonly>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td><label for="is_active">Status</label></td>
                                <td>
                                    <select name="is_active" id="is_active"
                                        class="form-select @error('is_active') is-invalid @enderror">
                                        <option value="1" {{ $operator->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$operator->is_active ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('is_active')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
