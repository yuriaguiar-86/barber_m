$(".sweetdelete").attr("onclick", "").unbind("click");

$(document).on('click', '.sweetdelete', function () {
    let delete_form = $(this).parent().find('form');
    let name_delete = delete_form.prevObject.prevObject[0].dataset.name;

    Swal.fire({
        title: `Tem certeza que deseja apagar ${name_delete}?`,
        text: 'Você não conseguirá reverter essa ação!',
        showCancelButton: true,
        confirmButtonColor: '#FA2626',
        cancelButtonColor: '#A9A9A9',
        confirmButtonText: 'Apagar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            delete_form.submit();
        }
    });
});
