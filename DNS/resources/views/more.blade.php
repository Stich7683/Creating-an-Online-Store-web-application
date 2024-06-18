<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробнее о товаре</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-dark-gradient {
            background: linear-gradient(to right, #2c3e50, #3498db);
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(to right, #2c3e50, #3498db);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        .navbar:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }
        .product-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1); /* Полупрозрачный белый фон */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .product-description {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
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
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .heart {
            color: #f1f1f1;
            font-size: 1.5em;
            cursor: pointer;
        }
        .heart.favorited {
            color: #e74c3c;
        }
        .heart:hover {
            color: #c0392b;
        }
        .alert {
            position: fixed;
            top: 70px;
            right: 20px;
            z-index: 9999;
            display: none;
        }
        .card {
            background-color: #2c3e50;
            border: none; /* Убрать границу */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            padding: 20px;
            color: #f1f1f1;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-wrapper {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            height: 100%;
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
                    <li class="nav-item"><a class="nav-link" href="/cart">Корзина</a></li>
                    <li class="nav-item"><a class="nav-link" href="/support">Поддержка</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="signin">Войти</a>
                    </li>
                </ul>
                <div id="loading-animation" class="spinner-border text-primary" role="status" style="display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </div>
        </div>
    </div>
</nav>
<a href="#" class="btn btn-outline-light mt-3" onclick="history.back()">Назад</a>

<div class="container product-details">
    <div id="articul"></div>
<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computer";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Получение информации о товаре
if (isset($_COOKIE['lastClickedArticul'])) {
    $articul = htmlspecialchars($_COOKIE['lastClickedArticul']);
        // Запрос для получения информации о товаре по         // артикулу
    $sql = "SELECT articul, Name, image, cost, about, col FROM computers WHERE articul = '$articul'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Вывод информации о товаре
        echo "<div class='card'>";
        echo "<div class='card-wrapper'>";
        if ($row["image"]) {
            $image_data = base64_encode($row["image"]);
            echo "<img src='data:image/jpeg;base64,$image_data' class='product-image' alt='" . htmlspecialchars($row["Name"]) . "'>";
        }
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($row["Name"]) . "</h5>";
        echo "<p class='price'>" . htmlspecialchars($row["cost"]) . " $</p>";
        echo "<p class='card-text'>Артикул: " . nl2br(htmlspecialchars($row["articul"])) . "</p>";
        echo "<p class='card-text'>Осталось: " . htmlspecialchars($row["col"]) . "</p>";
        if ($row["about"]) {
            echo "<p class='card-text'>" . nl2br(htmlspecialchars($row["about"])) . "</p>";
        }
        echo "<div class='actions'>";
        echo "<a href='#' class='btn btn-primary btn-add-to-cart' data-articul='" . htmlspecialchars($row["articul"]) . "'>Добавить в корзину</a>";
        echo "<span class='heart' data-articul='" . htmlspecialchars($row["articul"]) . "'>&hearts;</span>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-warning'>Товар не найден.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Артикул товара не указан.</div>";
}

    $conn->close();
    ?>
</div>
<div class="alert alert-success" id="cartSuccessAlert" style="display: none;">Товар добавлен в корзину!</div>
<div class="alert alert-danger" id="cartRemoveAlert" style="display: none;">Товар удалён из корзины!</div>
<div class="alert alert-success" id="heartSuccessAlert" style="display: none;">Товар добавлен в избранное!</div>
<div class="alert alert-danger" id="heartRemoveAlert" style="display: none;">Товар удалён из избранного!</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartSuccessAlert = document.getElementById('cartSuccessAlert');
        const cartRemoveAlert = document.getElementById('cartRemoveAlert');
        const heartSuccessAlert = document.getElementById('heartSuccessAlert');
        const heartRemoveAlert = document.getElementById('heartRemoveAlert');

        function showAlert(alertElement) {
            alertElement.style.display = 'block';
            setTimeout(() => {
                alertElement.style.display = 'none';
            }, 2000);
        }

        function toggleFavorite(articul) {
            const isFavorited = localStorage.getItem(`favorite-${articul}`) === 'true';
            localStorage.setItem(`favorite-${articul}`, !isFavorited);
            return !isFavorited;
        }

        function toggleCart(articul) {
            const isInCart = localStorage.getItem(`cart-${articul}`) === 'true';
            localStorage.setItem(`cart-${articul}`, !isInCart);
            return !isInCart;
        }

        document.querySelectorAll('.heart').forEach(heart => {
            const articul = heart.getAttribute('data-articul');
            if (localStorage.getItem(`favorite-${articul}`) === 'true') {
                heart.classList.add('favorited');
            }
            heart.addEventListener('click', function () {
                if (toggleFavorite(articul)) {
                    heart.classList.add('favorited');
                    showAlert(heartSuccessAlert);
                } else {
                    heart.classList.remove('favorited');
                    showAlert(heartRemoveAlert);
                }
            });
        });

        document.querySelectorAll('.btn-add-to-cart').forEach(button => {
            const articul = button.getAttribute('data-articul');
            if (localStorage.getItem(`cart-${articul}`) === 'true') {
                button.classList.add('added');
                button.textContent = 'В корзине';
            }
            button.addEventListener('click', function () {
                if (toggleCart(articul)) {
                    button.classList.add('added');
                    button.textContent = 'Удалить из корзины';
                    showAlert(cartSuccessAlert);
                } else {
                    button.classList.remove('added');
                    button.textContent = 'Добавить в корзину';
                    showAlert(cartRemoveAlert);
                }
            });
        });
    })

</script>
</body>
</html>
