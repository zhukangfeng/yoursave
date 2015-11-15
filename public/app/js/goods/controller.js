$(function() {
    $(document)
        .on ('click', '.container-fluid .form-horizontal .good-kind-seach .search-btn .btn', function () {
            $.ajax({
                url: '/good_kinds/search',
                data: {
                    good_kind_name: $('.container-fluid .form-horizontal .good-kind-seach input[name=good_kind_search_key]').val()
                },
                success: function(_data) {
                    var appendHtml = '';
                    var data = JSON.parse(_data);
                    if (data.length == 0) {
                        $.alert(messages.errors.no_good_kind_data);
                        return;
                    }

                    for (var i = 0; i < data.length; i++) {
                        appendHtml = appendHtml + '<label class="good-kind-info">'
                            + '<input type="radio" name="good_kind" value="'
                            + data[i].id
                            + '">'
                            + data[i].name
                            + '</label>';
                    }
                    $('.container-fluid .form-horizontal .good-kind-list').empty();

                    $('.container-fluid .form-horizontal .good-kind-list').append(appendHtml);
                }
            })
            .fail(function() {
                alert("error");
            });            
        })

        .on ('click', '.container-fluid .form-horizontal .good-kind-seach .create-btn .btn', function () {
            var newTab = window.open('/good_kinds/create');
            newTab.focus();
        })


        ;
})