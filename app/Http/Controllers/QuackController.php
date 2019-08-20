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
        $duck = Auth::user();
        $quacks = Quack::with('duck')->get();
        return view('quacks.index', ['quacks' => $quacks, 'duck' => $duck]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function create(Quack $quack)
    {
        $duck = Auth::user();
        $quacks = Quack::with('duck')->where('parent_id', $quack->id)->get();
        return view('quacks.reply', ['quack' => $quack, 'quacks' => $quacks, 'duck' => $duck]);
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
            'image' => 'nullable|image',
            'tags' => 'nullable|string',
            'duck_id' => [
                Rule::exists($quack->getTable(), $quack->getKeyName()),
            ],
            'parent_id' => [
                Rule::exists($quack->getTable(), $quack->getKeyName()),
            ]
        ]);
        //dd($request);
        $quack->content = $request->input('content');
        $quack->image = $request->input('image');
        $quack->tags = $request->input('tags');
        $quack->parent_id = $request->input('reply_id');
        $quack->duck_id = $duck->id;
        $quack->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function show(Quack $quack)
    {
        $quacks = Quack::with('duck')->where('parent_id', $quack->id)->get();
        return view('quacks.show', ['quack' => $quack, 'quacks' => $quacks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function edit(Quack $quack)
    {
        $quacks = Quack::with('duck')->where('parent_id', $quack->id)->get();
        return view('quacks.edit', ['quack' => $quack, 'quacks' => $quacks]);
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
        $this->validate($request, [
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
        $quack->delete();
        return redirect()->route('home')->with('success', 'Quack deleted.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function reply_store(Request $request, Quack $quack)
    {
        $duck = Auth::user();
        $qck = new Quack;
        //dd($request);
        $this->validate($request, [
            'content' => 'required',
            'image' => 'nullable|image',
            'tags' => 'nullable|string',
            'duck_id' => [
                Rule::exists($qck->getTable(), $qck->getKeyName()),
            ],
            'parent_id' => [
                Rule::exists($qck->getTable(), $qck->getKeyName()),
            ]
        ]);
        //dd($request);
        $qck->content = $request->input('content');
        $qck->image = $request->input('image');
        $qck->tags = $request->input('tags');
        $qck->parent_id = $request->input('reply_id');
        $qck->duck_id = $duck->id;
        $qck->save();

        $quacks = Quack::with('duck', 'replies')->where('parent_id', $quack->id)->orderByDesc('id')->get();
        return view('quacks.reply', ['duck' => $duck, 'quack' => $quack, 'quacks' => $quacks]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function reply_destroy(Quack $quack)
    {
        $quack->delete();
        return back()->with('success', 'Quack deleted.');
    }

}
