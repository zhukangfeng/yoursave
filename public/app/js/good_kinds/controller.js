$(function() {
    $(document)
        .on ('click', '.container-fluid .form-horizontal .parent-seach .search-btn .btn', function () {
            $.ajax({
                url: '/good_kinds/search',
                data: {
                    good_kind_key: $('.container-fluid .form-horizontal .parent-seach input[name=good_kind_key]').val(),
                    can_has_children: true
                },
                success: function(_data) {
                    var appendHtml = '';
                    var data = JSON.parse(_data);
                    if (data.length == 0) {
                        $.alert(messages.errors.no_good_kind_data);
                        return;
                    }
                    for (var i = 0; i < data.length; i++) {
                        appendHtml = appendHtml + '<label class="parent-info">'
                            + '<input type="radio" name="parent" value="'
                            + data[i].id
                            + '">'
                            + data[i].name
                            + '</label>';
                    }
                    $('.container-fluid .form-horizontal .parent-good-kind-list').empty();

                    $('.container-fluid .form-horizontal .parent-good-kind-list').append(appendHtml);
                }
            })
            .fail(function() {
                alert("error");
            });            
        })

        ;
})