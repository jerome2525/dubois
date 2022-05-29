<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('inner_product_block') ) : ?>
        <?php 
            $inner_product_block = get_field('inner_product_block');
            $wysiwyg = $inner_product_block['wysiwyg'];
            $sliders = $inner_product_block['slider'];
            $sliders_count = ( $sliders ? count( $sliders ) : '');
            $request_button_url = $inner_product_block['request_button']['url'] ?? '';
            $request_button_title = $inner_product_block['request_button']['title'] ?? '';
            $request_button_target = $inner_product_block['request_button']['target'] ?? '';
            $product_line_parameter = $inner_product_block['product_line_parameter'];
            $product_name_parameter = $inner_product_block['product_name_parameter'];
        ?>
        <section class="inner-product-block">
            <div class="container">
                <div class="row">
                    <?php if( $sliders ): ?>
                        <div class="col-xxs-12 col-lg-5" data-aos="zoom-in-left" data-aos-delay="300">
                            <div class="product-gallery">
                                <div class="main">
                                    <div class="slider slider-for fx-slider">
                                        <?php foreach( $sliders as $slider ): ?>
                                            <div class="gallery-image fx-slide">
                                                <div class="gallery-image-col"> <?php echo fx_get_image_tag( $slider['image'], '', 'large', true, [ 'alt' => 'Dubois Product' ] ); ?></div>
                                            </div>
                                        <?php endforeach; ?> 
                                    </div>
                                    <?php if( $sliders_count > 1 ): ?>
                                        <div class="slider slider-nav fx-slider">
                                            <?php foreach( $sliders as $slider_nav ): ?>
                                                <div class="client_image fx-slide">
                                                    <?php echo fx_get_image_tag( $slider_nav['image'], '', 'medium', true, [ 'alt' => 'Dubois Product' ] ); ?>
                                                </div>
                                            <?php endforeach; ?> 
                                        </div>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>    
                    <?php if( $wysiwyg ): ?>
                        <div class="col-xxs-12 col-lg-7" data-aos="zoom-in-right">
                            <div class="inner-product-block-content">
                                <?php echo $wysiwyg; ?>   
                                <?php if( $request_button_url && $request_button_title ): ?>
                                    <p><a class="btn btn-primary" href="<?php echo $request_button_url; ?>?re_product_line=<?php echo $product_line_parameter; ?>&re_product_name=<?php echo $product_name_parameter; ?>" target="<?php echo $request_button_target; ?>"><?php echo $request_button_title; ?></a></p>
                                <?php endif; ?>    
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </section>
    <?php endif; ?>  
<?php endif; ?>    