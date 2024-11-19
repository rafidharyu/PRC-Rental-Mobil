<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    // public function index()
    // {
    //     // Ambil data dari backend jika diperlukan
    //     return view('frontend.index');
    // }

    public function index()
{
    $cars = Car::where('status', 'available')->get();
    $events = Event::orderByDesc('created_at')->get();
    return view('frontend.index', compact('cars', 'events'));
}

public function about()
{
    $cars = Car::where('status', 'available')->get();
    return view('frontend.about', compact('cars'));
}

public function service()
{
    $cars = Car::where('status', 'available')->get();
    return view('frontend.service', compact('cars'));
}

public function blog()
{
    $cars = Car::where('status', 'available')->get();
    // Ambil data blog dari backend jika diperlukan
    return view('frontend.blog', compact('cars'));
}

public function contact()
{
    $cars = Car::where('status', 'available')->get();
    return view('frontend.contact', compact('cars'));
}

public function feature()
{
    $cars = Car::where('status', 'available')->get();
    return view('frontend.feature', compact('cars'));
}

public function car()
{
    $cars = Car::where('status', 'available')->get();
    // Ambil data mobil dari backend jika diperlukan
    return view('frontend.car', compact('cars'));
}

public function testimonial()
{
    $cars = Car::where('status', 'available')->get();
    // Ambil data testimoni dari backend jika diperlukan
    return view('frontend.testimonial', compact('cars'));
}


    public function getCars()
{
    $cars = Car::latest()
        ->where('status', 'available') // Mengambil hanya mobil yang berstatus 'available'
        ->get(['uuid', 'name', 'price_day', 'seat', 'fuel', 'transmisi', 'year_of_car', 'image']); // Kolom yang diambil

    return $cars;
}

}
