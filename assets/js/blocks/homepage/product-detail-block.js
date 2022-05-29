var FX = ( function( FX, $ ) {


	$( () => {
		FX.ProductDetailBlock.init()
	})


	FX.ProductDetailBlock = {
		init() {
			var maxLength = 630;
		    $('.show-read-more').each(function(){
		        var myStr = $(this).html();
		        if($.trim(myStr).length > maxLength){
		            var newStr = myStr.substring(0, maxLength);
		            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
		            $(this).empty().html(newStr);
		            $(this).append(' <a href="javascript:void(0);" class="expand js-read-more-expand">Read More</a>');
		            $(this).append('<span class="more-text">' + removedStr + '</span>');
		        }
		    });
		    
		    $('.js-read-more-expand').click(function(){
		  		$(this).siblings('.more-text').contents().unwrap();
		 		$(this).remove();
		    });
		}
	}

	

	return FX

} ( FX || {}, jQuery ) )