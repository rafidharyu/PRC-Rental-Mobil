<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\BookingMailPending;
use App\Http\Services\FileService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function store(BookingRequest $request)
{
    $data = $request->validated();
    $fileService = new FileService();

    try {
        // Handle file upload
        if ($request->hasFile('file')) {
            $data['file'] = $fileService->upload($data['file'], 'transaction');
        } else {
            $data['file'] = null; // Pastikan null ditulis ke database
        }

        // Ambil data mobil
        $car = Car::findOrFail($data['car_id']);
        $start = new \DateTime($data['pick_date']);
        $end = new \DateTime($data['drop_date']);

        // Hitung durasi sewa
        $duration = $start->diff($end)->days + 1; // Tambahkan 1 hari agar inklusif

        // Hitung total harga sewa
        $totalPrice = $car->price_day * $duration;

        // Tambahkan biaya sopir jika opsi "Dengan Sopir" dipilih
        if (isset($data['drive_option']) && $data['drive_option'] === 'dikemudikan_oleh_sopir') {
            $driverFeePerDay = 200000; // Biaya sopir per hari
            $totalPrice += $driverFeePerDay * $duration;
        }

        $data['duration'] = $duration; // Simpan durasi ke dalam data
        $data['down_payment'] = $totalPrice * 0.5;
        $data['price_total'] = $totalPrice;

        // Kirim email
        Mail::to('owner@gmail.com')
            ->cc('operator@gmail.com')
            ->queue(new BookingMailPending($data)); //php artisan queue:work

        // Simpan transaksi
        Transaction::create($data);

        return redirect()->back()->with('success', 'Booking has been sent');
    } catch (\Exception $err) {
        // Hapus file jika ada error
        if (isset($data['file'])) {
            $fileService->delete($data['file']);
        }

        return redirect()->back()->with('error', $err->getMessage());
    }
}

}
