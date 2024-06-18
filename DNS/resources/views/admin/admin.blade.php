<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - CompMaster</title>
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
        .modal {
            color: #000; /* Черный текст для модального окна */
        }
    </style>
</head>
<body class="bg-dark-gradient">
<div class="container mt-5">
    <button class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addProductModal">Добавить товар</button>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    @if ($product->image)
                        <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" class="card-img-top" alt="{{ $product->Name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->Name }}</h5>
                        <p class="price">{{ $product->cost }} $</p>
                        <p class="card-text">Артикул: {{ $product->articul }}</p>
                        <div class="actions">
                            <button class="btn btn-outline-light me-3 edit-button" data-articul="{{ $product->articul }}" data-bs-toggle="modal" data-bs-target="#editProductModal">Изменить</button>
                            <button class="btn btn-outline-light delete-button" data-articul="{{ $product->articul }}">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (count($products) === 0)
        <div class="alert alert-warning">Нет доступных товаров.</div>
    @endif
</div>

<!-- Модальное окно для добавления товара -->
@include('modals.add_product_modal')

<!-- Модальное окно для изменения товара -->
@include('modals.edit_product_modal')

<!-- Скрипты Bootstrap и jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Скрипт для обработки AJAX-запросов -->
<script>
    $(document).ready(function() {
        $('.edit-button').click(function() {
            let articul = $(this).data('articul');
            // Загрузить данные товара по артикулу и заполнить форму для редактирования
            $.ajax({
                url: '{{ route('get_product') }}',
                method: 'GET',
                data: { articul: articul },
                success: function(response) {
                    let product = JSON.parse(response);
                    $('#editProductName').val(product.Name);
                    $('#editProductCost').val(product.cost);
                    $('#editProductArticul').val(product.articul);
                }
            });
        });

        $('.delete-button').click(function() {
            if (confirm('Вы уверены, что хотите удалить этот товар?')) {
                let articul = $(this).data('articul');
                // Удалить товар по артикулу
                $.ajax({
                    url: '{{ route('delete_product') }}',
                    method: 'POST',
                    data: { articul: articul },
                    success: function(response) {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            alert('Ошибка при удалении товара.');
                        }
                    }
                });
            }
        });

        $('#addProductForm').submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            // Добавить новый товар
            $.ajax({
                url: '{{ route('add_product') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response === 'success') {
                        location.reload();
                    } else {
                        alert('Ошибка при добавлении товара.');
                    }
                }
            });
        });

        $('#editProductForm').submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            // Изменить товар
            $.ajax({
                url: '{{ route('edit_product') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response === 'success') {
                        location.reload();
                    } else {
                        alert('Ошибка при изменении товара.');
                    }
                }
            });
        });
    });
</script>
</body>
</html>
