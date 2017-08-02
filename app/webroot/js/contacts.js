$('#our_post').hover(function () {
    $(this).prev().removeClass('fa-envelope').addClass('fa-envelope-open');
}, function(){
    $(this).prev().removeClass('fa-envelope-open').addClass('fa-envelope');
});

$('#feedback_btn').click(function(){
    var nameVal = $('#name').val();
    var emailVal = $('#email').val();
    var messageVal = $('#message').val();

    $.ajax({
        type: 'post',
        url: '/handleContactsForm',
        dataType: 'json',
        data: { name: nameVal, email: emailVal, message: messageVal }
    }).done(function ( response ) {
        if (response.success){
            $('.feedback-wrapper .alert').removeClass('alert-danger')
                .addClass('alert-success')
                .text('Ваше сообщение успешно отправлено!')
                .append('<i class="fa fa-remove" style="float: right;"></i>')
                .slideDown('slow');
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
        }
        else{
            $('.feedback-wrapper .alert').removeClass('alert-success')
                .addClass('alert-danger')
                .text('При отправке сообщения произошла ошибка!')
                .append('<i class="fa fa-remove" style="float: right;"></i>')
                .slideDown('slow');
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
        }
    }).fail(function () {
        $('.feedback-wrapper .alert').removeClass('alert-success')
            .addClass('alert-danger')
            .text('При отправке сообщения произошла ошибка!')
            .append('<i class="fa fa-remove" style="float: right;"></i>')
            .slideDown('slow');
        $('#name').val('');
        $('#email').val('');
        $('#message').val('');
    });
});

$(document).ready(function () {
    $(document).on('click', '.fa-remove', function () {
        $(this).parent().removeClass('alert-success alert-danger').text('').slideUp('slow');
    })
});
