@extends('backend.template.main')

@section('title', 'Transaction: ' . $transaction->code)

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
                    <a href="{{ route('panel.transaction.index') }}" class="breadcrumb-link text-gold">Transaction</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $transaction->code }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
            <div>
                <h1 class="h4 text-dark font-weight-bold">Transaction Details: {{ $transaction->name }}</h1>
                <p class="mb-0 text-muted">Transaction Code: {{ $transaction->code }}</p>
            </div>
            <div>
                <a href="{{ route('panel.transaction.index') }}" class="btn btn-gradient">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow mb-4">
            <table class="table table-bordered align-middle">
                <thead class="table-header">
                    <tr>
                        <th>Kolom</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td>Name</td>
                        <td>{{ $transaction->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Phone</td>
                        <td>{{ $transaction->phone }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Email</td>
                        <td>{{ $transaction->email }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Car</td>
                        <td>{{ $transaction->car->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Pick-up Date</td>
                        <td>{{ date('d-m-Y', strtotime($transaction->pick_date)) }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Pick-up Time</td>
                        <td>{{ $transaction->pick_time }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Return Date</td>
                        <td>{{ date('d-m-Y', strtotime($transaction->drop_date)) }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Return Time</td>
                        <td>{{ $transaction->drop_time }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Pick-up Location</td>
                        <td>{{ $transaction->pick_option }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Return Location</td>
                        <td>{{ $transaction->drop_option }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Total Price</td>
                        <td>Rp. {{ number_format($transaction->price_total, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Message</td>
                        <td>{{ $transaction->message }}</td>
                    </tr>
                    <tr class="table-row">
                        <td>Status</td>
                        <td>
                            @if ($transaction->status == 'pending')
                                <span class="badge status-pending">Pending</span>
                            @elseif ($transaction->status == 'failed')
                                <span class="badge status-failed">Failed</span>
                            @else
                                <span class="badge status-success">Success</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td>File</td>
                        <td>
                            <img src="{{ asset('storage/' . $transaction->file) }}" class="img-fluid" width="20%"
                                target="_blank">
                        </td>
                    </tr>

                    @isset($review)
                        <tr class="table-row">
                            <td>Rating</td>
                            <td>{{ $review->rate }}</td>
                        </tr>
                        <tr class="table-row">
                            <td>Comment</td>
                            <td>{{ $review->comment }}</td>
                        </tr>
                    @endisset
                </tbody>
            </table>
        </div>
        <!-- Action Button (Operator Role) -->
        {{-- @if (auth()->user()->role === 'operator')
            <div class="float-end mt-2">
             <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Confirm</a>
            </div>
            @endif --}}
    </div>
@endsection
