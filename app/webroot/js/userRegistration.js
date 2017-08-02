$('#reg-btn').click(function () {
    var nameVal = $('#UserName').val();
    var emailVal = $('#UserEmail').val();
    var loginVal = $('#UserLogin').val();
    var passwordVal = $('#UserPassword').val();

    var data = { name: nameVal, email: emailVal, login: loginVal, password: passwordVal };

    $.ajax({
        type: "POST",
        url: '/users/add',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify(data),
        success: function ( data ) {
            $('#UserName').val('');
            $('#UserEmail').val('');
            $('#UserLogin').val('');
            $('#UserPassword').val('');
            $('#passwordRepeat').val('');

            if(data.result == 'success'){
                $('#result').show('slow')
                            .addClass('alert alert-success')
                            .text('Поздравляем! Вы успешно зарегистрированы!');
                setTimeout(function () {
                    $('#result').hide('slow')
                        .removeClass('alert alert-success')
                        .text('');
                    location.href = '/home'
                }, 3000);

            }
            if(data.result == 'error'){
                $('#result').show('slow')
                            .addClass('alert alert-danger')
                            .text('Ошибка регистрации!');
                setTimeout(function () {
                    $('#result').hide('slow')
                        .removeClass('alert alert-danger')
                        .text('');
                }, 3000);
            }
        },
        error: function () {
            $('#result').show('slow')
                .addClass('alert alert-danger')
                .text('Ошибка регистрации!');
            setTimeout(function () {
                $('#result').hide('slow')
                    .removeClass('alert alert-danger')
                    .text('');
            }, 3000);
        }
    });
});

$('#logout-btn').click(function () {
    window.location.href = '/users/logout';
});

$('.add-to-bucket-btn').click(function () {
    var productIdVal = $(this).prev().val();
    $.ajax({
        type: "post",
        url: "/bucket/add",
        data: JSON.stringify({productId: productIdVal}),
        success: function () {
            alert("Товар добавлен в корзину!");
        }
    });
});