/* 
	Slider.js 
	James Earle.
*/
setTimeout( function () {
    if( $('.slider').css('opacity') == 0) {
    	$('.slider').animate({'opacity':'1'},500);       
    } else {
    	$('.slider').animate({'opacity':'0'},500);       
    }
}, 3000);