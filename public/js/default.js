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
                    '</tr>'
            );
        }
    }
});