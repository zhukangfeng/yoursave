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
    format: "yyyy/mm/dd",
    todayBtn: true,
    language: $language,
    todayHighlight: true
})