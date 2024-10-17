
$(document).ready(function(){
    $('#nestable').nestable();

    // Обробка форми додавання/редагування категорії
    $('#category-form').on('submit', function(e){
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: '/categories',
            method: 'POST',
            data: formData,
            success: function(response) {
                location.reload(); // Перезавантажуємо сторінку після успіху
            },
            error: function(xhr) {
                alert('Error occurred!');
            }
        });
    });

    // Обробка редагування категорії
    $('.edit-category').on('click', function(){
        let categoryId = $(this).data('id');

        $.get(`/categories/${categoryId}/edit`, function(category){
            $('#category-id').val(category.id);
            $('#category-name').val(category.name);
            $('#parent-id').val(category.parent_id);
        });
    });

    // Обробка видалення категорії
    $('.delete-category').on('click', function(){
        let categoryId = $(this).data('id');

        if(confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: `/categories/${categoryId}`,
                method: 'DELETE',
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error occurred!');
                }
            });
        }
    });
});
$(function () {
    $('.tags').select2();
    $('.colors').select2();
    $('.roles').select2();
    bsCustomFileInput.init();
})
