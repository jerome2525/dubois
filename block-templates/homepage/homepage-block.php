<?php

/** 
 * $template note:
 * 
 * Block names should be prefixed with acf/. So if the name you specified in
 * fx_register_block is 'your-block-name', the name you should use here is
 * 'acf/your-block-name' 
 */

$template = [
	['acf/homepage-masthead-slider'],
    ['acf/homepage-product-detail'],
    ['acf/homepage-product-image-buttons'],
    ['acf/homepage-product-card'],
    ['acf/homepage-product-card'],
    ['acf/homepage-half-image-text'],
    ['acf/homepage-testimonial-block'],
    ['acf/homepage-cta-block'],
    // TODO add additional blocks here and delete this comment
];

?>

<div>
    <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) )?>" templateLock="all" />
</div>
