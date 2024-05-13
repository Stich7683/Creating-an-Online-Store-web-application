
@extends('class')
@section('main_content')

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация - CompMaster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Градиентный фон */
        .bg-dark-gradient {
            background: linear-gradient(to right, #2c3e50, #3498db);
        }

        /* Улучшение визуальных эффектов для карточек */
        .card {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }

        /* Настройки фона для формы */
        .card {
            background: linear-gradient(to right, #2c3e50, #3498db); /* Градиентный фон, как на странице */
            color: white; /* Белый текст */
        }

        /* Настройка цвета полей ввода */
        .form-control {
            background: rgba(255, 255, 255, 0.1); /* Прозрачный белый фон */
            border: none; /* Без границы */
            color: white; /* Белый текст */
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2); /* При фокусе фон становится светлее */
            border-color: #ffffff; /* Белая граница */
        }

        .btn-primary {
            background: #3498db; /* Цвет кнопки соответствует странице */
            border: none; /* Убираем границу */
        }

        .btn-primary:hover {
            background: #2980b9; /* Темнее при наведении */
        }

    </style>
</head>

<body class="bg-dark-gradient"> <!-- Градиентный фон -->

<!-- Форма регистрации -->
<div class="container mt-5"> <!-- Центрирование -->
    <div class="row justify-content-center"> <!-- Выравнивание -->
        <div class="col-md-6"> <!-- Карточка для формы -->
            <div class="card"> <!-- Карточка с градиентным фоном -->
                <div class="card-header">Регистрация</div> <!-- Заголовок карточки -->
                <div class="card-body"> <!-- Тело карточки -->
                    <!-- Форма регистрации -->
                    <form action="/register" method="POST" autocomplete="off"> <!-- Отключение автозаполнения -->
                        @csrf <!-- Laravel CSRF-токен -->

                        <!-- Поле имени пользователя -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Имя пользователя</label>
                            <input type="text" class="form-control" name="username" id="username" autocomplete="new-login">
                        </div>

                        <!-- Поле электронной почты -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Электронная почта</label>
                            <input type="email" class="form-control" name="email" id="email" autocomplete="new-email">
                        </div>

                        <!-- Поле пароля -->
                        <div class ="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                        </div>

                        <!-- Подтверждение пароля -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                            <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <!-- Кнопка регистрации -->
                        <button type="submit" class="btn btn-outline-light">Зарегистрироваться</button>
                    </form>
                </div> <!-- Конец тела карточки -->
            </div> <!-- Конец карточки -->
        </div> <!-- Конец колонки -->
    </div> <!-- Конец строки -->
</div> <!-- Конец контейнера -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection()
