$(document).ready(function(){
    var options = {
        target: "#output",
        timeout: 3000 // тайм-аут
};
$("#myForm").validate({
    submitHandler: function(form) {
        $(form).ajaxSubmit(options);
    },
    focusInvalid: false,
    focusCleanup: true,
    rules: {
        Name: {
            required: true,
            minlength: 2,
            maxlength: 12
        },
        Email: {
            required: true,
            email: true
        },
        Examine: {
            required: true,
            equal: 13
        }
    },
    messages: {
        Name: {
            required: "Укажите свое имя!",
            minlength: "Не менее 2 символов",
            maxlength: "Не более 12 символов"
        },
        Email: {
            required: "Нужно указать email адрес",
            email: "Нужен корректный email адрес!"
        },
        Examine: {
            required: "Надо решить этот пример!",
            equal: "Вы в школе учились?"
        }
    }

    });

});

