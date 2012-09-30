$(document).ready(function() {
    $.ajax({
        url: "http://myengine/news/select",
        type: "get",
        dataType: "json",
        success: function(o) {
            for (var i = 0; i < o.length; i++) {
                $('#listInserts').append(
                    '<tr>' +
                        '<td>' + o[i].id + '</td>' +
                        '<td>' + o[i].title + '</td>' +
                        '<td>' + o[i].text + '</td>' +
                        "<td><a href='http://myengine/news/delete/" +  o[i].id + "'>Удалить</a></td>" +
                    '</tr>'
                );
            }
        }
    });

    $("#news_form").validate({
        rules:{
            title:{
                required: true,
                minlength: 4,
                maxlength: 30,
            },
            text:{
                required: true,
                minlength: 20,
            },
        },
        messages:{
            title:{
                required: "Это поле обязательно для заполнения",
                minlength: "Тема новости должна быть минимум 4 символа",
                maxlength: "Максимальное число символов - 30",
            },
            text:{
                required: "Это поле обязательно для заполнения",
                minlength: "Содержание новости должно быть минимум 20 символов",
            },
        }
    });
});