@extends('frontend.template.main')

@section('title', 'Syarat')
@section('head', 'Syarat dan Ketentuan')

@section('content')
    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-4 text-capitalize mb-3">Syarat dan <span class="text-judul">Ketentuan</span></h1>
            </div>
            <div class="container-fluid overflow-hidden syarat">
                <div class="container pb-5">
                    <div class="row g-5">
                        <div class="col-xl-15 mx-auto wow fadeInUp" data-wow-delay="0.2s">
                            <div class="syarat-item">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="syarat-item-inner border p-4">
                                            <div class="syarat-icon mb-4">
                                                <i class="fas fa-file-contract syarat-icon fa-2x"></i>
                                            </div>
                                            <h4 class="mb-3">Persyaratan Sewa Mobil (Lepas Kunci)</h4>
                                            <ul
                                                style="list-style-position: inside; padding: 0; margin-left: 0; text-align: left;">
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Membawa KTP (Asli)</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Membawa Kartu Keluarga
                                                    (Asli)</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Memiliki Motor Pribadi
                                                </li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Memiliki STNK dengan
                                                    Tahun Keluaran
                                                    Minimal 2018</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Memiliki SIM C (Motor)
                                                </li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Menyertakan NPWP</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Menyertakan ID Card
                                                    Kerja atau Kartu
                                                    Mahasiswa</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Follow Instagram</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="syarat-item-inner border p-4">
                                            <div class="syarat-icon mb-4">
                                                <i class="fas fa-bookmark syarat-icon fa-2x"></i>
                                            </div>
                                            <h4 class="mb-3">Ketentuan Booking</h4>
                                            <ul
                                                style="list-style-position: inside; padding: 0; margin-left: 0; text-align: left;">
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Mengisi Identitas Diri
                                                </li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Membayar DP 50%</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Mengunggah Bukti
                                                    Transfer DP</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Mencantumkan Catatan
                                                    Alamat Pick-up
                                                    dan Drop-off</li>
                                                <li class="h6 text-item" style="margin-bottom: 5px;">Menyetujui Syarat Sewa
                                                    Mobil</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    <!-- Banner Start -->
    @include('frontend.partials._banner')
    <!-- Banner End -->

@endsection
