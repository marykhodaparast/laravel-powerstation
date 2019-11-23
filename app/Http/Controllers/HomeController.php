<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\News;
use App\Slider;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(env('MAIL_HOST'));
        //dd(config('app.mail_host'));
        $sliders = Slider::all();
        $products = Product::latest()->take(6)->get();
        //$news = News::latest()->take(6)->get();
        $news = News::where('published_at', '<=', Carbon::now())
            ->where('published', true)->get();
        return view('FrontEnd.welcome')->with([
            'sliders' => $sliders,
            'products' => $products,
            'news' => $news
        ]);
    }
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function about_us()
    {
        return view('FrontEnd.about_us');
    }
}
