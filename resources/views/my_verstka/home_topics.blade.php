@extends("my_verstka.home")

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Учебные темы
        </h2>
        <!-- <div class="add_button_wrapper">
            <a id="add_class_button" href="">
                <div class="add_button" >
                    <div class="add_button_text">СОЗДАТЬ КЛАСС</div>
                    
                </div>
            </a>
        </div> -->
    </div>
    
    <div class="list_of_items">
        
        @isset($topics)
            @foreach ($topics as $topic)
                <div class="list_item">
                    <div class="list_item_text">
                        <p>{{ $topic->name }}</p>                            
                    </div>
                    <div class="list_item_button_wrapper">
                        <div class="list_item_button">
                            <div class="list_item_button_text">
                                <a id="add_class_button" href="{{ route('open_topic', ['topic_id' => $topic->topic_id]) }}" >ОТКРЫТЬ</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
        
    </div>
</div>
@endsection