$(document).ready(function() {
    $('.icons__module .allcheck').click(function() {
        $(this).parent().next("div").find('label input:checkbox').each(function() {
            $(this).prop('checked', true);
        });
    });
    $('.icons__module .uncheck').click(function() {
        $(this).parent().next("div").find('label input:checkbox').each(function() {
            $(this).prop('checked', false);
        });
    });
});
