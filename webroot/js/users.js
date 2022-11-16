$(document).ready(function() {
    $('.times__employee').hide();
    let role_selected = $('.type__role').val();
    validateTypeRole(role_selected);

    $('.type__role').click(function() {
        role_selected = $('.type__role').val();
        validateTypeRole(role_selected);
    });

    function validateTypeRole(role) {
        role == 3 ?
        $('.times__employee').show(500) :
        $('.times__employee').hide(500);
    }
});
