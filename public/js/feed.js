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

$('#modal-repost').on('submit', function (e) {
    e.preventDefault();
    repost('modal-repost', null); 
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

function repost(formId, post_id = null) {
    const form = document.getElementById(formId);
    const formData = new FormData(form);

    if (post_id !== null) {
        formData.append('post_id', post_id);
    }

    $.ajax({
        url: form.action,
        method: form.method,
        data: formData,
        processData: false, 
        contentType: false, 
        success: function(response) {
            $("#modal-repost").modal('hide')
            window.location.href = '/';
        },
        error: function(xhr) {
            console.error('Erro no repost:', xhr.responseText);
        }
    });
}




function openModalToRepost(element, post_id) {
    let $postContent = $(element).closest('.post').clone();

    let html_reply = `
        <div class="d-flex flex-column">
            <div class="d-flex">
                <strong class="area-icon me-2">${$postContent.find('.area-icon').html()}</strong>
                <span class="name">${$postContent.find('.name').html()}</span>
                <span class="username text-muted ms-2" style="color: #71767b">${$postContent.find('.username').html()}</span>
                <div class="time" style="color: #71767b">${$postContent.find('.time').html()}</div>
                <input type="hidden" name="post_id" value="${post_id}">
            </div>

            <div class="parent-content mt-3">
                ${$postContent.find('.content').html()}
            </div>
        </div>
    `;


    $('#modal-repost .modal-body .content').html(html_reply);
    $('#modal-repost').modal('show');
}
