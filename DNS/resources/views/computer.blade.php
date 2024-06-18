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
            .card{
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
                max-height: 200px; /* Максимальная высота для изображения */
                object-fit: contain; /* Изображение вписывается в рамку карточки без искажения */
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
            .sort-wrapper {
        position: absolute;
        top: 100px; /* Отступ от верхнего меню */
        right: 20px; /* Расположение справа */
        display: flex;
        align-items: center;
        color: #ffffff; /* Цвет текста */
        font-size: 14px; /* Размер текста */
    }

    .sort-label {
        margin-right: 10px; /* Отступ между меткой и выпадающим списком */
    }

    .sort-select {
        padding: 5px 10px; /* Поля вокруг текста внутри элемента */
        background-color: #2c3e50; /* Цвет фона */
        border: none; /* Убираем рамку */
        color: #ffffff; /* Цвет текста */
        border-radius: 5px; /* Закругляем углы */
        cursor: pointer; /* Изменяем курсор при наведении */
    }

    .sort-select option {
        background-color: #2c3e50; /* Цвет фона для опций */
        color: #ffffff; /* Цвет текста для опций */
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
                        <li class="nav-item"><a class="nav-link" href="/kor">Корзина</a></li>
                        <li class="nav-item"><a class="nav-link" href="/favorites">Избранное</a></li>
                        <li class="nav-item"><a class="nav-link" href="/support">Поддержка</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/signin">Войти</a>
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

    <div class="container mt-5">
        <div class="sort-wrapper">
            <span class="sort-label">Сортировать по:</span>
            <select id="sort" class="sort-select">
                <option value="name_asc">Имя (по возрастанию)</option>
                <option value="name_desc">Имя (по убыванию)</option>
                <option value="cost_asc">Цена (по возрастанию)</option>
                <option value="cost_desc">Цена (по убыванию)</option>
                <option value="col_asc">Количество (по возрастанию)</option>
                <option value="col_desc">Количество (по убыванию)</option>
            </select>
        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "computer";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'name_asc';
        $sortSql = "";

        switch ($sort) {
            case 'name_asc':
                $sortSql = "ORDER BY Name ASC";
                break;
            case 'name_desc':
                $sortSql = "ORDER BY Name DESC";
                break;
            case 'cost_asc':
                $sortSql = "ORDER BY cost ASC";
                break;
            case 'cost_desc':
                $sortSql = "ORDER BY cost DESC";
                break;
            case 'col_asc':
                $sortSql = "ORDER BY col ASC";
                break;
            case 'col_desc':
                $sortSql = "ORDER BY col DESC";
                break;
            default:
                $sortSql = "ORDER BY Name ASC";

        }

        echo "<script>
        const lastClickedCat = localStorage.getItem('lastClickedCat');
        console.log('Cat:', lastClickedCat);
        document.cookie = 'lastClickedCat=' + lastClickedCat + '; path=/';
        </script>";

        echo "<script>
        const lastClickedCardProduct = localStorage.getItem('lastClickedCardProduct');
        console.log('Product:', lastClickedCardProduct);
        document.cookie = 'lastClickedCardProduct=' + lastClickedCardProduct + '; path=/';
        </script>";

        echo "<script>
        const searchQuery = localStorage.getItem('searchQuery');
        console.log('Поиск:', searchQuery);
        document.cookie = 'searchQuery=' + searchQuery + '; path=/';
        </script>";

        $result = false;

        if (isset($_COOKIE['lastClickedCat']) && $_COOKIE['lastClickedCat'] !== 'null') {
            $category = $conn->real_escape_string($_COOKIE['lastClickedCat']);
            $sql = "SELECT articul, Name, image, cost FROM computers WHERE cat = '$category' $sortSql";
            $result = $conn->query($sql);
            if ($result === false) {
                echo "Ошибка SQL: " . $conn->error;
            }
        } elseif (isset($_COOKIE['lastClickedCardProduct'])) {
            $productType = $conn->real_escape_string($_COOKIE['lastClickedCardProduct']);
            $sql = "SELECT articul, Name, image, cost FROM computers WHERE product = '$productType' $sortSql";
            $result = $conn->query($sql);
            if ($result === false) {
                echo "Ошибка SQL: " . $conn->error;
            }
        }
        $searchQuery = isset($_COOKIE['searchQuery']) ? $_COOKIE['searchQuery'] : null;
if ($searchQuery !== 'null') {
    $searchQuery = $conn->real_escape_string($searchQuery);
    $sql = "SELECT articul, Name, image, cost FROM computers WHERE articul = '$searchQuery' OR cat LIKE '%$searchQuery%' OR product LIKE '%$searchQuery%' OR Name LIKE '%$searchQuery%' OR About LIKE '%$searchQuery%' $sortSql";
    $result = $conn->query($sql);
    if ($result === false) {
        echo "Ошибка SQL: " . $conn->error;
    }
}


        if ($result && $result->num_rows > 0) {
            echo "<div class='row'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 col-lg-4 mb-4'>";
                echo "<div class='card-wrapper'>";
                echo "<div class='card'>";
                if ($row["image"]) {
                    $image_data = base64_encode($row["image"]);
                    echo "<img src='data:image/jpeg;base64,$image_data' class='card-img-top' alt='" . htmlspecialchars($row["Name"]) . "'>";
                }
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row["Name"]) . "</h5>";
                echo "<p class='price'>" . htmlspecialchars($row["cost"]) . " $</p>";
                echo "<p class='card-text'>Артикул: " . nl2br(htmlspecialchars($row["articul"])) . "</p>";
                echo "<div class='actions'>";
                echo "<a href='#' class='btn btn-primary btn-details me-3' data-articul='" . htmlspecialchars($row["articul"]) . "'>Подробнее</a>";
                echo "<a href='#' class='btn btn-outline-light add-to-cart' data-articul='" . htmlspecialchars($row["articul"]) . "'>Добавить в корзину</a>";
                echo "<span class='heart' data-articul='" . htmlspecialchars($row["articul"]) . "'>&hearts;</span>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-warning'>Нет доступных товаров.</div>";
        }

        $conn->close();
        ?>

    </div>

    <!-- Уведомления -->
    <div class="alert alert-success" id="cartSuccessAlert">Товар добавлен в корзину!</div>
    <div class="alert alert-danger" id="cartRemoveAlert">Товар удалён из корзины!</div>
    <div class="alert alert-success" id="heartSuccessAlert">Товар добавлен в избранное!</div>
    <div class="alert alert-danger" id="heartRemoveAlert">Товар удалён из избранного!</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            console.log('Артикула товаров в корзине:', cartItems);

            // Существующий код
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
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                const itemIndex = cartItems.indexOf(articul);
                if (itemIndex === -1) {
                    cartItems.push(articul);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    return true;
                } else {
                    cartItems.splice(itemIndex, 1);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    return false;
                }
            }

            document.querySelectorAll('.heart').forEach(heart => {
                const articul = heart.getAttribute('data-articul');
                if (localStorage.getItem(`favorite-${articul}`) === 'true') {
                    heart.classList.add('favorited');
                }
                heart.addEventListener('click', function() {
                    if (toggleFavorite(articul)) {
                        heart.classList.add('favorited');
                        showAlert(heartSuccessAlert);
                    } else {
                        heart.classList.remove('favorited');
                        showAlert(heartRemoveAlert);
                    }
                });
            });

            document.querySelectorAll('.add-to-cart').forEach(button => {
                const articul = button.getAttribute('data-articul');
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                if (cartItems.includes(articul)) {
                    button.classList.add('added');
                    button.textContent = 'Удалить из корзины';
                }
                button.addEventListener('click', function() {
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

            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productType = link.getAttribute('href').substring(1);
                    localStorage.setItem('lastClickedCardProduct', productType);
                    localStorage.setItem('autoReload', 'true');
                    window.location.href = window.location.href;
                });
            });

            if (localStorage.getItem('autoReload') === 'true') {
                localStorage.removeItem('autoReload');
                window.location.reload(true);
            }

            if (localStorage.getItem('pageReloaded') !== 'true') {
                document.getElementById('loading-animation').style.display = 'block';
                const loadingOverlay = document.createElement('div');
                loadingOverlay.classList.add('loading-overlay');
                loadingOverlay.innerHTML = '<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>';
                document.body.appendChild(loadingOverlay);

                setTimeout(function() {
                    window.location.reload(true);
                }, 500);

                localStorage.setItem('pageReloaded', 'true');
            }

            window.addEventListener('load', function(event) {
                if (localStorage.getItem('autoReload') === 'true') {
                    localStorage.removeItem('autoReload');
                } else {
                    localStorage.setItem('autoReload', 'true');
                }
            });

            const homeButton = document.querySelector('.navbar-brand');
            homeButton.addEventListener('click', function() {
                localStorage.setItem('autoReload', 'true');
                document.getElementById('loading-animation').style.display = 'none';
            });

            const detailButtons = document.querySelectorAll('.btn-details');

            detailButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const articul = this.getAttribute('data-articul');
                    document.cookie = `lastClickedArticul=${articul}; path=/`;
                    window.location.href = `/more?articul=${articul}`;
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
        const sortSelect = document.getElementById('sort');
        const savedSort = localStorage.getItem('savedSort');

        if (savedSort) {
            sortSelect.value = savedSort; // Восстановление предыдущего выбора
        }

        sortSelect.addEventListener('change', function() {
            const selectedSort = this.value;
            localStorage.setItem('savedSort', selectedSort); // Сохранение выбранного значения
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('sort', selectedSort);
            window.location.href = window.location.pathname + '?' + urlParams.toString();
        });
    });
    </script>
    </body>
    </html>
