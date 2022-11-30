$(document).ready(function(){
//    image preview
    $('#file').bind('change',function(){
        var file_length = parseInt($('#file')[0].files.length);
        $('#preview').append("<div class='row'><div class='col-12 d-flex justify-content-center'><img class='preview-image' src='"+URL.createObjectURL(event.target.files[0])+"'></div></div>"); 
    });

});