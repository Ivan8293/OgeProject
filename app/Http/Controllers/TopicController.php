<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Thesis;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($topic_id)
    {
        $topic = Topic::where('topic_id', $topic_id)->first();
        $thesises = Thesis::where('id_topic', $topic->topic_id)->get();

        if ($topic_id && $thesises)
        {
            return view('my_verstka.topic', ['topic' => $topic, 'thesises' => $thesises]);
        }
        else
        {
            return view('my_verstka.topic');
        }            
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

        Topic::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(Topic $topiс)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(Topic $topiс)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, Topic $topiс)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $topiс->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(Topic $topiс)
    {
        $topiс->delete();
        return redirect()->route('posts.index');
    }
}
