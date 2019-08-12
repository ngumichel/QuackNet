<?php

namespace App\Http\Controllers;

use App\Duck;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Duck  $duck
     * @return \Illuminate\Http\Response
     */
    public function show(Duck $duck)
    {
        //dd($duck);
        return view('ducks.show', compact('duck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Duck  $duck
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $duck = Auth::user();
        return view('ducks.edit', compact('duck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Duck  $duck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $duck = Auth::user();
        /*$validated = $request->validate([
            'firstname' => 'require|max:255',
            'lastname' => 'require|max:255',
            'email' => 'require|email',
        ]);*/

        $duck->firstname = $request->firstname;
        //$duck->

        $duck->update();

        return view('ducks.profile', compact('duck'));    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Duck  $duck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duck $duck)
    {

    }

    public function profile() {
        $duck = Auth::user();
        return view('ducks.profile', compact('duck'));
    }
}
