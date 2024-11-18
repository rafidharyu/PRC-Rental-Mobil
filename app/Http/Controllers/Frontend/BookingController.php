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
            $data['file'] = $fileService->upload($data['file'], 'transaction');

            $car = Car::findOrFail($data['car_id']);
            $start = new \DateTime($data['pick_date']);
            $end = new \DateTime($data['drop_date']);
            $data['price_total'] = $car->price_day * $start->diff($end)->days;

            // send email
            Mail::to('owner@gmail.com')
                ->cc('operator@gmail.com')
                // ->send(new BookingMailPending($data));
                ->queue(new BookingMailPending($data)); //php artisan queue:work

            Transaction::create($data);

            return redirect()->back()->with('success', 'Booking has been sent');
        } catch (\Exception $err) {
            if (isset($data['file'])) {
                $fileService->delete($data['file']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }
}
