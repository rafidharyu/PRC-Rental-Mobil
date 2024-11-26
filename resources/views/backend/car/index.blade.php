@extends('backend.template.main')

@section('title', 'Car')

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
            <li class="breadcrumb-item active" aria-current="page">Mobil</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Mobil</h1>
            <p class="mb-0">Data Mobil PRC</p>
        </div>
        <div>
            @if (auth()->user()->role === 'operator')
            <a href="{{ route('panel.car.create') }}" class="btn btn-warning d-inline-flex align-items-center">
                <i class="fas fa-plus me-1"></i> Tambah Mobil
            </a>
            @endif
        </div>
    </div>
</div>

@session('success')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession

{{-- table --}}
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-hover table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center border-0 rounded-start">No</th>
                        <th class="text-center  border-1">Nama</th>
                        <th class="text-center border-1">Harga Sewa</th>
                        <th class="text-center border-1">Status</th>
                        <th class="text-center border-1">Gambar</th>
                        <th class="text-center border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cars as $item)
                    <tr>
                        <td>{{ ($cars->currentPage() - 1) * $cars->perPage() + $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ 'Rp. ' . number_format($item->price_day, 0, ',', '.') . ' / hari' }}</td>
                        <td class="text-center border-0">
                            @if ($item->status == 'available')
                            <span class="badge bg-success">Tersedia</span>
                            @else
                            <span class="badge bg-danger">Tidak Tersedia</span>
                            @endif
                        </td>
                        <td width="20%">
                            <img src="{{ asset('storage/' . $item->image . '') }}" alt="" class="img-fluid rounded"
                                style="aspect-ratio: 4/3; object-fit: cover; object-position: center;" target="_blank">
                        </td>
                        <td class="text-center">
                            <a href="{{ route('panel.car.show', $item->uuid) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>

                            @if (auth()->user()->role === 'operator')
                            <a href="{{ route('panel.car.edit', $item->uuid) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button class="btn btn-sm btn-danger" onclick="deleteCar(this)"
                                data-uuid="{{ $item->uuid }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- pagination --}}
            <div class="mt-3">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const deleteCar = (e) => {
        let uuid = e.getAttribute('data-uuid')

        Swal.fire({
            title: "Anda yakin?",
            text: "Data tidak akan bisa dikembalikan!",
            icon: "peringatan",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus data!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: `/panel/car/${uuid}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        Swal.fire({
                            title: "Dihapus!",
                            text: data.message,
                            icon: "success",
                            timer: 2500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function (data) {
                        Swal.fire({
                            title: "Gagal!",
                            text: "File Anda tidak dihapus.",
                            icon: "error"
                        });

                        console.log(data);
                    }
                });
            }
        });
    }
</script>
@endpush
