$(function() {

    $('.btn-user-delete').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: '/user/' + $(this).attr('data-user-id'),
            type: 'DELETE',
            success: function(result) {
                resultJson = JSON.parse(result);
                if (resultJson.result == 'true') {
                    alert('User was successfully deleted.');
                }

            }
        });
    });

    $('.btn-user-form').click(function(event) {
        event.preventDefault();
        var form_url = '/user';
        var form_method = 'POST';

        elementUserId = $('#user-id');
        if (elementUserId.length) {
            form_url = '/user/' + elementUserId.val();
            form_method = 'PUT';
        }

        $.ajax({
            url: form_url,
            type: form_method,
            data: $('#user-form').serialize(),
            success: function(result) {
                //
            }
        });
    });

    $('#user-form').submit(function(e){
        e.preventDefault();
    });
});