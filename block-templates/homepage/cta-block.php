<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
	<?php if( get_field('cta_block') ) : ?>
	    <?php 
	         $cta_block = get_field('cta_block');
	         $text = $cta_block['text'];
	         $image = $cta_block['image'];
	    ?> 
		<section class="cta-block">
			<?php if( $image ): ?>
		    	<div class="cta-image"><?php echo fx_get_image_tag( $image, '', 'full', true, [ 'alt' => 'CTA' ] ); ?></div>
		    <?php endif; ?>  	
		    <div class="cta-overlay"></div>
		    <div class="cta-wrapper" data-aos="zoom-in">
		        <div class="container">
		        	<?php if( $text ): ?>
			            <?php echo $text; ?>
		            <?php endif; ?>  
		        </div>
		    </div>
		</section>
	<?php endif; ?> 	
<?php endif; ?>