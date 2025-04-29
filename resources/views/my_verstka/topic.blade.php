<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/new_styles/topic_style.css">
    <title>topic</title>
</head>
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
                    <iframe width="900" height="504" src="{{ $topic->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <a id="add_class_button" href="{{ route('tasks', ['topic_id' => $topic->topic_id]) }}">
                        <div class="add_button" >
                            <div class="add_button_text">ПРАКТИЧЕСКИЕ ЗАДАНИЯ</div>                    
                        </div>
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