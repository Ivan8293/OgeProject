<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Topic;
use App\Models\TopicSection;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($section_id, $page="trajectory")
    {
        //$topics = Topic::with('taskOge')->where('type', 'Учебная тема')->get();

        $topics_tmp = TopicSection::where('id_section', $section_id)->pluck('id_topic');
        $topics = Topic::whereIn('topic_id', $topics_tmp)->get();
        $section = Section::where("section_id", $section_id)->first();
        

        return view('my_verstka.trajectory_topics', ['page' => $page, 'topics' => $topics, 'section' => $section]);
        
        // if ($page && $topics)
        // {
        //     return view('my_verstka.trajectory_topics', ['page' => $page, 'topics' => $topics]);
        // }
        // else if ($topics && !$page)
        // {
        //     return view('my_verstka.trajectory_topics', ['topics' => $topics]);
        // }
        // else
        // {
        //     return view('my_verstka.trajectory_topics');
        // }
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

        Section::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(Section $section)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(Section $section)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $section->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('posts.index');
    }
}