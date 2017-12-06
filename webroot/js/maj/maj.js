$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#employe_id').on('change', function () {
        var employeID = $(this).val();
        if (employeID) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'employe_id=' + employeID,
                success: function (formations) {
                    $select = $('#formation_id');
                    $select.find('option').remove();
                    $.each(formations, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#formation_id').html('<option value="">Select Category first</option>');
        }
    });
});


