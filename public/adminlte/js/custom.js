
$(document).ready(function(){
    $('#nestable').nestable();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#category-form').on('submit', function(e){
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: '/admin/categories/store',
            method: 'POST',
            data: formData,
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Error occurred!');
            }
        });
    });

    $('.edit-category').on('click', function(){
        let categoryId = $(this).data('id');

        $.get(`admin/categories/${categoryId}/edit`, function(category){
            $('#category-id').val(category.id);
            $('#category-name').val(category.name);
            $('#parent-id').val(category.parent_id);
        });
    });

    $('.delete-category').on('click', function(){
        let deleteUrl = $(this).data('delete-url');
        if(confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: deleteUrl,
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
