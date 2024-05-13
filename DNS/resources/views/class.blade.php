<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CompMaster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Градиентный фон */
        .bg-dark-gradient {
            background: linear-gradient(to right, #2c3e50, #3498db);
        }
        /* Улучшение визуальных эффектов для Navbar */
        .navbar {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        .navbar:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-dark-gradient"> <!-- Градиентный фон -->

<!-- Навигационная панель -->
<nav class="navbar navbar-expand-md sticky-top border-bottom" data-bs-theme="dark">
    <div class="container-fluid">
        <!-- Логотип -->
        <a class="navbar-brand" href="about">
            <img src="{{ asset('Logotyp.png') }}" alt="CompMaster" width="50" height="50" class="d-inline-block align-top">
            CompMaster
        </a>

        <!-- Переключатель для мобильных устройств -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav" aria-controls="offcanvasNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas для мобильных устройств -->
        <div class="offcanvas offcanvas-end" id="offcanvasNav" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Меню</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <!-- Окно поиска -->
                <form class="d-flex ms-auto" action="/search" method="GET">
                    <input type="text" name="q" class="form-control" placeholder="Поиск товаров" aria-label="Поиск товаров" autocomplete="off">
                    <button type="submit" class="btn btn-outline-light ms-2">Поиск</button>
                </form>

                <!-- Навигационные элементы -->
                <ul class="navbar-nav ms-3">
                    <li class="nav-item"><a class="nav-link" href="/support">Поддержка</a></li>
                    <li class="nav-item"><a class="nav-link" href="/favorites">Избранное</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cart">Корзина</a></li>
                </ul>

                <!-- Кнопка "Войти" справа -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login">Войти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@yield('main_content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
