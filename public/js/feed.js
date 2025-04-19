$('#input-post').on('input', function () {
    let hasText = $(this).val().trim().length > 0;
    $("#postBtn").attr('disabled', !hasText);


    $(this).css('height', 'auto'); 
    $(this).css('height', this.scrollHeight + 'px'); 
});
