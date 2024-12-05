@extends('backend.template.main')

@section('title', 'Transaction: ' . $transaction->code)

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
                <li class="breadcrumb-item"><a href="{{ route('panel.transaction.index') }}">Transaksi</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $transaction->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Transaksi: {{ $transaction->name }}</h1>
                <p class="mb-0">Kode Transaksi: {{ $transaction->code }}</p>
            </div>
            <div>
                <a href="{{ route('panel.transaction.index') }}"
                    class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    {{-- table --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $transaction->name }}</td>
                    </tr>

                    <tr>
                        <th>Telepon</th>
                        <td>: {{ $transaction->phone }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>: {{ $transaction->email }}</td>
                    </tr>

                    <tr>
                        <th>Mobil</th>
                        <td>: {{ $transaction->car->name }}</td>
                    </tr>

                    <tr>
                        <th>TGL. Ambil</th>
                        <td>: {{ date('d-m-Y', strtotime($transaction->pick_date)) }}</td>
                    </tr>

                    <tr>
                        <th>WKT. Ambil</th>
                        <td>: {{ $transaction->pick_time }}</td>
                    </tr>

                    <tr>
                        <th>TGL. Pengembalian</th>
                        <td>: {{ date('d-m-Y', strtotime($transaction->drop_date)) }}</td>
                    </tr>

                    <tr>
                        <th>WKT. Pengembalian</th>
                        <td>: {{ $transaction->drop_time }}</td>
                    </tr>

                    <tr>
                        <th>LOK. Ambil</th>
                        <td>: {{ $transaction->pick_option }}</td>
                    </tr>

                    <tr>
                        <th>LOK. Pengembalian</th>
                        <td>: {{ $transaction->drop_option }}</td>
                    </tr>

                    <tr>
                        <th>Down Payment</th>
                        <td>: Rp. {{ number_format($downPayment, 0, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <th>Total Harga</th>
                        <td>: Rp. {{ number_format($transaction->price_total, 0, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <th>Catatan</th>
                        <td>: {{ $transaction->message }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>:
                            @if ($transaction->status == 'pending')
                                <span class="badge bg-warning">Tertunda</span>
                            @elseif ($transaction->status == 'failed')
                                <span class="badge bg-danger">Gagal</span>
                            @else
                                <span class="badge bg-success">Sukses</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>File</th>
                        <td width="60%">
                            @if($transaction->file)
                                <img src="{{ asset('storage/' . $transaction->file) }}" class="img-fluid" width="20%" target="_blank">
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    @isset($review)
                        <tr>
                            <th>Penilaian</th>
                            <td width="60%">
                                : {{ $review->rate }}
                            </td>
                        </tr>

                        <tr>
                            <th>Komentar</th>
                            <td width="60%">
                                : {{ $review->comment }}
                            </td>
                        </tr>
                    @endisset
                </table>
            </div>

            {{-- <div class="float-end mt-2">
                @if (auth()->user()->role === 'operator')
                    <a href="" class="btn btn-warning"><i
                            class="fas fa-edit"></i> Konfirmasi</a>
                @endif
            </div> --}}
        </div>
    </div>
@endsection
