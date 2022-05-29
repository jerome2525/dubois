var FX = ( function( FX, $ ) {


	$( () => {
		FX.TestimonialList.init()
	})


	FX.TestimonialList = {

		init() {
			this.grid();
			this.slick();
		},
		grid() {
			if ( $('.js-grid')[0] ) {
				var masonryOptions = {
				  	itemSelector: '.grid-item',
				  	columnWidth: '.grid-sizer',
				  	percentPosition: true,
					gutter: 10,
					isAnimated: true,
			       	animationOptions: {
			       	duration: 1000,
			        	easing: 'linear',
			       		queue: false
			   		},
				};

				var $grid = $('.js-grid');

				if ( $(window).width() > 767 ) {
					$grid.masonry( masonryOptions );
					$('.load-more__btn').click( function() {
						setTimeout(
						function() {
							$grid.masonry('destroy');
							$grid.masonry( masonryOptions );
							$('html, body').animate({scrollTop:$('.testimonial-listing__pagination').position().top}, 'slow');
						}, 2000);

					});	
				}
			}

		},
		slick() {
			if ( $('.js-slider')[0] ) {
				$('.js-slider').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
					arrows: true,
					focusOnSelect: true,
					adaptiveHeight: false
				});
			}
		}

	}

	

	return FX

} ( FX || {}, jQuery ) )