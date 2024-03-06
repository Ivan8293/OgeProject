@extends("parent")
@section("content")
<main>
    <div class="topic_main_wrapper">
        <h1 class="topic_name">{{$sub_topic->name}}</h1>
        <p>{{$sub_topic->description}}</p>
        <div class="theory_video">
            <iframe  style="border-radius: 10px;" width="896" height="504" src="{{$sub_topic->youtube_link_theory}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <a class="big-button-a" href="{{route('getTasks', ['sub_topic_id' => $sub_topic->id])}}">
            <button class="big_button">Перейти к практике</button>
        </a>
    </div>
</main>
@endsection








