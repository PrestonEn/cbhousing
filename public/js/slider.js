/* 
	Slider.js 
	James Earle.
*/

(function(){
    // do some stuff
    setTimeout(function () {
        if( $('.slider').css('opacity') == 0) {
        	$('.slider').animate({'opacity':'1'},500);       
        }
    }, 5000);	
})();