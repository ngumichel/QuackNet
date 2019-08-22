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
           'q' => 'required|string'
        ]);

        $keyword = $request->input('q');

        $duck = Auth::user();
        $quacks = DB::select("SELECT * FROM quacks JOIN ducks ON quacks.duck_id = ducks.id WHERE duckname LIKE '%$keyword%' AND deleted_at IS NULL");
        return view('quacks.search', ['quacks' => $quacks, 'duck' => $duck]);
    }
}
