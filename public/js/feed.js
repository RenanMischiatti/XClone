$('#input-post').on('input', function () {
    let hasText = $(this).val().trim().length > 0;
    $("#postBtn").attr('disabled', !hasText);


    $(this).css('height', 'auto'); 
    $(this).css('height', this.scrollHeight + 'px'); 
});

$("#send-post").on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: $(this).serialize(),
        success: function(response) {
            console.log('Post enviado com sucesso:', response);
        },
        error: function(xhr) {
            console.error('Erro ao enviar o post:', xhr.responseText);
        }
    });
});

function getPosts(paginate = 1) {
    let route = $('#posts').data("getPostRoute"); 

    $.ajax({
        url: route + '?page=' + paginate,
        method: 'GET',
        success: function(response) {
            
            $('#posts').html(''); // Limpa a div antes
            response.data.forEach(post => {
                $('#posts').append(`
                    <div class="post">
                        <p>${post.conteudo}</p>
                        <small>Postado por: ${post.user.name}</small>
                    </div>
                `);
            });

            // Atualização de paginação pode ser feita aqui também se necessário
        },
        error: function(xhr) {
            console.error('Erro ao carregar posts:', xhr.responseText);
        }
    });
}
