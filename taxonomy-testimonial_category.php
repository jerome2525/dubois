<?php get_header(); ?>

<?php get_template_part('partials/masthead'); ?>

<?php if( have_posts() ): ?>
    <section class="testimonial-block testimonial-list-block js-load-more-block" data-load-more-post-type="testimonial"> 
        <div class="container">  
            <div class="js-grid js-load-more-posts">
                <div class="grid-sizer"></div>  
                <?php while( have_posts() ): the_post(); ?>
                    <?php get_template_part( 'partials/loop-content' ); ?>
                <?php endwhile; ?>    
            </div>
            <div class="blog-listing__pagination testimonial-listing__pagination" data-aos="zoom-in">
                <div class="col-xxs-12">
                    <?php get_template_part( 'partials/pagination' ); ?> 
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>