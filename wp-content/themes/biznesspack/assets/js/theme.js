jQuery(function($) {
	
	'use strict';
	
	/*-----------------------------------------------------------------
	 * Carousels
	 *-----------------------------------------------------------------
	 */
 	
	if($("body").hasClass("rtl")) {
		var rtlcheck = true;
	}
	else{
		var rtlcheck = false;
	}
	
	owlFun( "#recent-slider" );

	
	
	function owlFun( cowl ){
		
		// Home post Slider
		var nav = $(cowl).attr('data-nav');
		var pag = $(cowl).attr('data-pag');

		$(cowl).owlCarousel({
			loop:true,
			rtl:rtlcheck,
			margin:10,
			nav: parseInt(nav),
			dots: parseInt(pag),
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				}
			}
		});
	}
	
	
	
	biznesspackFeatured( "#biznesspack-featured-slider" );
	
		function biznesspackFeatured( cowl ){
		
		// Home post Slider
		var nav = $(cowl).attr('data-nav');
		var pag = $(cowl).attr('data-pag');
		
		$(cowl).owlCarousel({
			
			loop:true,
			rtl: rtlcheck,
			margin:10,
			nav: parseInt(nav),
			dots: parseInt(pag),
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				}
			}
		});
	}
	
	latestPost( "#latest-slider" );

	
	
	function latestPost( cowl ){
		
		// Home post Slider
		var date_item = $(cowl).attr('data-item');

		$(cowl).owlCarousel({
			loop:true,
			rtl:rtlcheck,
			margin:20,
			nav: false,
			dots: false,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1024:{
					items:parseInt(date_item)
				}
			}
		});
	}
});

