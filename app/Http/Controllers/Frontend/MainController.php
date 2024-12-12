<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Event;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Services\CarService;
use App\Http\Controllers\Controller;


class MainController extends Controller
{

    public function __construct(
        private CarService $carService
    ) {}

    public function index()
    {
        $events = Event::where('status', 'active')->orderByDesc('created_at')->get();
        $reviews = Review::with('transaction')->latest()->get();
        $transactions = Transaction::all();
        $cars = Car::all();

        return view('frontend.index', [
            'cars' => $this->carService->select(),
            'reviews' => $reviews,
            'events' => $events,
            'reviewsCount' => $reviews->count(),
            'carsCount' => $cars->count(),
            'transactionsCount' => $transactions->count(),
            'eventsCount' => $events->count(),
        ]);
    }


    public function car()
    {
        return view('frontend.car', [
            'cars' => $this->carService->select()
        ]);
    }

    public function about()
    {
        return view('frontend.about', [
            'cars' => $this->carService->select()
        ]);
    }

    public function service()
    {
        $reviews = Review::with('transaction')->latest()->get();
        return view('frontend.service', [
            'cars' => $this->carService->select(),
            'reviews' => $reviews
        ]);
    }

    public function blog()
    {
        return view('frontend.blog', [
            'cars' => $this->carService->select()
        ]);
    }

    public function contact()
    {
        return view('frontend.contact', [
            'cars' => $this->carService->select()
        ]);
    }

    public function feature()
    {
        return view('frontend.feature', [
            'cars' => $this->carService->select()
        ]);
    }

    public function testimonial()
    {
        $reviews = Review::with('transaction')->latest()->get();
        return view('frontend.testimonial', [
            'cars' => $this->carService->select(),
            'reviews' => $reviews
        ]);
    }
}
