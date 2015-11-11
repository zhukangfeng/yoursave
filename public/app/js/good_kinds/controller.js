$(function() {
    $(document)
        .on ('click', '.container-fluid .form-horizontal .parent-seach label.btn', function () {
            $.ajax({
                url: '/good_kinds/search',
                data: {
                    good_kind_name: $('.container-fluid .form-horizontal .parent-seach input[name=parent_search_name]').val()
                },
                success: function(_data) {
                    var appendHtml = '';
                    var data = JSON.parse(_data);
                    for (var i = 0; i < data.length; i++) {
                        appendHtml = appendHtml + '<label class="parent-info">'
                            + '<input type="radio" name="parent" value="'
                            + data[i].id
                            + '">'
                            + data[i].name
                            + '</label>';
                    }
                    $('.container-fluid .form-horizontal .parent-seach .parent-info').remove();

                    $('.container-fluid .form-horizontal .parent-seach').append(appendHtml);
                }
            })
            .fail(function() {
                alert("error");
            });            
        })

        ;
})