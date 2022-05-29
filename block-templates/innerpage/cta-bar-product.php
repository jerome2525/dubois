<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('cta_bar_product') ) : ?>
        <?php 
            $cta_bar_product = get_field('cta_bar_product');
            $text = $cta_bar_product['text'];
            $heading = $cta_bar_product['heading'];
            $background_image = $cta_bar_product['background_image'];
            $product_cut_out = $cta_bar_product['product_cut_out'];
            $link_url = $cta_bar_product['link']['url'] ?? '';
            $link_title = $cta_bar_product['link']['title'] ?? '';
            $link_target = $cta_bar_product['link']['target'] ?? '';
        ?>
        <section class="cta-block">
            <?php if( $background_image ): ?>
                <div class="cta-image"><?php echo fx_get_image_tag( $background_image, '', 'masthead', true, [ 'alt' => 'CTA' ] ); ?></div>
            <?php endif; ?> 
            <div class="cta-overlay"></div>
            <div class="cta-wrapper">
                <div class="container">
                    <div class="row">
                        <?php if( $product_cut_out ): ?>
                            <div class="col-lg-5 hidden-md-down" data-aos="zoom-in-left" data-aos-delay="300">
                                <div class="cta-img-left">
                                    <?php echo fx_get_image_tag( $product_cut_out, '', 'large', true, [ 'alt' => 'CTA' ] ); ?>
                                </div>
                            </div>
                        <?php endif; ?> 
                        <div class="<?php echo ( $product_cut_out ? 'col-lg-7' : ''); ?>" data-aos="zoom-in-right">
                            <div class="text-center">
                                <?php if( $heading ): ?>
                                    <h2><?php echo $heading; ?></h2>
                                <?php endif; ?> 
                                <?php if( $text ): ?>
                                    <p><?php echo $text; ?></p>
                                <?php endif; ?>
                                <?php if( $link_url ): ?>
                                    <a href="<?php echo $link_url; ?>" class="btn btn-primary" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link_title; ?></a>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>    
<?php endif; ?>    