@extends('backend.template.main')

@section('title', 'Account Inactive')

@section('content')
<div class="container mt-7 pb-7">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-triangle text-danger"></i> Akun Tidak Aktif</h4>
                </div>
                <div class="card-body">
                    <p class=" text-center">
                        Email: <strong>{{ auth()->user()->email }}</strong>
                    </p>
                    <p class="text-center">
                        Silakan hubungi owner untuk aktivasi akun Anda.
                    </p>
                    <div class="text-center">
                        <a href="https://wa.me/6285174362969?text=Halo, saya ingin konfirmasi akun operator saya." target="_blank" class="btn " style="background-color: #34c759;">
                            <i class="fab fa-whatsapp"></i> Hubungi Owner
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
