$(document).ready(function () {
    /*$.validator.addMethod("email", function (value, element) {
        return /^\w+@[a-zA-Z]+\.[a-zA-Z]+$/.test(value)
    }, "После знака @ могут быть только латинские буквы и одна точка");*/

    $.validator.addMethod("login", function (value, element) {
        return /^[a-zA-Z]+$/.test(value)
    }, "Логин может содержать не более 6 символов - только латинских букв");

    $.validator.addMethod("password", function (value, element) {
        return /^[a-zA-Z0-9]+$/.test(value)
    }, "Пароль может содержать только латинские буквы и цифры");

    $.validator.addMethod("passwordRepeat", function (value, element) {
        return $('#password').val() === value
    }, "Пароли не совпадают");
    
    $('#registrationForm').validate({
            onkeyup: function(element) {
                $(element).valid()
            },
            rules: {
                surname:{
                    required: true
                },
                name:{
                    required: true
                },
                email: {
                    email: true,
                    required: true
                },
                login: {
                    login: true,
                    required: true,
                    maxlength: 6
                },
                password: {
                    required: true,
                    minlength: 6,
                    password: true
                },
                passwordRepeat: {
                    required: true,
                    passwordRepeat: true
                }
            },
            messages: {
                surname:{
                    required: "Это поле является обязательным"
                },
                name:{
                    required: "Это поле является обязательным"
                },
                email:{
                    required: "Это поле является обязательным"
                },
                login: {
                    required: "Это поле является обязательным",
                    maxlength: "Максимальная длинна логина - 6 символов"
                },
                password: {
                    required: "Это поле является обязательным",
                    minlength: "Минимальная длинна пароля - 6 символов"
                },
                passwordRepeat: {
                    required: "Это поле является обязательным"
                }
            }
        }
    );
});

/*$("#reg-btn").click(function () {
    document.referrer = location.href;
});*/

/*$(document).ready(function () {

    $('#email').change(function () {
        if (!/^\\w{1,50}@[a-zA-Z]{1,}.{1,}]+$/.test($(this).val())){
            $(this).next().text("После знака @ могут быть только латинские буквы и одна точка");
            $(this).next().show();
        }
        else {
            $(this).next().hide();
        }
    });

    $('#login').keypress(function () {
        if (!/^[a-zA-Z]{1,6}$/.test($(this).val())){
            $(this).next().text("Логин может содержать не более 6 символов - только латинских букв");
            $(this).next().show();
        }
        else {
            $(this).next().hide();
        }
    });

    $('#password').keypress(function () {
        if (!/^[a-zA-Z0-9]{6,}$/.test($(this).val())){
            $(this).next().text("Пароль может содержать только латинские буквы и цифры");
            $(this).next().show();
        }
        else {
            $(this).next().hide();
        }
    });

    $('#passwordRepeat').keypress(function () {
        if ($(this).val() !== $('#password').val()){
            $(this).next().text("Пароли не совпадают");
            $(this).next().show();
        }
        else {
            $(this).next().hide();
        }
    });

});*/
