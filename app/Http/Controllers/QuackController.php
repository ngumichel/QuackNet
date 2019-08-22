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
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quack = new Quack;
        //dd($request);
        $request->validate([
            'content' => 'required',
            'image' => 'nullable|image',
            'tags' => 'nullable|string',
            'duck_id' => [
                Rule::exists($quack->getTable(), $quack->getKeyName()),
            ],
            'reply_id' => [
                Rule::exists($quack->getTable(), $quack->getKeyName()),
            ]
        ]);

        $duck = Auth::user();

        $quack->content = $request->input('content');
        $quack->image = $request->input('image');
        $quack->tags = $request->input('tags');
        $quack->parent_id = $request->input('reply_id');
        $quack->duck_id = $duck->id;
        $quack->save();

        return back()->with('success', 'Quack created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function show(Quack $quack)
    {
        $duck = Auth::user();
        $quack->load('duck', 'children.parent', 'children.duck');
        return view('quacks.show', ['quack' => $quack, 'duck' => $duck]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function edit(Quack $quack)
    {
        $quack->load('duck', 'children.duck');
        return view('quacks.edit', ['quack' => $quack,]);
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
        $request->validate([
            'content' => 'required',
            'image' => 'nullable|image',
            'tags' => 'nullable|string',
        ]);

        $quack->content = $request->input('content');
        $quack->image = $request->input('image');
        $quack->tags = $request->input('tags');
        $quack->save();

        return redirect()->route('quacks.show', ['quack' => $quack])->with('success', 'Quack edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Quack $quack)
    {
        $quack->children()->delete();
        $quack->delete();
        if ($quack->parent_id == null) {
            return redirect()->route('home')->with('success', 'Quack deleted.');
        } else {
            return back()->with('success', 'Quack deleted.');
        }
    }

}
