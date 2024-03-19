$('input').on('input', function() {
    $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
});