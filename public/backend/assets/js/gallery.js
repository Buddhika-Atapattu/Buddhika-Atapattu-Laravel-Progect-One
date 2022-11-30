$(document).ready(function(){
    $('#refresh').click(function(){
        location.reload(true);
    });
    
    function list_image()
    {
        $.ajax({
            url:"/image/fetch",
            success:function(data){
                $('#preview').html(data);
            }
        });
    }
    
});