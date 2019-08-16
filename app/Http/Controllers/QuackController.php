<?php

namespace App\Http\Controllers;

use App\Quack;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quacks = Quack::with('duck')->get();
        return view('quacks.index', ['quacks' => $quacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duck = Auth::user();
        $quack = new Quack;
        //dd($request);
        $this->validate($request, [
            'content' => 'required',
            'image' => 'image|nullable',
            'tags' => 'nullable|string',
            'duck_id' => [
                Rule::exists($quack->getTable(), $quack->getKeyName()),
            ]
        ]);
        //dd($request);
        $quack->content = $request->input('content');
        $quack->image = $request->input('image');
        $quack->tags = $request->input('tags');
        $quack->duck_id = $duck->id;
        $quack->save();

        return view('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function show(Quack $quack)
    {
        return view('quacks.show', ['quack' => $quack]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function edit(Quack $quack)
    {
        return view('quacks.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quack $quack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quack $quack)
    {
        //
    }

}
