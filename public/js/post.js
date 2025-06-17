$('#input-post').on('focus', function () {
        $(this).parent().addClass('flex-column');
});

function loadComments(post_id) {

    let route = $('#comments').data('route-get-post')

    $.ajax({
        url: route,
        method: 'GET',
        beforeSend: function() {
            $("#comments").empty();
            $("#comments").append(loading);
        },
        success: function(response) {
            $("#comments").append(response);
        },
        complete: function() {
            $("#loading").remove();
        }
    });
}