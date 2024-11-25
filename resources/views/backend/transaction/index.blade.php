@extends('backend.template.main')

@section('title', 'Transactions')

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
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4 text-gold">Transaction Management</h1>
                <p class="mb-0 text-muted">Manage car rental transactions</p>
            </div>
            {{-- <div>
                @if (auth()->user()->role === 'owner')
                    <button type="button" data-bs-toggle="modal" data-bs-target="#downloadModal"
                        class="btn btn-gradient d-inline-flex align-items-center">
                        <i class="fas fa-file-excel me-1"></i> Download
                    </button>
                @endif
            </div> --}}
        </div>
    </div>

    @session('success')
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    @session('error')
        <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
            <i class="fas fa-times-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <div class="card border-0 shadow-lg mb-4">
        <div class="card-body bg-gradient-dark rounded">
            <div class="table-responsive">
                <table class="table table-hover table-striped text-center" style="border-spacing: 0 10px;">
                    <thead class="table-header">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Name</th>
                            <th class="py-3">Phone</th>
                            <th class="py-3">Car</th>
                            <th class="py-3">Pick-up Date</th>
                            <th class="py-3">Pick-up Time</th>
                            <th class="py-3">Pick-up Location</th>
                            <th class="py-3">Total Price</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr class="table-row">
                                <td>{{ ($transactions->currentPage() - 1) * $transactions->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->car->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->pick_date)) }}</td>
                                <td>{{ $item->pick_time }}</td>
                                <td>{{ $item->pick_option }}</td>
                                <td>{{ 'Rp. ' . number_format($item->price_total, 0, ',', '.') }}</td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <span class="badge status-pending">Pending</span>
                                    @elseif($item->status == 'failed')
                                        <span class="badge status-failed">Failed</span>
                                    @else
                                        <span class="badge status-success">Success</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('panel.transaction.show', $item->uuid) }}"
                                            class="btn btn-sm btn-icon btn-view">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if (auth()->user()->role === 'owner')
                                            <button type="button" class="btn btn-sm btn-icon btn-confirm"
                                                data-bs-toggle="modal" data-bs-target="#downloadModal">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        @endif
                                        @if (auth()->user()->role === 'operator')
                                            <button type="button" class="btn btn-sm btn-icon btn-confirm"
                                                onclick="confirmModal(this)" data-uuid="{{ $item->uuid }}">
                                                <i class="fa-solid fa-list"></i>
                                            </button>

                                            <button class="btn btn-sm btn-icon btn-delete" onclick="deleteTransaction(this)"
                                                data-uuid="{{ $item->uuid }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-muted">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4 d-flex justify-content-end">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('backend.transaction._modal-confirm')
    @include('backend.transaction._modal-download')
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const deleteTransaction = (e) => {
            let uuid = e.getAttribute('data-uuid')

            Swal.fire({
                title: "Are you sure?",
                text: "Data cannot be restored!",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancel",
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: `/panel/transaction/${uuid}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Deleted!",
                                text: data.message,
                                icon: "success",
                                timer: 2500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "Failed!",
                                text: "Unable to delete data.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        const confirmModal = (e) => {
            let uuid = e.getAttribute('data-uuid')

            $('#confirmForm').attr('action', `/panel/transaction/${uuid}`)
            $('#confirmModal').modal('show')
        }
    </script>
@endpush
