$(document).ready(function(){
    
    $('#customCheck1').click(function(){
        if ($(this).is(':checked')) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
        }
    });
    
//    $('form').validate();
    
    $('#show_password').on('click',function(){
//                alert('working');
        if($('#icon').hasClass('fa-eye')){
            $('#password').attr('type','text');
            $('#icon').removeClass('fa-eye');
            $('#icon').addClass('fa-eye-slash');
        }
        else{
            $('#password').attr('type','password');
            $('#icon').addClass('fa-eye');
            $('#icon').removeClass('fa-eye-slash');
        }

    });

    $('#show_password_confirmation').on('click',function(){
//                alert('working');
        if($('#pc_icon').hasClass('fa-eye')){
            $('#password_confirmation').attr('type','text');
            $('#pc_icon').removeClass('fa-eye');
            $('#pc_icon').addClass('fa-eye-slash');
        }
        else{
            $('#password_confirmation').attr('type','password');
            $('#pc_icon').removeClass('fa-eye-slash');
            $('#pc_icon').addClass('fa-eye');
        }

    });

//    image preview jquery
//    $('#profile_image').change(function(e){
//        var reader = new FileReader();
//        reader.onload =function(e){
//            $('#previewImage').attr('src',e.target.result);
//        };
//        reader.readAsDataURL(e.target.files['0']);
//    });
    

    

});