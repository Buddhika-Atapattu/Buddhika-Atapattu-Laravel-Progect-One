$(document).ready(function(){

    $('#animation_style').change(function(){
//        get selected option value
        var curStyleID = parseInt($('#animation_style :selected').val());
        
//        horizontal animation
        
        if(curStyleID === 1){
            $('#horizontal_animation').css({'display':'block'});
            $('#cube_animation').css({'display':'none'});
        }
        
        if(curStyleID === 2){
            $('#horizontal_animation').css({'display':'none'});
            $('#cube_animation').css({'display':'block'});
        }
        
//        display image section
        $('#image_section').css({'display':'block'});
        
        $("#file_images").val(null);//clear file selection
        
        $('#file_images').bind('change',function(){
            
//            get selected file count
            var file_length = parseInt($('#file_images')[0].files.length);
//            alert(curStyleID);
            
//            check image count 10 and selecte option horizontal animation
            if((curStyleID === 1) && (file_length === 10)){
                $("#alertdiv").addClass("d-none");
                $("#alertdiv").removeClass("d-flex");
                
//                image preview for horizontal animation
                for(var i=0;i<file_length;i++){
                    
                    $('#image_preview').append("<div class='col-3'><img class='preview-image' src='"+URL.createObjectURL(event.target.files[i])+"'></div><br>");
                }
            }
            else{
//                check image count 6 and selected option cube animation
                if((curStyleID === 2) && (file_length === 6)){
                    $("#alertdiv").addClass("d-none");
                    $("#alertdiv").removeClass("d-flex");
                    
//                    image preview for cube animation
                    for(var i=0;i<file_length;i++){
                    
                        $('#image_preview').append("<div class='col-3'><img class='preview-image' src='"+URL.createObjectURL(event.target.files[i])+"'></div><br>");
                    }

                }
                else{
//                    check whether selected option horizontal animation and image count not equal to 10
                    if((curStyleID === 1) && (file_length !== 10)){
                        $("#file_images").val(null);//clear file selection
                        $("#alertdiv").removeClass("d-none");
                        $("#alertdiv").addClass("d-flex");
                        var msg = "After selected horizontal rotate animated slider, please select 10 images!";
                        $("#alertdiv").html("<p class='text text-denger'>"+msg+"</p>");
                        $("#alertdiv").addClass("alert alert-danger");
//                        refresh the page after 3s
                        setTimeout(function(){
                            location.reload(true);
                        }, 3000);
                    }
//                    check whether selected option cube animation and image count not equal to 6
                    else{
                        $("#file_images").val(null);//clear file selection
                        $("#alertdiv").removeClass("d-none");
                        $("#alertdiv").addClass("d-flex");
                        var msg = "After selected cube rotate animated slider, please select 6 images!";
                        $("#alertdiv").html("<p class='text text-denger'>"+msg+"</p>");
                        $("#alertdiv").addClass("alert alert-danger");
//                        refresh the page after 3s
                        setTimeout(function(){
                            location.reload(true);
                        }, 3000);
                    }
                }
                
            }
            
            
            
        });
//        select images
          
    });
//    select animation
    
});
//document
