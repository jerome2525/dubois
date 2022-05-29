<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('image_text') ) : ?>
        <?php 
            $image_text = get_field('image_text');
            $text = $image_text['text'];
            $heading = $image_text['heading'];
            $background_color = $image_text['background_color'];
            $image = $image_text['image'];
            $text_position = $image_text['text_position'];
            $remove_top_margin = $image_text['remove_top_margin'];
            $remove_bottom_margin = $image_text['remove_bottom_margin'];
        ?>
        <section class="image-text<?php echo ( $text_position ? ' image-text--left' : ' image-text--right'); ?><?php echo ( $background_color ? ' bg-blue' : ''); ?> section-margins<?php echo ( $remove_top_margin ? ' remove-top-margin' : ''); ?><?php echo ( $remove_bottom_margin ? ' remove-bottom-margin' : ''); ?>">
            <div class="container">
            <div class="row image-row<?php echo ( $text_position ? '' : ' flex-opposite'); ?>">
                <?php if( $image ): ?>
                    <div class="col-xxs-12 col-lg-6 image-text__half image-text__img">
                        <div class="image-text__img-wrapper" data-aos="zoom-in-right">
                            <?php echo fx_get_image_tag( $image, 'img-responsive box-shadow', 'large', true, [ 'alt' => $heading ] ); ?>
                        </div>           
                    </div>
                <?php endif; ?> 
                <div class="col-xxs-12 col-lg-6 image-text__half image-text__text">
                    <?php if( $heading ): ?>
                        <h3 data-aos="zoom-in-left"><?php echo $heading; ?></h3>
                    <?php endif; ?> 
                    <?php if( $text ): ?>
                        <div class="image-text__content-wrapper" data-aos="zoom-in-left">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        </section>
    <?php endif; ?>  
<?php endif; ?>   