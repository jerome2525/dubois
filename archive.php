<?php get_header(); ?>

<?php get_template_part('partials/masthead'); ?>

<?php if( have_posts() ): ?>
   <section class="blog-listing-container js-load-more-block section-margins">
        <div class="container">
            <div>
                <div class="blog-listing js-load-more-posts">    
                    <?php while( have_posts() ): the_post(); ?>
                        <?php get_template_part( 'partials/loop-content' ); ?>
                    <?php endwhile; ?>
                </div>
                <div class="blog-listing__pagination">
                    <div class="col-xxs-12">
                        <?php get_template_part( 'partials/pagination' ); ?> 
                    </div>
                </div>
            </div>            
        </div>
    </section>
<?php else: ?>
    Sorry, we couldn't find any posts.
<?php endif; ?>


<?php get_footer(); ?>