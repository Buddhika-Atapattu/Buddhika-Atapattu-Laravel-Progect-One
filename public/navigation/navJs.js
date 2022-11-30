//navigation bar scroll function
$(document).ready(function(){
    
//    scroll top
    $('html,body').animate({ scrollTop: 0 });
    
//    dropdown menu
    $('#dropdown_menu_container').hide();
    
    $('.dropdown').click(function(){
        $('.dropdown-menu-container').slideToggle();
        $('.dropdown-menu-container').show();
    });
    
    
//    navigationa bar scroll animation
    var preScroll = $(document).scrollTop();
    
    var navHeight = $('.navbar-header').outerHeight();
    
    var mobileNavHeight = $('.mobile-navbar').outerHeight();
    
//    alert(mobileNavHeight);
    
    $(window).scroll(function(){
        var scrolled = $(document).scrollTop();
        
        if((scrolled <= navHeight) || (scrolled <= mobileNavHeight)){
//            desktop view
            $('.nav-brand').css({'height':'auto','position':'relative'});
            $('.navebar-header').css({'position':'relative'});
            $('.navbar-item').css({'height':'auto','position':'relative'});
            $('.navbar-item').removeClass('bg-dark-blue');
            $('.dropdown-menu-container').removeClass('dropdown-scroll');
            
//            mobile view
            $('.mobile-navbar').css({'position':'relative'});
            $('.mobile-menu-row').css({'position':'relative','top':'0','left':'0','padding-top':'0.25rem','padding-bottom':'0.25rem'});
            $('.mobile-menu-row').removeClass('bg-dark-blue');

        }
        else{
            
            if(preScroll < scrolled){
//                desktop view
                $('.nav-brand').css({'height':'0','position':'fixed'});
                $('.navebar-header').css({'position':'fixed','height':'0'});
                $('.navbar-item').css({'height':'0','position':'fixed','padding-top':'0','padding-bottom':'0'});
                $('.nav-item').removeClass('bg-dark-blue');
                $('.dropdown-menu-container').removeClass('dropdown-scroll');
                $('.dropdown-menu-container').css({'display':'none'});
                
//                mobile view
                $('.mobile-navbar').css({'position':'fixed','top':'-100%'});
                $('.mobile-menu-row').css({'position':'fixed','top':'-100%','left':'0','padding-top':'0','padding-bottom':'0'});
                $('.mobile-menu-row').removeClass('bg-dark-blue');
                
                
            }
            else{
//                desktop view
                $('.nav-brand').css({'height':'0','position':'fixed'});
                $('.navebar-header').css({'position':'fixed'});
                $('.navbar-item').css({'height':'auto','position':'fixed','padding-top':'1rem','padding-bottom':'1rem','left':'0'});
                $('.navbar-item').addClass('bg-dark-blue');
                $('.dropdown-menu-container').addClass('dropdown-scroll');
                
//                mobile menu
                $('.mobile-navbar').css({'position':'fixed','top':'-100%'});
                $('.mobile-menu-row').css({'position':'fixed','top':'0','left':'0','padding-top':'10px','padding-bottom':'10px'});
                $('.mobile-menu-row').addClass('bg-dark-blue');
                
                
            }
        }
       
        preScroll = $(document).scrollTop();
    });

//    nav item triangle style
    
    var currentPage = window.location.pathname;// get current url
    
//    home page
    if(currentPage === '/'){
        $('.home').css({'display':'block','width':'100%'});
        
        $('.home-text').mouseover(function(){
            $('.home').css({'display':'block','width':'100%'});
        });
        $('.home-text').mouseout(function(){
            $('.home').css({'display':'block','width':'100%'});
        });
        
    }

//    blog page
    if(currentPage === '/blog'){
        $('.blog').css({'display':'block','width':'100%'});
        
        $('.blog-text').mouseover(function(){
            $('.blog').css({'display':'block','width':'100%'});
        });
        $('.blog-text').mouseout(function(){
            $('.blog').css({'display':'block','width':'100%'});
        });
        
    }
    
    
    var parts = currentPage.split('/');
    var lastSegment = parts.pop() || parts.pop();
//    alert(lastSegment);
    
    if(currentPage === '/view/blog/'+lastSegment){
        $('.blog').css({'display':'block','width':'100%'});
        
        $('.blog-text').mouseover(function(){
            $('.blog').css({'display':'block','width':'100%'});
        });
        $('.blog-text').mouseout(function(){
            $('.blog').css({'display':'block','width':'100%'});
        });
        
    }
//    about us
    if(currentPage === '/about'){
        
        $('.about').css({'display':'block','width':'100%'});
        
        $('.about-text').mouseover(function(){
            $('.about').css({'display':'block','width':'100%'});
        });
        $('.about-text').mouseout(function(){
            $('.about').css({'display':'block','width':'100%'});
        });
        
    }
//    contact us
    if(currentPage === '/contact'){
        $('.contact').css({'display':'block','width':'100%'});
        
        $('.contact-text').mouseover(function(){
            $('.contact').css({'display':'block','width':'100%'});
        });
        $('.contact-text').mouseout(function(){
            $('.contact').css({'display':'block','width':'100%'});
        });
        
    }
//    shop us
    if(currentPage === '/shop'){
        $('.shop').css({'display':'block','width':'100%'});
        
        $('.shop-text').mouseover(function(){
            $('.shop').css({'display':'block','width':'100%'});
        });
        $('.shop-text').mouseout(function(){
            $('.shop').css({'display':'block','width':'100%'});
        });
        
    }
    
//    small screen navigation bar
    $('.fa-toggle-off').click(function(){
        $('.mobile-menu-item-container').css({'right':'0%','visibility':'visible','opacity':'1'});
        $('.mobile-menu-item-sub-container').css({'right':'0%','visibility':'visible','opacity':'1'});
    });
    $('.fa-toggle-on').click(function(){
        $('.mobile-menu-item-container').css({'right':'-100%','visibility':'hidden','opacity':'0'});
        $('.mobile-menu-item-sub-container').css({'right':'-100%','visibility':'hidden','opacity':'0'});
    });

});