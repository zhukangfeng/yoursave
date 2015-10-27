var fileUpload = function ($fileArea, $fileDisplayArea, callback) {
    url = 'api/file/uploadurl';
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(authData) {

        }
    })

    $fileArea.find($(".file-upload input[type=file].multi-file-upload")).fileinput({
        language: $language,
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        slugCallback: callback
    });
}
var imageFileUpload = function ($fileArea, $fileDisplayArea, callback) {
    $fileArea.find($(".file-upload input[type=file].multi-file-upload")).fileinput({
        language: $language,
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: callback
    });
}