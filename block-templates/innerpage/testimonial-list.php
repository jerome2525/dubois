<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('testimonial_list') ) : ?>
        <?php 
            $testimonial_list = get_field('testimonial_list');
            $headline = $testimonial_list['headline'];
            $featured = $testimonial_list['featured'];
            $order = $testimonial_list['order'];
            $order_by = $testimonial_list['order_by'];
            $category = $testimonial_list['category'];
            $background_image = $testimonial_list['background_image'];
            $background_color = $testimonial_list['background_color'];
            $slider = $testimonial_list['slider'];
            $query_limit = ( $testimonial_list['limit'] ? $testimonial_list['limit'] :  -1 );

            $args_list = array(
                'post_type'     => 'testimonial',
                'post_status'   => 'publish',
                'posts_per_page' => $query_limit,
                'order' => $order,
                'orderby' => $order_by,
            );

            if( $featured ) {
                $meta_query[] = array(
                    'relation' => 'AND',
                    array(
                        'key' => 'featured',
                        'value' => '1',
                        'compare' => '='
                    )
                );

                $args_list['meta_query'] = $meta_query;
            }

            if( $category ) {
                $tax_query[] = array(
                    'taxonomy' => 'testimonial_category',
                    'field' => 'term_id',
                    'terms' => $category
                );

                $args_list['tax_query'] = $tax_query;
            }

            $query = new WP_Query( $args_list );
            $total_count = $query->found_posts;
            if( $total_count ) {
                $limit = ( $testimonial_list['limit'] ? $testimonial_list['limit'] :  $total_count );
            }
        ?>
            <?php if ( $query->have_posts() ): ?>
                <section class="testimonial-block testimonial-list-block js-load-more-block" <?php if( empty( $slider ) ): ?>data-load-more-total="<?php echo $total_count; ?>" data-load-more-post-type="testimonial" data-load-more-posts-per-page="<?php echo $limit; ?>"<?php endif; ?>>
                    <?php if( $background_image ): ?>
                        <div class="testimonial-image">
                            <?php echo fx_get_image_tag( $background_image, '', 'masthead', true, [ 'alt' => $headline ] ); ?>
                        </div>  
                    <?php endif; ?>   
                    <?php if( $background_color ): ?>
                        <div class="testimonial-overlay" style="background-color: <?php echo $background_color; ?>"></div>  
                    <?php endif; ?>  
                    <div class="container">
                        <?php if( $headline ): ?>
                            <h2 class="text-center" data-aos="zoom-in"><?php echo $headline; ?></h2>
                        <?php endif; ?>    
                        <div class="<?php echo ( $slider ? 'js-slider' : 'js-grid'); ?> js-load-more-posts">
                            <?php if( empty( $slider ) ): ?>
                                <div class="grid-sizer"></div>
                            <?php endif; ?>    
                            <?php while ( $query->have_posts() ): $query->the_post(); ?>
                                <div class="testimonial-content <?php echo ( $slider ? 'slider-item' : 'grid-item'); ?>" data-aos="zoom-in">
                                    <div class="read-more__box container-style only-mobile">
                                        <div class="read-more__content js-read-more" style="-webkit-line-clamp: 5;">
                                            <div class="read-more__wrapper">
                                                <?php echo get_field('testimonial_content', get_the_ID() ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-user-identity">
                                        <?php if( get_field('client_name', get_the_ID() ) ): ?>
                                            <h3><?php echo get_field('client_name', get_the_ID() ); ?></h3>
                                        <?php endif; ?>    
                                        <?php if( get_field('location', get_the_ID() ) ): ?>
                                            <h5><?php echo get_field('location', get_the_ID() ); ?></h5>
                                        <?php endif; ?>  
                                    </div>    
                                </div>
                            <?php endwhile; ?>   
                        </div>
                        <?php if( empty( $slider ) ): ?>
                            <div class="blog-listing__pagination testimonial-listing__pagination" data-aos="zoom-in">
                                <div class="col-xxs-12">
                                    <?php get_template_part( 'partials/pagination' ); ?> 
                                </div>
                            </div> 
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>  
    <?php endif; ?>  
<?php endif; ?>    