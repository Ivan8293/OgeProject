

@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/topic_style.css">
@endsection

@section("main_content")
<body>
    @isset($topic)
        <header class="topic_header ">
            <div class="header_left ">
                <div class="header_left_top ">
                    <h2 class="second_h">
                        {{ $topic->name }}
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    {{ $topic->description }}
                </div>
            </div>
            <div class="header_right ">
                <!-- <a id="add_class_button" href="">
                    <div class="add_button" >
                        <div class="add_button_text"><span class="krest">&times;</span> ЗАКРЫТЬ ТЕСТ</div>                    
                    </div>
                </a> -->
            </div>
        </header>
        <main class="topic_main">
            <div class="main_wrapper">
                <div class="main_left_video">
                    <iframe src="{{ $topic->video }}" width="900" height="504" allow="autoplay; encrypted-media; fullscreen; picture-in-picture; screen-wake-lock;" frameborder="0" allowfullscreen></iframe>
                    <a id="add_class_button" href="{{ route('tasks', ['topic_id' => $topic->topic_id]) }}" class="add_button">
                    <i class="fas fa-pen"></i>
                        <span class="add_button_text">ПРАКТИЧЕСКИЕ ЗАДАНИЯ</span>
                    </a>
                </div>
                <div class="main_right_thesises ">
                    @isset($thesises)
                        @foreach($thesises as $thises)
                            <div class="thesis ">
                                <h3 class="thesis_name">
                                    {{ $thises->name }}
                                </h3>
                                <p class="thesis_descr">
                                    {{ $thises->description }}
                                </p>
                            </div>
                        @endforeach
                    @endisset


                    
                </div>
            </div>        
        </main>
    @endisset
</body>
</html>