$(function(){ // document ready
	if (!!$('#site-navigation-wrap').offset()) { // make sure ".sticky" element exists
		var stickyTop = $('#site-navigation-wrap').offset().top; // returns number 
		$(window).scroll(function(){ // scroll event

			var windowTop = $(window).scrollTop(); // returns number 
			if (stickyTop < windowTop){
					$('#site-navigation-wrap').css({ position: 'fixed', top: 0, width: '100%' });
					$('#site-navigation-wrap').addClass('is-stuck');
					navTopHeight = $('#site-navigation-wrap').outerHeight();
					$('.content').css('margin-top',navTopHeight);

			}else{
				$('#site-navigation-wrap').removeAttr('style');
				$('#site-navigation-wrap').removeClass('is-stuck');
				$('.content').css('margin-top','0');
			};
		});
	};
});