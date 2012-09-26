$(function() {

    $.get('news/index', function(o) {

        alert(1);
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<div>' + o.text + '</div>');
        }

    }, 'json');

    $('#randomInsert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function(o) {

        });

        return false;
    });
});