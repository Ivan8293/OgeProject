@extends("parent")
@section("content")
    <div class="h1_personal_page">
        <h1>Личный кабинет</h1>
    </div>    
    <div class="personal_data_wrapper">
        <div>
            <h2>Информация о пользователе</h2>
            <p>Email - {{$user_data->email}}</p>
            @if ($user_data->name != null)
                <p>Имя - {{$user_data->name}}</p>            
            @else
                <p>Имя - отсутсвует</p>
            @endif
            <a href="{{route('change_name_form')}}">Изменить имя</a>
            <p><a href="">Изменить пароль</a></p>
        </div>
        <div>
            <h2>Отслеживание результатов</h2>
            <p><a href="{{route('statistics')}}">Просмотреть статистику</a></p>
        </div>
        <div>
            <h2>Информация о подписке</h2>
            <!-- <p>Здесь будет выводится инфа о подписке</p>
            <p><a href="">И будет вот эта кнопка, если у вас нет подписки, вы сможете купить нажав на неё</a></p>    -->
            <button class="buy_button">Купить подписку</button>
        </div>
    </div>

    
@endsection