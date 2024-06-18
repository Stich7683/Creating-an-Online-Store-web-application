<!-- edit_product.blade.php -->

<form id="editProductForm">
    <!-- Поля для изменения товара -->
    <div class="mb-3">
        <label for="editProductName" class="form-label">Название</label>
        <input type="text" class="form-control" id="editProductName" name="Name" required>
    </div>
    <div class="mb-3">
        <label for="editProductCost" class="form-label">Цена</label>
        <input type="number" class="form-control" id="editProductCost" name="cost" required>
    </div>
    <div class="mb-3">
        <label for="editProductArticul" class="form-label">Артикул</label>
        <input type="text" class="form-control" id="editProductArticul" name="articul" readonly>
    </div>
    <div class="mb-3">
        <label for="editProductImage" class="form-label">Изображение</label>
        <input type="file" class="form-control" id="editProductImage" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
</form>

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
