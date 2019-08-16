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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $duck = Auth::user();
        $quacks = Quack::with('duck', 'replies')->orderByDesc('id')->get();
        return view('home', ['duck' => $duck, 'quacks' => $quacks]);
    }
}
