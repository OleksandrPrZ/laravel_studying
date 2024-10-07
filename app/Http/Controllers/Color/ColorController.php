<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();

        return view('color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);

        return redirect()->route('color.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $color = Color::find($id);

        return view('color.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = Color::find($id);

        return view('color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $color = Color::query()->findOrFail($id);
        $color->update($data);

        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Color::query()->findOrFail($id)->delete();

        return redirect()->route('color.index');
    }
}