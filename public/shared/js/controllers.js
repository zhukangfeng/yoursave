$language = $('html').attr('lang');

$(".image-upload input[type=file].multi-file-upload").fileinput({
    language: $language,
    uploadUrl: '#', // you must set a valid URL here else you will get an error
    allowedFileTypes : ['image'],
    overwriteInitial: false,
    maxFileSize: 1000,
    maxFilesNum: 10,
    //allowedFileTypes: ['image', 'video', 'flash'],
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});

$(".file-upload input[type=file].multi-file-upload").fileinput({
    language: $language,
    uploadUrl: '#', // you must set a valid URL here else you will get an errorp
    overwriteInitial: false,
    maxFileSize: 1000,
    maxFilesNum: 10,
    //allowedFileTypes: ['image', 'video', 'flash'],
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});

$(".date input[type=text].full-date").datepicker({
    format: "yyyy-mm-dd",
    todayBtn: true,
    language: $language,
    todayHighlight: true
});

$(".datetime input[type=text].full-datetime").datetimepicker({
    format: "yyyy-mm-dd HH:ii:ss",
    autoclose: true,
    todayBtn: true,
    language: $language,
    todayHighlight: true
});


$.extend({
    dialog: function(strMessage) {
        $('#dialog.inner-window').remove();

        return $dialog = $('<aside id="dialog" class="inner-window" />')
            .append( $('<div class="dialog-contents" />')
                .append( $('<p class="dialog-message" />').html( strMessage))
                .append( '<ul class="btn-area" />')
            )
        ;
    }
,
    alert: function(strMessage, func) {

        alert(strMessage);
        func;
        return;

        var $alert = $.dialog( strMessage );

        $('.btn-area', $alert )
            .append( '<li class="close btn"><span>' + commonMessages.buttons.close + '</span></li>' )
        ;


        $('body' ).append( $alert.show() );

        var objWindow = $.getWindowSize(),
            numPositionTop = ( objWindow.height - $alert.outerHeight() ) / 2,
            numPositionLeft = ( objWindow.width - $alert.outerWidth() ) / 2
        ;

        $alert.css({
                    top: numPositionTop,
                    left: numPositionLeft
                });

        $('.close.btn', $alert ).click( func );
    }
,
    confirm: function(strMessage, funcTrue, funcFalse) {
        var result = confirm(strMessage);
        if (result) {
            funcTrue;
        } else {
            funcFalse;
        }
        return;

        var $confirm = $.dialog( strMessage );

        if ( numPositionTop < 0 ) {
            numPositionTop = 0;
        }

        if ( numPositionLeft < 0 ) {
            numPositionLeft = 0;
        }

        $('.btn-area', $confirm )
            .append( '<li class="no btn"><span>' + commonMessage.buttons.yes + '</span></li>' )
            .append( '<li class="yes btn"><span>' + commonMessage.buttons.no + '</span></li>' )
        ;

        $('body' ).append( $confirm.show() );

        var objWindow = $.getWindowSize(),
            numPositionTop = ( objWindow.height - $confirm.outerHeight() ) / 2,
            numPositionLeft = ( objWindow.width - $confirm.outerWidth() ) / 2
        ;

        $confirm.css({
                    top: numPositionTop,
                    left: numPositionLeft
                });

        $('.yes.btn', $confirm ).click( funcTrue );
        $('.no.btn', $confirm ).click( funcFalse );
    }
,
    getWindowSize: function() {
        var objWindow = {
            width: window.innerWidth || $(window).width(),
            height: window.innerHeight || $(window).height()
        };
        return objWindow;
    }

})
