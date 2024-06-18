<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Логотип -->
        <a class="navbar-brand" href="/about">
            <img src="{{ asset('Logotyp.png') }}" alt="CompMaster" width="50" height="50" class="d-inline-block align-top">
            CompMaster
        </a>
        <!-- Каталог -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="catalogDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Каталог
            </button>
            <ul class="dropdown-menu" aria-labelledby="catalogDropdown">
                <li>
                    <div class="row">
                        <div class="col">
                            <h6 class="dropdown-header">Компьютеры</h6>
                            <ul class="list-unstyled">
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="игровые компьютеры">Игровые компьютеры</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="настольные компьютеры">Настольные компьютеры</a></li>
                            </ul>
                            <div class="col">
                                <h6 class="dropdown-header">Ноутбуки</h6>
                                <ul class="list-unstyled">
                                    <li><a class="dropdown-item catalog-item" href="#" data-cat="игровые ноутбуки">Игровые ноутбуки</a></li>
                                    <li><a class="dropdown-item catalog-item" href="#" data-cat="ноутбуки для бизнеса">Ноутбуки для бизнеса</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="dropdown-header">Мониторы</h6>
                            <ul class="list-unstyled">
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="Мониторы для дизайна и графики">Мониторы для дизайна</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="мониторы для офиса">Мониторы для офиса</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="игровые мониторы">Игровые мониторы</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="dropdown-header">Комплектующие</h6>
                            <ul class="list-unstyled">
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="видеокарты">Видеокарты</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="процессоры">Процессоры</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="материнские платы">Материнские платы</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="оперативная память">Оперативная память</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="жесткие диски">Жесткие диски</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="охлаждение">Охлаждение</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="блоки питания">Блоки питания</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="корпуса">Корпуса</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="dropdown-header">Периферия</h6>
                            <ul class="list-unstyled">
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="мыши">Мыши</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="клавиатуры">Клавиатуры</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="наушники">Наушники</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="dropdown-header">Аксессуары</h6>
                            <ul class="list-unstyled">
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="держатели">Держатели</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="хабы">Хабы</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="коврики">Коврики</a></li>
                                <li><a class="dropdown-item catalog-item" href="#" data-cat="прочее">Прочее</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Окно поиска, корзина, избранное, поддержка -->
        <div class="d-flex justify-content-center flex-grow-1">
            <!-- Окно поиска -->
            <form id="searchForm" class="d-flex mx-3" action="/search" method="GET">
                <input id="searchInput" type="text" name="q" class="form-control" placeholder="Поиск товаров" aria-label="Поиск товаров" autocomplete="off">
                <button type="submit" class="btn btn-outline-light ms-2" id="searchButton">Поиск</button>
            </form>
            <!-- Корзина и избранное -->
            <div class="d-flex align-items-center">
                <a href="/kor" class="text-light mx-3" style="text-decoration: none;">Корзина</a>
                <!--<a href="#" class="text-light mx-3" style="text-decoration: none;">Избранное</a>-->
                <a href="/support" class="text-light mx-3" style="text-decoration: none;">Поддержка</a>
            </div>
            <!-- Поддержка -->
        </div>
        <!-- Вход -->
        <ul class="navbar-nav" id="authNav">
            <li class="nav-item">
                <a class="nav-link" href="/signin">Войти</a>
            </li>
        </ul>
    </div>
</nav>

@yield('main_content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обновление страницы и очистка значений cat, product и поиска из localStorage
        localStorage.removeItem('lastClickedCat');
        localStorage.removeItem('lastClickedCardProduct');
        localStorage.removeItem('searchQuery');

        // Обработчик для элементов каталога
        const catalogItems = document.querySelectorAll('.catalog-item');

        catalogItems.forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault(); // Предотвращаем переход по ссылке

                // Получаем категорию из атрибута data-cat
                const category = this.getAttribute('data-cat');

                // Сохраняем категорию в localStorage
                localStorage.setItem('lastClickedCat', category);

                // Переходим на страницу computer.blade.php
                window.location.href = '/computer';
            });
        });

        // Обработчик для кнопок "Перейти" на карточках товаров
        const buttons = document.querySelectorAll('.btn-primary');

        buttons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Предотвращаем переход по ссылке

                // Получаем тип товара карточки
                const cardProduct = this.closest('.card').getAttribute('data-product');

                // Сохраняем тип товара в localStorage
                localStorage.setItem('lastClickedCardProduct', cardProduct);

                // Переходим на страницу computer.blade.php
                window.location.href = '/computer';
            });
        });

        // Обработчик для формы поиска
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');

        searchForm.addEventListener('submit', function(event) {
            // Предотвращаем отправку формы
            event.preventDefault();

            // Получаем значение из поля поиска
            const searchValue = searchInput.value.trim(); // Удаляем лишние пробелы
            console.log('Поиск:', searchValue);

            // Проверяем, что поле не пустое
            if (searchValue !== '') {
                // Сохраняем значение поля поиска в localStorage
                localStorage.setItem('searchQuery', searchValue);

                // Переходим на страницу computer.blade.php
                window.location.href = '/computer';
            } else {
                // Если поле пустое, выводим сообщение об ошибке
                alert('Введите поисковой запрос');
            }
        });

        // Получение токена из localStorage
        let token = localStorage.getItem('token');
        const authNav = document.getElementById('authNav');

        console.log('Token:', token); // Проверка значения токена

        if (token) {
            if (token.startsWith('admin_')) {
                console.log('Администратор');
                // Администратор
                authNav.innerHTML = `
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="/admin">Админ</a>
                    </li>
                `;
            } else if (token.startsWith('user_')) {
                console.log('Обычный пользователь');
                // Обычный пользователь
                authNav.innerHTML = `
                    <li class="nav-item">
                        <a class="nav-link" href="/user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M13.468 12.37C12.758 11.226 11.46 10 8 10s-4.758 1.226-5.468 2.37A7 7 0 1 1 13.468 12.37zM8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z"/>
                                <path d="M8 8a3 3 0 1 0 0-6A3 3 0 0 0 8 8zM8 9c-2.33 0-5 1.17-5 3v1h10v-1c0-1.83-2.67-3-5-3z"/>
                            </svg>
                        </a>
                    </li>
                `;
            }
        }
    });
</script>


</body>
</html>

