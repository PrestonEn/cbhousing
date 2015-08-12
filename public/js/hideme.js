$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            var subtractor;
            if($(window).height() <= 600) {
                subtractor = 0;
            } else {
                subtractor = 125;
            }

            /* If the object is completely visible in the window, fade it */
            if( bottom_of_window > (bottom_of_object - subtractor) ){
                $(this).animate({'opacity':'1'},500);       
            }
        }); 
    });
});