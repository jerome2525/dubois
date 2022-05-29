<section class="masthead masthead--innerpage" <?php if ( get_field('masthead_background_color', 'option' ) ) : ?>style="background-color: <?php echo get_field('masthead_background_color', 'option'); ?>;" <?php endif; ?>>
    <div class="inner-masterhead-right-image"><?php echo fx_get_image_tag( 496, '', 'full', true, [ 'alt' => '' ] ); ?></div>
    <div class="masthead-wrapper">
        <div class="container">
            <?php if ( is_search() ): ?>
                <h1 data-aos="zoom-in-right">Search Results</h3><?php /* different heading type for SEO benefit */ ?>
            <?php elseif ( is_home() ): ?>
                <h1 data-aos="zoom-in-right">Blog</h1>
            <?php elseif ( is_404() ) : ?>
                <h1 data-aos="zoom-in-right">404: Oops! We can't find the page you're looking for.</h1>
            <?php elseif ( is_archive() ) : ?>   
                <h1 data-aos="zoom-in-right"><?php echo get_the_archive_title(); ?></h1> 
            <?php else : ?>
                <h1 data-aos="zoom-in-right"><?php the_title(); ?></h1>
            <?php endif; ?>
            <div class="breadcrumbs" data-aos="zoom-in-right" data-aos-delay="500">
                <?php if( wp_get_post_parent_id( get_the_ID() ) ): ?>
                    <p class="hidden-lg"><a href="<?php echo get_permalink( wp_get_post_parent_id( get_the_ID() ) ); ?>">Back to <?php echo get_the_title( wp_get_post_parent_id( get_the_ID() ) ); ?></a></p>
                <?php endif; ?>   
                <?php if( is_single() && get_option('page_for_posts') || is_archive() && get_option('page_for_posts') ): ?>
                    <p class="hidden-lg"><a href="<?php echo esc_url( get_permalink( get_option('page_for_posts') ) ); ?>">Back to Blog</a></p>
                <?php endif; ?>     
                <?php
                    if( function_exists( 'yoast_breadcrumb' ) ) {
                        yoast_breadcrumb( '<ul class="hidden-md-down clearfix">', '</ul>' );
                    }
                ?>
            </div>
        </div>
    </div>
</section>
