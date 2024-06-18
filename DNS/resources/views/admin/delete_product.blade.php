<!-- delete_product.blade.php -->

<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Удалить товар</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить этот товар?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Удалить</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.delete-button').click(function() {
            let articul = $(this).data('articul');
            $('#deleteProductModal').modal('show');

            $('#confirmDeleteButton').click(function() {
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
            });
        });
    });
</script>
