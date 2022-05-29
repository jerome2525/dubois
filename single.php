<?php 
    get_header(); 
    $terms  = wp_get_object_terms( get_the_ID(), 'category' );
?>
<?php get_template_part('partials/masthead'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="wysiwyg section-padding bg-white single-section">
        <div class="container clearfix">
            <div class="wysiwyg__left-text" data-aos="zoom-in-right">
                <?php if( get_field('blog_hero_image') ): ?>
                    <div class="blog-hero">
                        <?php echo fx_get_image_tag( get_field('blog_hero_image'), '', 'large', true, [ 'alt' => get_the_title() ] ); ?>
                    </div> 
                <?php endif; ?>  
                <div class="blog-post__tags">
                    <div class="blog-date">
                        <p><strong>Posted:</strong> <?php echo get_the_date( 'F j, Y' ); ?> by <?php echo get_the_author(); ?></p>
                    </div>
                    <div class="blog-categories">
                        <p><strong>Categories:</strong> 
                        <?php
                            $numItems = count( $terms );
                            $i = 0;
                        ?>    
                        <?php foreach( $terms as $term ): ?>
                            <?php
                                $comma = ",";
                                if( ++$i === $numItems ) {
                                    $comma = "";
                                }
                            ?>
                            <a class="blog-post__tag" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?><?php echo $comma; ?></a>
                        <?php endforeach; ?>
                        </p>
                    </div>
                </div>
                  
                <?php the_content(); ?>
                <?php get_template_part( 'partials/social-share' ); ?>
                <ul class="pagination">
                    <li class="page-item prev">
                        <?php previous_post_link( '%link', '<i class="fas fa-arrow-left"></i> %title' ); ?>
                    </li>
                     <li class="page-item next">
                        <?php next_post_link( '%link', ' %title <i class="fas fa-arrow-right"></i>' ); ?>
                    </li>
                </ul>
            </div>
            <div class="wysiwyg__contact" data-aos="zoom-in-left">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>

<?php get_footer();