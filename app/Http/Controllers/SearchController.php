<?php

namespace App\Http\Controllers;
use App\Duck;
use App\Quack;

use Auth;
use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {

        $this->validate($request, [
           'search' => 'required|string'
        ]);

        $keyword = $request->input('search');

        $duck = Auth::user();

        $qcks = DB::select("SELECT * FROM quacks JOIN ducks ON quacks.duck_id = ducks.id WHERE duckname LIKE '%$keyword%'");
        $quacks = Quack::hydrate($qcks);
        //dd($quacks);
        return view('search', ['quacks' => $quacks, 'duck' => $duck]);
    }
}
