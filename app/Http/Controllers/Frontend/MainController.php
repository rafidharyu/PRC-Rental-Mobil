<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\CarService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function __construct(
        private CarService $carService
    ) {}

    public function index()
    {
        return view('frontend.index',[
            'cars' => $this->carService->select(10)
        ]);
    }

    public function car()
    {
        return view('frontend.car',[
            'cars' => $this->carService->select(10)
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function service()
    {
        return view('frontend.service');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function feature()
    {
        return view('frontend.feature');
    }

    public function testimonial()
    {
        return view('frontend.testimonial');
    }

}
