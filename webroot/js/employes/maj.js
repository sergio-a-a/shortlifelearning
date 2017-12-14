$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#employe-id').on('change', function () {
        var employeId = $(this).val();
        if (employeId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'employeId=' + employeId,
                success: function (formations) {
                    $select = $('#formation-id');
                    $select.find('option').remove();
                    $.each(formations, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.titre + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#formation-id').html('<option value="">Select Category first</option>');
        }
    });
});






