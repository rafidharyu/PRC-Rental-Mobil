@extends('backend.template.main')

@section('title', 'Account Inactive')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Akun Tidak Aktif
                </div>

                <div class="card-body">
                    <p>{{ auth()->user()->email }} akun anda belum aktif. Hubungi owner untuk aktivasi akun.</p>
                    <a href="mailto:{{ $ownerEmail }}" class="btn btn-primary">Contact Owner</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
