
jQuery(document).ready(function($) {

	"use strict";

	// Mobile Menu
    $('#nav').slicknav({
    	prependTo: 'body',
    	label: '',
    	allowParentLinks: 'true',
		closedSymbol: '<i class="fa fa-caret-down"></i>',
		openedSymbol: '<i class="fa fa-caret-up"></i>'
    });

	$('.portfolio-filter a').click(function(e) {
		if( $('body').hasClass('tax-portfolio-type') ) {
			return;
		}
		// do the filter
		var selector = $(this).attr('data-filter');
		$('.portfolio-container').isotope({ filter: selector });

		// update filter class
		$('.portfolio-filter a').removeClass('active');
		$(this).addClass('active');

		// prevent default click
		e.preventDefault();
		return false;
	});
	//Contact form input style 
	$('.wpcf7-form-control').removeClass('wpcf7-form-control').addClass('caveat-form-control');
	$('.wpcf7-submit').removeClass('caveat-form-control');

	var window_height = $(window).height();
    var window_height = (window_height) + (40);
	$(window).scroll(function() {
    	var scroll_top = $(window).scrollTop();
    	if (scroll_top > window_height) {
    		$('.caveat_move_to_top').show();
    	}
    	else {
    		$('.caveat_move_to_top').hide();	
    	}
    });

    $('.caveat_move_to_top').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
        
    });

});
