<?php

namespace App\Http\Controllers;

use App\Models\SiteStat;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $stats = SiteStat::orderByRaw("FIELD(`key`, 'students', 'hours', 'workshops')")->get();
        $testimonials = Testimonial::orderBy('order')->get();

        return view('home', compact('stats', 'testimonials'));
    }
}
