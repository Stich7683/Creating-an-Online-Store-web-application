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
        .navbar {
            background: linear-gradient(to right, #2c3e50, #3498db);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        .navbar:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }
        .card {
            background-color: #2c3e50;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            max-height: 200px;
            object-fit: contain;
        }
        .card-body {
            padding: 20px;
            color: #f1f1f1;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
        .actions {
            margin-top: 15px;
            display: flex;
            align-items: center;
        }
        .heart {
            color: #f1f1f1;
            font-size: 1.5em;
            cursor: pointer;
            margin-left: 15px;
        }
        .heart.favorited {
            color: #e74c3c;
        }
        .heart:hover, .btn-outline-light:hover {
            color: #c0392b;
        }
        .alert {
            position: fixed;
            top: 70px;
            right: 20px;
            z-index: 9999;
            display: none;
        }
        .card-wrapper {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            height: 100%;
        }
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
    </style>
</head>
<body class="bg-dark-gradient">
<nav class="navbar navbar-expand-md sticky-top border-bottom" data-bs-theme="dark">
    <!-- Навигационная панель -->
</nav>
<a href="#" class="btn btn-outline-light mt-3" onclick="history.back()">Назад</a>

<div class="container mt-5">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "computer";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the cookie set by JavaScript
    $cartItems = isset($_COOKIE['cartItems']) ? json_decode($_COOKIE['cartItems'], true) : [];

    $totalCost = 0;

    if (!empty($cartItems)) {
        $escapedArticuls = array_map(function($articul) use ($conn) {
            return "'" . $conn->real_escape_string($articul) . "'";
        }, $cartItems);
        $articulString = implode(',', $escapedArticuls);

        $sql = "SELECT articul, Name, image, cost FROM computers WHERE articul IN ($articulString)";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<div class='container mt-3'>";
            echo "<h3>Товары в корзине:</h3>";
            echo "<div class='row'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 col-lg-4 mb-4'>";
                echo "<div class='card-wrapper'>";
                echo "<div class='card'>";
                if ($row['image']) {
                    $image_data = base64_encode($row['image']);
                    echo "<img src='data:image/jpeg;base64,$image_data' class='card-img-top' alt='" . htmlspecialchars($row['Name']) . "'>";
                }
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row['Name']) . "</h5>";
                echo "<p class='price'>" . htmlspecialchars($row['cost']) . " $</p>";
                $totalCost += $row['cost'];
                echo "<p class='card-text'>Артикул: " . nl2br(htmlspecialchars($row['articul'])) . "</p>";
                echo "<div class='actions'>";
                echo "<button class='btn btn-primary btn-details me-3' data-articul='" . htmlspecialchars($row['articul']) . "'>Подробнее</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            echo "<h4>Общая стоимость: " . $totalCost . " $</h4>";
            echo "<button class='btn btn-success btn-checkout'>Оформить заказ</button>";
            echo "</div>";
        } else {
            echo "<p>No products found</p>";
        }
    } else {
        echo "<p>No items in the cart</p>";
    }

    $conn->close();
    ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkoutButton = document.querySelector('.btn-checkout');
        if (checkoutButton) {
            checkoutButton.addEventListener('click', function() {
                if (confirm('Вы уверены, что хотите оформить заказ?')) {
                    const dateTime = new Date().toLocaleString();
                    const totalCost = "<?php echo $totalCost; ?>";
                    const newOrder = { dateTime, totalCost };

                    // Сохраняем новый заказ в localStorage или отправляем на сервер
                    const existingOrders = localStorage.getItem('orders');
                    //const orders = existingOrders ? JSON.parse(existingOrders) : [];
                    //orders.push(newOrder);
                    //localStorage.setItem('orders', JSON.stringify(orders));

                    alert("Заказ оформлен");

                    // Очищаем корзину после успешного оформления заказа
                    localStorage.removeItem('cartItems');
                    //document.cookie = 'cartItems=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

                    // Перезагружаем страницу для обновления содержимого корзины
                    location.reload();
                }
            });
        }
    });
</script>
</body>
</html>
