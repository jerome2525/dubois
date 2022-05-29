var FX = ( function( FX, $ ) {


	$( () => {
		FX.FxAos.init()
	})


	FX.FxAos = {
		init() {
			AOS.init();	
		},
	}

	return FX

} ( FX || {}, jQuery ) )