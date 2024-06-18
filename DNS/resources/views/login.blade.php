@extends('class')
@section('main_content')

    <!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
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

<!-- Форма регистрации -->
<div class="container mt-5">
    <!-- Центрирование -->
    <div class="row justify-content-center">
        <!-- Выравнивание -->
        <div class="col-md-6">
            <!-- Карточка для формы -->
            <div class="card">
                <!-- Карточка с градиентным фоном -->
                <div class="card-header">Регистрация</div>
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
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <!-- Поле пароля -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <!-- Поле подтверждения пароля -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        <!-- Кнопка регистрации -->
                        <button type="submit" class="btn btn-outline-light mt-3">Зарегистрироваться</button>
                        <a class="nav-link" href="/signin">Войти</a>
                    </form>
                    <?php
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;

                    require 'C:\xampp\htdocs\PhpstormProjects\Ibragim\DNS\vendor\autoload.php'; // Путь к файлу autoload.php из Composer

                    // Проверяем, была ли отправлена форма методом GET
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email']) && isset($_GET['password'])) {
                        // Получаем данные из формы
                        $email = $_GET['email'];
                        $password = $_GET['password'];

                        // Подключение к базе данных (замените на ваши реальные данные)
                        $servername = "localhost";
                        $username = "root"; // ваш пользователь базы данных
                        $dbpassword = ""; // ваш пароль базы данных
                        $dbname = "computer";
                        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

                        // Проверка соединения
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Проверка существования email в базе данных
                        $email_check = $conn->query("SELECT email FROM signin WHERE email = '$email'");
                        if ($email_check->num_rows > 0) {
                            echo "Этот email уже зарегистрирован.";
                        } else {
                            // Получение текущего максимального значения idUser
                            $result = $conn->query("SELECT MAX(idUser) AS max_idUser FROM signin");
                            $row = $result->fetch_assoc();
                            $new_id = $row['max_idUser'] + 1;

                            // SQL запрос для вставки данных в таблицу
                            $sql = "INSERT INTO signin (idUser, email, password) VALUES ('$new_id', '$email', '$password')";

                            if ($conn->query($sql) === TRUE) {
                                echo "Данные успешно добавлены в базу данных.";
                            } else {
                                echo "Ошибка: " . $sql . "<br>" . $conn->error;
                            }

                            // Отправка письма
                            $mail = new PHPMailer(true);

                            try {
                                // Настройки SMTP
                                $mail->isSMTP();
                                $mail->Host = 'smtp.mail.ru';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'avenoxus@mail.ru'; // Ваша почта на Mail.ru
                                $mail->Password = '8BDnzMtEUpCRxecEZWyP'; // Пароль от вашей почты
                                $mail->SMTPSecure = 'tls';
                                $mail->Port = 587;

                                // Устанавливаем адрес отправителя и получателя
                                $mail->setFrom('avenoxus@mail.ru', 'CompMaster');
                                $mail->addAddress($email);

                                // Устанавливаем тему письма и его содержимое
                                $mail->Subject = 'Registertion';
                                $mail->isHTML(true);
                                $mail->Body = '<h1>Welcome to CompMaster!</h1><p>You have sucessefully registered</p>';

                                // Отправляем письмо
                                $mail->send();
                                echo 'Письмо успешно отправлено!';
                            } catch (Exception $e) {
                                echo "Ошибка отправки письма: {$mail->ErrorInfo}";
                            }
                        }

                        // Закрытие соединения с базой данных
                        $conn->close();
                    }
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
@endsection()
