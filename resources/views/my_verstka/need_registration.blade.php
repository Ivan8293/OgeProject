@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/trajectory_style.css">
@endsection

@section("main_content")
    <div>
        Чтобы получить доступ к учебным материалам, Вам необходимо войти или зарегистрироваться
    </div>
    <a href="{{ route('login_student') }}">
        <div>
            Войти
        </div>
    </a>
@endsection