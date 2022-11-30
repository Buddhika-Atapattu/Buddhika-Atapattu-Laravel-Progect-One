$(document).ready(function(){

//    image preview
    $('#home_slide').change(function(){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImage").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
        else{
            $("#previewImage").attr("src", '{{asset("image/homeSlide/noimage.jpg")}}');
        }
    });
//    end image preview

//    change video url to preview
    var currentVideoURL = $('#video_url').val();
    
    var replaceCV = currentVideoURL.replace("watch?v=", "embed/");
    
    $("#videoPreview").attr("src", replaceCV);
    

//    video preview
    $('#video_url').change(function(){
        
//        typed link
        var videoURL = $('#video_url').val();
        
        var regExp =/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        
        var videoId = videoURL.match(regExp)[1];
        
//        alert(id);
        
         
        if(videoURL !== ""){
            
            var embedUrl = 'https://www.youtube.com/embed/'+videoId;
            
//            var replaceURL = $('#video_url').val().replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/");
            
            $("#videoPreview").attr("src", embedUrl);
        }
        else{
            $("#videoPreview").attr("src", "https://www.youtube.com/embed/wjt9rpF1c9M");
        }
        
    });
//    end video preview
});