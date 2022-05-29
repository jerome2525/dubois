var FX = ( function( FX, $ ) {


	$( () => {
		FX.FlexiblePartners.init()
	})


	FX.FlexiblePartners = {
		$slider: null,

		init() {
			$('.slider-for').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				dots: false,
				fade: true,
				asNavFor: '.slider-nav'
			});
			$('.slider-nav').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.slider-for',
				dots: false,
				arrows: true,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 1025,
						settings: {
							slidesToShow: 3,
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 2,
						}
					}
				
				  ]
			});
			
			$('a[data-slide]').click(function(e) {
			e.preventDefault();
			var slideno = $(this).data('slide');
			$('.slider-nav').slick('slickGoTo', slideno - 1);
			});			
		},

	}

	

	return FX

} ( FX || {}, jQuery ) )