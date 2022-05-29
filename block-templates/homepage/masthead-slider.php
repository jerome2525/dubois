<?php if( have_rows( 'slides' ) ): ?>
    <section class="masthead masthead--homepage">
        <div class="js-masthead-homepage-slider fx-slider">
            <?php $skip_lazy = true; // skip lazy loading for first image to improve paint times
            while( have_rows( 'slides' ) ): the_row(); ?>
                <div class="masthead-slide fx-slide">
                    <?php echo fx_get_image_tag( get_sub_field( 'background_image' ), 'masthead-slide__img', 'masthead', $skip_lazy ); ?>            
                    <div class="masthead-slide__content">
                        <div class="container">
                            <div class="masthead__wrapper">
                                <?php if( get_sub_field( 'subheading' )  ): ?>
                                    <div class="sub-heading" data-aos="zoom-in-right" data-aos-delay="500"><?php the_sub_field( 'subheading' ); ?></div>
                                <?php endif; ?>
                                <?php if( get_sub_field( 'headline' )  ): ?>
                                    <h1 class="masthead-slide__title" data-aos="zoom-in-right" data-aos-delay="100"><?php the_sub_field( 'headline' ); ?></h1>
                                <?php endif; ?>
                                <?php if( $button = get_sub_field( 'button' )  ): ?>
                                    <?php $link_target = $button['target'] ? $button['target'] : '_self'; ?> 
                                    <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn-primary" target="<?php echo esc_attr( $link_target ); ?>" data-aos="flip-up" data-aos-delay="1000"><?php echo $button['title']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $skip_lazy = false;
            endwhile; ?>    
        </div>
        <div class="banner-pattern hidden-md-down">
            <?php echo fx_get_image_tag( 257, 'img-responsive', 'full', true, [ 'alt' => 'Dubois Equipment Company, LLC' ] ); ?>    
        </div>
    </section>
<?php endif; ?>