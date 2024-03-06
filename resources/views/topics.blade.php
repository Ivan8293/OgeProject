@extends("parent")
@section("content")
    <div class="topics-h">
        <h1>Темы</h1>
        <span>(пока что доступна только 9 тема)</span>
    </div>
    <div class="topics_wrapper">        
        @foreach($topics_data as $topic)
            <div class="topic_wrapper">
                <p>{{$topic->name}}</p>
                <ul class="sub-topic-ul">
                    @foreach($sub_topics_data as $sub_topic)                        
                        @if ($topic->id == $sub_topic->topic_id)
                            <p><a href="{{route('getTopic', ['id' => $sub_topic->id])}}">{{$sub_topic->name}}</a></p>
                        @endif                        
                    @endforeach
                </ul>
            </div>           
        @endforeach
    </div>
@endsection