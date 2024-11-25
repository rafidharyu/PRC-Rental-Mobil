@extends('backend.template.main')

@section('title', 'Account Inactive')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center mb-2">
                        <i class="bi bi-person-exclamation text-danger mb-4" style="font-size: 120px;"></i>
                        <h4 class="text-danger mb-3">Akun Tidak Aktif</h4>
                        <p class="text-muted mb-4">
                            Akun dengan email <strong>{{ auth()->user()->email }}</strong> belum diaktifkan.
                            Silakan hubungi owner untuk aktivasi akun Anda.
                        </p>
                    </div>
                    <a href="mailto:{{ $ownerEmail }}" class="btn btn-outline-danger btn-lg px-4 py-2">
                        <i class="fas fa-envelope me-2"></i> Hubungi Owner
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
