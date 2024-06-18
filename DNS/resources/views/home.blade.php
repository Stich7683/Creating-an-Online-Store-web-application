@extends('class')
@section('main_content')
    <div class="container mt-5">
        <div class="row text-center">
            <!-- Пример карточки с товарами -->
            <div class="col-md-4 mb-3">
                <div class="card hover-shadow" data-product="Готовые компьютеры">
                    <img src="{{ asset('comp.jpg') }}" width="150" height="250" class="card-img-top" alt="Готовые компьютеры">
                    <div class="card-body">
                        <h5 class="card-title">Готовые компьютеры</h5>
                        <p>Лучшие сборки для гейминга и работы</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <!-- Карточка для ноутбуков -->
            <div class="col-md-4 mb-3">
                <div class="card hover-shadow" data-product="Ноутбуки">
                    <img src="{{ asset('note.jpg') }}" width="150" height="250" class="card-img-top" alt="Ноутбуки">
                    <div class="card-body">
                        <h5 class="card-title">Ноутбуки</h5>
                        <p>Ноутбуки для всех нужд</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <!-- Карточка для мониторов -->
            <div class="col-md-4 mb-3">
                <div class="card hover-shadow" data-product="Мониторы">
                    <img src="{{ asset('monitor.jpg') }}" width="150" height="250" class="card-img-top" alt="Мониторы">
                    <div class="card-body">
                        <h5 class="card-title">Мониторы</h5>
                        <p>Широкий выбор мониторов для офиса и гейминга</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <!-- Карточка для комплектующих -->
            <div class="col-md-4 mb-3">
                <div class="card hover-shadow" data-product="Комплектующие">
                    <img src="{{ asset('components.jpg') }}" width="150" height="250" class="card-img-top" alt="Комплектующие">
                    <div class="card-body">
                        <h5 class="card-title">Комплектующие</h5>
                        <p>Все необходимые компоненты для сборки ПК</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <!-- Карточка для периферии -->
            <div class="col-md-4 mb-3">
                <div class="card hover-shadow" data-product="Периферия">
                    <img src="{{ asset('peripheral.jpg') }}" width="150" height="250" class="card-img-top" alt="Периферия">
                    <div class="card-body">
                        <h5 class="card-title">Периферия</h5>
                        <p>Клавиатуры, мыши, наушники и другое</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <!-- Карточка для аксессуаров -->
            <div class="col-md-4 mb-3">
                <div class="card hover-shadow" data-product="Аксессуары">
                    <img src="{{ asset('accessories.jpg') }}" width="150" height="250" class="card-img-top" alt="Аксессуары">
                    <div class="card-body">
                        <h5 class="card-title">Аксессуары</h5>
                        <p>Сумки, подставки и другие мелочи</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Информация о последней нажатой карточке -->

    </div>
@endsection()
