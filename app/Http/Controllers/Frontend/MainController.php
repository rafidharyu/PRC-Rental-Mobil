<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Ambil data dari backend jika diperlukan
        return view('frontend.index');
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
        // Ambil data blog dari backend jika diperlukan
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

    public function car()
    {
        // Ambil data mobil dari backend jika diperlukan
        return view('frontend.car');
    }

    public function testimonial()
    {
        // Ambil data testimoni dari backend jika diperlukan
        return view('frontend.testimonial');
    }
}
