@extends('class')
@section('main_content')

    <!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет - CompMaster</title>
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
                <div class="card-header">Личный кабинет</div>
                <!-- Заголовок карточки -->
                <div class="card-body">
                    <!-- Тело карточки -->
                    <!-- Кнопка выхода -->
                    <a href="#" class="btn btn-outline-light" id="logoutBtn">Выйти</a>
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

<!-- Модальное окно подтверждения выхода -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Выход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите выйти из аккаунта?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" id="confirmLogout">Выйти</button>
            </div>
        </div>
    </div>
</div>
<!-- Добавляем элемент для вывода информации о заказе -->
<div id="orderInfo" class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">Информация о заказе</div>
        <div class="card-body">
            <!-- Здесь будет отображаться информация о заказах -->
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Выводим информацию о заказах на странице профиля
        const orderInfo = document.getElementById('orderInfo');
        if (orderInfo) {
            const orders = decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)orders\s*=\s*([^;]*).*$)|^.*$/, "$1")).split('|');
            let orderHTML = '';
            orders.forEach(order => {
                const orderData = order.split(',');
                const dateTime = orderData[0];
                const articuls = orderData[1];
                const totalCost = orderData[2];
                orderHTML += `
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>Дата и время: ${dateTime}</p>
                            <p>Артикулы: ${articuls}</p>
                            <p>Общая стоимость: ${totalCost}</p>
                        </div>
                    </div>
                `;
            });
            orderInfo.innerHTML = orderHTML;
        }
    });
</script>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Открытие модального окна при нажатии на кнопку выхода
    document.getElementById('logoutBtn').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));
        myModal.show();
    });

    // Удаление токена при подтверждении выхода
    document.getElementById('confirmLogout').addEventListener('click', function() {
        localStorage.removeItem('token');
        window.location.href = '/signin'; // Перенаправление на страницу входа
    });
</script>
</body>

</html>
@endsection()
