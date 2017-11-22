$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#category-id').on('change', function () {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'category_id=' + categoryId,
                success: function (subcategories) {
                    $select = $('#subcategory-id');
                    $select.find('option').remove();
                    $.each(subcategories, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#subcategory-id').html('<option value="">Select Category first</option>');
        }
    });
});


