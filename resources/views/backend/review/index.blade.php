@extends('backend.template.main')

@section('title', 'Review')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
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
            <li class="breadcrumb-item active" aria-current="page">Review</li>
        </ol>
    </nav>

    {{-- Header Section --}}
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4 text-gold">Review Management</h1>
            <p class="mb-0 text-muted">Manage customer reviews for PRC Sewa Mobil</p>
        </div>
    </div>
</div>

{{-- Success Message --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Table Section --}}
<div class="card border-0 shadow-lg mb-4">
    <div class="card-body bg-gradient-dark rounded">
        <div class="table-responsive">
            <table class="table table-hover table-striped text-center" style="border-spacing: 0 10px;">
                <thead class="table-header">
                    <tr>
                        <th class="py-3">No</th>
                        <th class="py-3">Code</th>
                        <th class="py-3">Rating</th>
                        <th class="py-3">Car</th>
                        <th class="py-3">Comment</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $item)
                        <tr class="table-row">
                            <td>{{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->transaction->code }}</td>
                            <td>{{ $item->rate }}</td>
                            <td>{{ $item->transaction->car->name }}</td>
                            <td>{{ Str::limit($item->comment, 50) }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('panel.review.show', $item->uuid) }}" class="btn btn-sm btn-icon btn-view">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if (auth()->user()->role === 'operator')
                                        <button class="btn btn-sm btn-icon btn-delete" onclick="deleteReview(this)" data-uuid="{{ $item->uuid }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-end">
            {{ $reviews->links() }}
        </div>
    </div>
</div>
@endsection

{{-- Additional Scripts --}}
@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const deleteReview = (e) => {
        let uuid = e.getAttribute('data-uuid');
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
                    url: `/panel/review/${uuid}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        Swal.fire("Deleted!", data.message, "success").then(() => window.location.reload());
                    },
                    error: function() {
                        Swal.fire("Failed!", "Unable to delete data.", "error");
                    }
                });
            }
        });
    }
</script>
@endpush
