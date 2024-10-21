
$(document).ready(function(){
    $('#nestable').nestable();

    $('#category-form').on('submit', function(e){
        e.preventDefault();
        let categoryId = $('#category-id').val();
        let formData = $(this).serialize();

        if (categoryId) {
            $.ajax({
                url: `/admin/categories/${categoryId}`,
                method: 'PATCH',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error occurred!');
                }
            });
        } else {
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
        }
    });

    $('.edit-category').on('click', function(){
        debugger;
        // let categoryId = $(this).data('id');
        let editUrl = $(this).data('edit-url');
        $.get(editUrl, function(category){
            $('#category-id').val(category.id);
            $('#category-name').val(category.name);
            $('#parent-id').val(category.parent_id);
        });
    });

    $('.delete-category').on('click', function(){
        let categoryId = $(this).data('id');

        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: `/admin/categories/${categoryId}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert(response.message || 'Error occurred while deleting category.');
                    }
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
