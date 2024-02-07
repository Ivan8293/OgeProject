@extends("parent")
@section("content")
    <h1>Cтатистика</h1>
    <div class="stat_wrapper">
        <input type="hidden" id="sub_topics_count" value="{{$sub_topic_count}}">
        <div class="all_stat_wrapper">
            @foreach($stat_data as $stat)
                <div class="one_stat_wrapper">
                    <p class="stat_block_name">{{$stat->name}}</p>
                    <div class="stat_color_block_wrapper">
                        <div class="stat_block" id="stat_block{{$stat->sub_topic_id}}">
                            <p class="procent_value"></p>
                        </div>
                    </div>
                    <input type="hidden" class="right_answer" id="right_answ{{$stat->sub_topic_id}}" value="{{$stat->right_answer_count}}">
                    <input type="hidden" class="answer" id="answ{{$stat->sub_topic_id}}" value="{{$stat->answer_count}}">
                    
                </div>
            @endforeach
        </div>
    </div>

    <script src="/js/statistic_render.js"></script>
@endsection

