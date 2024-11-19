<?php
namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Services\CarService;
use Illuminate\Http\Request;


class MainController extends Controller
{

    public function __construct(
        private CarService $carService
    ) {}

    public function index()
    {
        return view('frontend.index',[
            'cars' => $this->carService->select()
        ]);
    }

    public function car()
    {
        return view('frontend.car',[
            'cars' => $this->carService->select()
        ]);
    }

    public function about()
    {
        return view('frontend.about',[
            'cars' => $this->carService->select()
        ]);
    }

    public function service()
    {
        return view('frontend.service',[
            'cars' => $this->carService->select()
        ]);
    }

    public function blog()
    {
        return view('frontend.blog',[
            'cars' => $this->carService->select()
        ]);
    }

    public function contact()
    {
        return view('frontend.contact',[
            'cars' => $this->carService->select()
        ]);
    }

    public function feature()
    {
        return view('frontend.feature',[
            'cars' => $this->carService->select()
        ]);
    }

    public function testimonial()
    {
        return view('frontend.testimonial',[
            'cars' => $this->carService->select()
        ]);
    }


}
