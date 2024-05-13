@extends('class')
@section('main_content')
<!-- Основной контент -->
<div class="container mt-5"> <!-- Пространство для контента -->
    <div class="row text-center">
        <!-- Карточки с товарами -->
        <div class="col-md-4 mb-3"> <!-- Готовые компьютеры -->
            <div class="card hover-shadow">
                <img src="{{ asset('comp.jpg') }}" width="150" height="250" class="card-img-top" alt="Готовые компьютеры">
                <div class="card-body">
                    <h5 class="card-title">Готовые компьютеры</h5>
                    <p>Лучшие сборки для гейминга и работы</p>
                    <a href="computer" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3"> <!-- Ноутбуки -->
            <div class="card hover-shadow">
                <img src="{{ asset('note.jpg') }}" width="150" height="250" class="card-img-top" alt="Ноутбуки">
                <div class="card-body">
                    <h5 class="card-title">Ноутбуки</h5>
                    <p>Ноутбуки для всех нужд</p>
                    <a href="/laptops" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3"> <!-- Мониторы -->
            <div class="card hover-shadow">
                <img src="{{ asset('monitor.jpg') }}" width="150" height="250" class="card-img-top" alt="Мониторы">
                <div class="card-body">
                    <h5 class="card-title">Мониторы</h5>
                    <p>Широкий выбор мониторов для офиса и гейминга</p>
                    <a href="/monitors" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Вторая строка -->
    <div class="row text-center"> <!-- Новые карточки -->
        <div class="col-md-4 mb-3"> <!-- Видеокарты -->
            <div class="card hover-shadow">
                <img src="{{ asset('graphic.jpg') }}" width="150" height="250" class="card-img-top" alt="Видеокарты">
                <div class="card-body">
                    <h5 class="card-title">Видеокарты</h5>
                    <p>Выбор видеокарт для гейминга и работы</p>
                    <a href="/graphics" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3"> <!-- Периферия -->
            <div class="card hover-shadow">
                <img src="{{ asset('peripheral.jpg') }}" width="150" height="250" class="card-img-top" alt="Периферия">
                <div class="card-body">
                    <h5 class="card-title">Периферия</h5>
                    <p>Клавиатуры, мыши, принтеры, и многое другое</p>
                    <a href="/peripherals" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3"> <!-- Процессоры -->
            <div class="card hover-shadow">
                <img src="{{ asset('processor.jpg') }}" width="150" height="250" class="card-img-top" alt="Процессоры">
                <div class="card-body">
                    <h5 class="card-title">Процессоры</h5>
                    <p>Процессоры Intel и AMD для любых задач</p>
                    <a href="/processors" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>
    </div> <!-- Конец второй строки -->
</div> <!-- Конец контейнера -->

@endsection()
