$('#changeSignUp, #changeSignIn').on('click', function(e) {
    e.preventDefault();

    if ($(this).attr('id') === 'changeSignUp') {
        $("#divSignIn").slideUp('fast', function() {
            $("#divSignUp").slideDown('slow');
        });
    } else if ($(this).attr('id') === 'changeSignIn') {
        $("#divSignUp").slideUp('fast', function() {
            $("#divSignIn").slideDown('slow');
        });
    }
});
