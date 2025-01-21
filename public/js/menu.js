$("#menu nav .navLink").on('click', function(e) {
    e.preventDefault();

    if ($(this).data('auth')) {
        window.location = $(this).attr('href')
        return;
    }

    $("#modalSignIn").modal('show')
})
