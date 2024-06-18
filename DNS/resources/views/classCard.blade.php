<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compMaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-dark-gradient {
            background: linear-gradient(to right, #2c3e50, #3498db);
        }
        .card {
            background-color: #2c3e50;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            max-height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
            color: #f1f1f1;
        }
        .btn-outline-light {
            border-color: #f1f1f1;
            color: #f1f1f1;
            transition: background-color 0.2s, color 0.2s;
        }
        .btn-outline-light:hover {
            background-color: #f1f1f1;
            color: #2c3e50;
        }
        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #ffc107;
            margin-top: 15px;
        }
        .navbar {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        .navbar:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="bg-dark-gradient">
<nav class="navbar navbar-expand-md sticky-top border-bottom" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="about">
            <img src="Logotyp.png" alt="CompMaster" width="50" height="50" class="d-inline-block align-top">
            CompMaster
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav" aria-controls="offcanvasNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" id="offcanvasNav" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Меню</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="d-flex ms-auto" action="/search" method="GET">
                    <input type="text" name="q" class="form-control" placeholder="Поиск товаров" aria-label="Поиск товаров" autocomplete="off">
                    <button type="submit" class="btn btn-outline-light ms-2">Поиск</button>
                </form>
                <ul class="navbar-nav ms-3">
                    <li class="nav-item"><a class="nav-link" href="/support">Поддержка</a></li>
                    <li class="nav-item"><a class="nav-link" href="/favorites">Избранное</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cart">Корзина</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="signin">Войти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    @yield('card_content')
</div>

@yield('card_content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
