$(function() {
    $(document)
        .on ('click', '.container-fluid .form-horizontal .good-name-seach .search-btn .btn', function () {
            $.ajax({
                url: '/goods/search',
                data: {
                    good_name: $('.container-fluid .form-horizontal .good-name-seach input[name=good_kind_search_key]').val()
                },
                success: function(_data) {
                    var appendHtml = '';
                    var data = JSON.parse(_data);
                    if (data.length == 0) {
                        $.alert(messages.errors.no_good_kind_data);
                        return;
                    }

                    for (var i = 0; i < data.length; i++) {
                        appendHtml = appendHtml + '<label class="good-info">'
                            + '<input type="radio" name="good_id" value="'
                            + data[i].id
                            + '">'
                            + data[i].name
                            + '</label>';
                    }
                    $('.container-fluid .form-horizontal .good-list').empty();

                    $('.container-fluid .form-horizontal .good-list').append(appendHtml);
                }
            })
            .fail(function() {
                alert("error");
            });            
        })

        .on ('click', '.container-fluid .form-horizontal .shop-name-seach .search-btn .btn', function () {
            $.ajax({
                url: '/shops/search',
                data: {
                    shop_name: $('.container-fluid .form-horizontal .shop-name-seach input[name=shop_kind_search_key]').val()
                },
                success: function(_data) {
                    var appendHtml = '';
                    var data = JSON.parse(_data);
                    if (data.length == 0) {
                        $.alert(messages.errors.no_shop_kind_data);
                        return;
                    }

                    for (var i = 0; i < data.length; i++) {
                        appendHtml = appendHtml + '<label class="shop-info">'
                            + '<input type="radio" name="shop_id" value="'
                            + data[i].id
                            + '">'
                            + data[i].name
                            + '</label>';
                    }
                    $('.container-fluid .form-horizontal .shop-list').empty();

                    $('.container-fluid .form-horizontal .shop-list').append(appendHtml);
                }
            })
            .fail(function() {
                alert("error");
            });            
        })

        .on ('click', '.container-fluid .form-horizontal .good-name-seach .create-btn .btn', function () {
            var newTab = window.open('/goods/create');
            newTab.focus();
        })

        .on ('click', '.container-fluid .form-horizontal .shop-name-seach .create-btn .btn', function () {
            var newTab = window.open('/shops/create');
            newTab.focus();
        })


        ;
})