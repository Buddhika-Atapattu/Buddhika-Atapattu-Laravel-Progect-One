$(document).ready(function(){
    //    video preview
    $('#video_url').change(function(){
        
//        typed link
        var videoURL = $('#video_url').val();
        
        var regExp =/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        
        var videoId = videoURL.match(regExp)[1];
        
//        alert(id);
        
         
        if(videoURL !== ""){
            
            var embedUrl = 'https://www.youtube.com/embed/'+videoId;
            
            var replaceURL = $('#video_url').val().replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/");
            
            $("#videoPreview").attr("src", embedUrl);
        }
        else{
            $("#videoPreview").attr("src", "https://www.youtube.com/embed/wjt9rpF1c9M");
        }
        
    });
//    end video preview

    $('#images').bind('change',function(){
            
//        get selected file count
        var file_length = parseInt($('#images')[0].files.length);
//        alert(file_length);
        for(var i=0;i<file_length;i++){
            $('#previewImages').append("<div class='col-3'><img class='preview-image' src='"+URL.createObjectURL(event.target.files[i])+"'></div><br>");
        }
    });
//        select images
});

