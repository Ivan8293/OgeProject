<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thesis = Thesis::all();
        // return view('posts.index', compact('posts'));
    }

    // Отображение формы создания поста
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Thesis::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(Thesis $thesis)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(Thesis $thesis)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, Thesis $thesis)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $thesis->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(Thesis $thesis)
    {
        $thesis->delete();
        return redirect()->route('posts.index');
    }
}
