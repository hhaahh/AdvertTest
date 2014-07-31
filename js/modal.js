$(document).ready(function() {
    $('.getForm').click(function() {
        var url = $(this).attr('href');
        $.get(url, function(data) {
            $('.modal').html(data).modal('show');
        });
        return false;
    });

    $('.modal').on('click', '.sendForm', function() {
        var form = $(this).closest('form');
        $.post(
            form.attr('action'),
            form.serialize(),
            function(data) {
                //window.location.reload();
                $('.modal').modal('hide');
            }
        );
        return false;
    });

    $('.getJuiForm').click(function() {
        var url = $(this).attr('href');
        $.get(url, function(data) {
            $('#juiDialog #dialog-body').html(data);
            $('#juiDialog').dialog("open");
        });
        return false;
    });
});