<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список товаров</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin: 10px;
            width: 300px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-3">Список товаров</h2>
    <div class="row">
        <?php
        // Подключение к базе данных
        $connection = mysqli_connect("localhost", "root", "", "database");

        // Проверка соединения
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Запрос на получение товаров
        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);

        // Перебор результатов и создание карточек товаров
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<img src="' . $row['image_url'] . '" class="card-img-top" alt="' . $row['name'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
            echo '<p class="card-text">' . $row['short_description'] . '</p>';
            echo '<a href="product.php?id=' . $row['id'] . '" class="btn btn-primary">Подробнее</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // Освобождаем память от результата запроса
        mysqli_free_result($result);

        // Закрываем соединение с базой данных
        mysqli_close($connection);
        ?>
    </div>
</div>

</body>
</html>
