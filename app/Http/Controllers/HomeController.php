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
        $this->middleware('auth')->only('index');
        $this->middleware('guest')->only('welcome');
        $this->middleware('admin')->only('admin');
    }

    /**
     * Show the application homepage if not connected.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $duck = Auth::user();
        $quacks = Quack::with('duck', 'parent')->withCount('children')->where('parent_id', null)->latest()->get();
        return view('home', ['duck' => $duck, 'quacks' => $quacks]);
    }

    /**
     * Show the application admin page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('admin');
    }

}
