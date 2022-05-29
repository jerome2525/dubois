<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php
        $content = get_field( 'content' );
        $form = get_field('cf7_shortcode');

        $address = get_field( 'address', 'option' );
        $phone = get_field( 'phone', 'option' );
        $hours = get_field( 'business_hours', 'option' );
        $img = fx_get_image_tag( 91, 'img-responsive' );
    ?>

    <div class="inner-contact-block section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xxs-12 col-md-6">
                    <div class="contact-form-left" data-aos="zoom-in-right">

                        <?php if( !empty( $content ) ) : ?>

                            <h6><?php  echo $content; ?></h6>

                        <?php endif; ?>

                        <div class="contact-form">

                            <?php
                            if( !empty( $form ) ) {
                                echo apply_shortcodes( $form );
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-xxs-12 col-md-6">
                    <div class="contact-form-right" data-aos="zoom-in-left">
                        <div class="contact-form-right-wrapper">
                            <h4><span>Get in touch</span></h4>
                            <ul>

                                <?php if( !empty( $address ) ): ?>
                                    <li>
                                        <span><i class="icon-Map-pin"></i><span class="contact-info-title">Address</span><?php echo $address; ?></span>
                                        <a href="<?php echo get_field('google_map_url', 'option'); ?>" target="_blank" class="btn btn-secondary">View in google maps</a>
                                    </li>
                                <?php endif ?>

                                <?php if( !empty( $phone ) ): ?>
                                    <li>
                                        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><i class="icon-phone"></i><span>Phone</span><?php echo $phone ?></a>
                                    </li>
                                <?php endif ?>

                                <?php if( !empty( $hours ) ): ?>
                                    <li>
                                        <span><i class="icon-clock"></i><span class="contact-info-title">Business Hours</span><?php echo $hours; ?></span>
                                    </li>
                                <?php endif ?>

                            </ul>
                            <div class="contact-form-right-image">

                                <?php if( !empty( $img ) ) { echo $img; }  ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>   