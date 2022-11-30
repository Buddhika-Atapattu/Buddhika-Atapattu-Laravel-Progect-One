$(document).ready(function(){
    $('#search').on('keyup', function(){
        var search = $('#search').val();
        var length = search.length;
        
        if(length !== 0){
            $('.search-container-row').css({'display':'flex'});
            
            $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search':search},
                    success:function(data){
                        $('.search-container').html(data);
                    }
            });
        }
        else{
            $('.search-container-row').css({'display':'none'});
        }
    });
});