@extends("my_verstka.home")

@section("child_link")
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <style>
        .wrapper {
            height: 100vh;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            text-align: center;
        }
        .message {
            font-size: 1.25rem;
            color: #374151;
            margin-bottom: 2rem;
            max-width: 400px;
        }
        .btn-link {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.5);
            transition: background-color 0.3s ease;
            font-size: 1rem;
            cursor: pointer;
        }
        .btn-link:hover {
            background-color: #1d4ed8;
        }
        .btn-link:focus {
            outline: 2px solid #93c5fd;
            outline-offset: 2px;
        }
    </style>
@endsection

@section("main_content")
    <div class="wrapper">
        <div class="message">
            Чтобы получить доступ к учебным материалам, Вам необходимо войти или зарегистрироваться
        </div>
        <a href="{{ route('login_student') }}" class="btn-link" role="button" tabindex="0">
            Войти
        </a>
    </div>
@endsection
