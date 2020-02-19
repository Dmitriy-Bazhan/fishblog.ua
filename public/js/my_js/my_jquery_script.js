$(document).ready(function () {
    $('#push_to_login').click(function (event) {
        event.preventDefault();
        var test = $('#form_of_login').serializeArray();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'ajaxLoginPost',
            data: {
                'test': test
            },
            success: function (data) {
                console.log(data);
            },
            error: function () {
                console.log('ERROR AJAX');
            }
        });
    });
});
