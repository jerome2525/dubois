<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('cta_bar') ) : ?>
        <?php 
            $cta_bar = get_field('cta_bar');
            $text = $cta_bar['text'];
            $heading = $cta_bar['heading'];
            $background_color = $cta_bar['background_color'];
            $link_url = $cta_bar['link']['url'] ?? '';
            $link_target = $cta_bar['link']['target'] ?? '';
            $link_title = $cta_bar['link']['title'] ?? '';
            $left_image_id = ( $background_color ? 577 : 572 );
            $right_image_id = ( $background_color ? 578 : 571 );
        ?> 
        <section class="cta-bar <?php echo ( $background_color ? 'cta--blue-bg' : 'cta--white-bg'); ?>">
            <?php echo fx_get_image_tag( $left_image_id, 'cta-bar__left hidden-md-down', 'full', true, [ 'alt' => 'CTA Bar' ] ); ?>
            <?php echo fx_get_image_tag( $right_image_id, 'cta-bar__right hidden-md-down', 'full', true, [ 'alt' => 'CTA Bar' ] ); ?>
            <div class="cta-bar__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2" data-aos="zoom-in">
                            <?php if( $heading ): ?>
                                <h2 class="cta-bar__headline"><?php echo $heading; ?></h2>
                            <?php endif; ?> 
                            <?php if( $text ): ?>
                                <p class="cta-bar__text"><?php echo $text; ?></p>
                            <?php endif; ?> 
                            <?php if( $link_url ): ?>
                                <a href="<?php echo $link_url; ?>" class="btn btn-primary" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link_title; ?></a>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 
 <?php endif; ?>        