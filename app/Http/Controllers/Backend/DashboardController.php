<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $totalAmount = Transaction::where('status', 'success')->sum('price_total');
        // Ambil total transaksi
        // Ambil total transaksi perhari
        $today = Transaction::whereDate('created_at', Carbon::today())->where('status', 'success')->sum('price_total');
        $totalTransactions = Transaction::count();
        // Hitung jumlah transaksi berdasarkan status
        $pendingTransactions = Transaction::where('status', 'pending')->count();
        $failedTransactions = Transaction::where('status', 'failed')->count();
        $successTransactions = Transaction::where('status', 'success')->count();

        // Ambil 5 transaksi terbaru
        $latestTransactions = Transaction::orderBy('created_at', 'desc')->take(5)->get();

        // Kirim data ke view
        return view('backend.dashboard.index', [
            'totalAmount' => $totalAmount,
            'today' => $today,
            'totalTransactions' => $totalTransactions,
            'pendingTransactions' => $pendingTransactions,
            'failedTransactions' => $failedTransactions,
            'successTransactions' => $successTransactions,
            'latestTransactions' => $latestTransactions
        ]);
    }
}
