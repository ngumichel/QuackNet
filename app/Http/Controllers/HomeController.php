<?php

namespace App\Http\Controllers;

use App\Quack;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $duck = Auth::user();
        $quacks = Quack::with('duck', 'replies')->where('parent_id', null)->orderByDesc('id')->get();
        return view('home', ['duck' => $duck, 'quacks' => $quacks]);
    }
}
