<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
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
    return view('frontend.index', compact('cars'));
}


    public function getCars()
{
    $cars = Car::latest()
        ->where('status', 'available') // Mengambil hanya mobil yang berstatus 'available'
        ->get(['uuid', 'name', 'price_day', 'seat', 'fuel', 'transmisi', 'year_of_car', 'image']); // Kolom yang diambil

    return $cars;
}

}
