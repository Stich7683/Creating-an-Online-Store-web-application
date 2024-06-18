@extends('class')
@section('main_content')

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход - CompMaster</title>
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
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: white;
        }
        /* Настройка цвета полей ввода */
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #ffffff;
        }
        .btn-primary {
            background: #3498db;
            border: none;
        }
        .btn-primary:hover {
            background: #2980b9;
        }
    </style>
</head>
<body class="bg-dark-gradient">
<!-- Градиентный фон -->
<div class="container mt-5">
    <!-- Центрирование -->
    <div class="row justify-content-center">
        <!-- Выравнивание -->
        <div class="col-md-6">
            <!-- Карточка для формы -->
            <div class="card">
                <!-- Карточка с градиентным фоном -->
                <div class="card-header">Вход</div>
                <!-- Заголовок карточки -->
                <div class="card-body">
                    <!-- Тело карточки -->
                    <!-- Форма регистрации -->
                    <form action="" method="GET" autocomplete="off">
                        <!-- Отключение автозаполнения -->
                        @csrf
                        <!-- Laravel CSRF-токен -->
                        <!-- Поле электронной почты -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Электронная почта</label>
                            <input type="email" class="form-control" name="email" id="email" autocomplete="new-email">
                        </div>
                        <!-- Поле пароля -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                        </div>
                        <!-- Кнопка входа -->
                        <button type="submit" class="btn btn-outline-light mt-3">Войти</button>
                        <a class="nav-link" href="/login">Зарегистрироваться</a>
                    </form>
                    <?php
                    session_start();
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "computer";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET['email']) && isset($_GET['password'])) {
                            $email = $_GET['email'];
                            $password = $_GET['password'];

                            $sql = "SELECT * FROM signin WHERE email='$email' AND password='$password'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $idUser = $row['idUser'];
                                $isAdmin = $row['admin'];

                                // Создаем токен с учетом id пользователя
                                $tokenPrefix = $isAdmin ? 'admin_' : 'user_';
                                $tokenSuffix = bin2hex(random_bytes(16));
                                $token = $tokenPrefix . $idUser . '_' . $tokenSuffix;

                                // Сохраняем токен в localStorage
                                echo "<script>localStorage.setItem('token', '$token');</script>";

                                // Сохраняем токен в сессию
                                $_SESSION['token'] = $token;

                                // Перенаправляем пользователя на страницу "О нас"
                                echo "<script>window.location.href = '/about';</script>";
                                exit();
                            } else {
                                echo "Неверная электронная почта или пароль.";
                            }
                        } else {
                            echo "Данные электронной почты и/или пароля не были отправлены.";
                        }
                    }
                    $conn->close();
                    ?>
                </div>
                <!-- Конец тела карточки -->
            </div>
            <!-- Конец карточки -->
        </div>
        <!-- Конец колонки -->
    </div>
    <!-- Конец строки -->
</div>
<!-- Конец контейнера -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
