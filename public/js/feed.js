var loading = `
    <div class="w-100 d-flex justify-content-center mt-3" id="loading">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> 
`;

$('#input-post').on('input', function () {
    let hasText = $(this).val().trim().length > 0;
    $("#postBtn").attr('disabled', !hasText);


    $(this).css('height', 'auto'); 
    $(this).css('height', this.scrollHeight + 'px'); 
});

$("#send-post").on('submit', function(e) {
    e.preventDefault();
    const form = this;

    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: $(form).serialize(),
        beforeSend: function() {
            $("#postBtn").attr("disabled", true).html(`
                <div class="spinner-border text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            `);
        },
        success: function(response) {
            if (response.type === 'comment') {
                loadComments(response.comments)
                return;
            }
            startPage();
        },
        complete: function() {
            $("#postBtn").attr("disabled", false).html("Post");
            form.reset();
        }
    });
});

startPage();
function startPage() {
    $('#posts').empty();
    getPosts();
}

function getPosts(paginate = 1) {
    
    let route = $('#posts').data("getPostRoute"); 
    $.ajax({
        url: route + '?page=' + paginate,
        method: 'GET',
        beforeSend: function() {
            $("#posts").append(loading);
        },
        success: function(response) {
            $("#posts").append(response);
        },
        complete: function() {
            $("#loading").remove();
        }
    });
}

function openThread(url) {
    window.location.href = url;
}