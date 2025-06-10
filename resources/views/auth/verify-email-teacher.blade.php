<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Подтверждение Email — Преподаватель</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .container {
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #1e40af;
            font-weight: 800;
            font-size: 1.875rem; /* 30px */
            margin-bottom: 1.5rem;
        }
        p {
            color: #374151;
            margin-bottom: 2rem;
            line-height: 1.5;
        }
        .message {
            margin-bottom: 1.5rem;
            padding: 0.75rem;
            background: #dcfce7;
            color: #166534;
            border-radius: 0.375rem;
            border: 1px solid #bbf7d0;
        }
        button {
            width: 100%;
            background-color: #2563eb;
            color: white;
            font-weight: 600;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.5);
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        button:focus {
            outline: 2px solid #93c5fd;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Подтвердите ваш Email</h1>
        <p>
            Спасибо за регистрацию, <strong>{{ auth('teacher')->user()->name ?? 'Преподаватель' }}</strong>!<br />
            Пожалуйста, проверьте вашу почту и перейдите по ссылке для подтверждения email.
        </p>

        @if (session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('teacher.verification.send') }}">
            @csrf
            <button type="submit">Отправить письмо с подтверждением</button>
        </form>
    </div>
</body>
</html>
