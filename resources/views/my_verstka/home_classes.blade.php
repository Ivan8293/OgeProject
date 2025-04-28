@extends("my_verstka.home")

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            КЛАССЫ
        </h2>
        <div class="add_button_wrapper">
            <a id="add_class_button" href="{{ route('add_class') }}">
                <div class="add_button" >
                    <div class="add_button_text">СОЗДАТЬ КЛАСС</div>
                    
                </div>
            </a>
        </div>
    </div>
    
    <div class="list_of_items">   
        
        @isset($classes)
            @foreach ($classes as $class)
                <div class="list_item">
                    <div class="list_item_text">
                        <p>{{ $class->name }}</p>                            
                    </div>
                    <div class="list_item_button_wrapper">
                        <div class="list_item_button">
                            <div class="list_item_button_text">
                                <a id="add_class_button" href="{{ route('edit_class', ['id' => $class->class_id]) }}" >ОТКРЫТЬ</a>
                            </div>
                        </div>                            
                    </div>
                </div>
            @endforeach
        @endisset   

        
    </div>
</div>
@endsection