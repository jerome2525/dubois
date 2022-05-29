var FX = ( function( FX, $ ) {


	$( () => {
		FX.HomepageMasthead.init()
	})


	FX.HomepageMasthead = {
		$slider: null,

		init() {
			this.$slider = $('.js-masthead-homepage-slider')

			if( this.$slider.length ) {
				this.applySlick()
			}
		},

		applySlick() {
            this.$slider.slick( {
                dots: true,
                autoplay: true,
                autoplaySpeed: 5000,
				arrows: false
            });
		}
	}

	

	return FX

} ( FX || {}, jQuery ) )