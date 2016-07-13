jQuery(window).on('scroll', function(){
	var app=jQuery("#primary").offset();
	app=app['top'];
	var cur=jQuery(window).scrollTop();
	if(cur>app){
		jQuery("#toTop").css('opacity',1);		
	}
	else{
		jQuery("#toTop").css('opacity',0);
	}
});

jQuery(window).load(function(){
	jQuery('#toTop').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});
})

jQuery(function($) {		
	function checkFooter() {
		var windowH = $(window).height(),
			ducumentH = $('header').height() + $('#primary').height() + $('.footer-wrapper').height(),
			footer = $('.footer-wrapper');
		if (ducumentH < windowH) {
			footer.addClass("fixed");
		} else {
			footer.removeClass("fixed");
		}
	}
	$(window).on("load resize", function () {
		checkFooter();
	});
});