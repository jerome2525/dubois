<?php get_header(); ?>

<?php get_template_part('partials/masthead'); ?>

<!-- Use https://blendedwaxes.com/404 as an example -->

<!-- Add image buttons below for top ~4 pages - one should be the homepage, PM to specify the others in specs -->
<?php if( get_field('image_buttons', 'option') ) : ?>
    <?php 
    $image_buttons = get_field('image_buttons', 'option');
    ?>
    <section class="error-page-section product-image-button section-margins">
        <div class="container">
            <h2 data-aos="zoom-in">Explore one of these pages instead:</h2>
            <?php if( $image_buttons ): ?>
                <div class="product-image-wrapper">
                    <?php foreach( $image_buttons as $image_button ): ?>
                        <a href="<?php echo $image_button['link']['url'] ?? ''; ?>" class="product-image-item" data-aos="zoom-in">
                            <?php if( $image_button['image'] ): ?>
                                <div class="product-image-item-image"><?php echo fx_get_image_tag( $image_button['image'], '', 'medium', true, [ 'alt' => '404 page' ] ); ?></div>
                            <?php endif; ?>    
                            <div class="product-image-content">
                                <?php if( $image_button['link'] ): ?>
                                    <h3><?php echo $image_button['link']['title'] ?? ''; ?></h3>
                                <?php endif; ?>    
                                <button class="btn btn-primary">Learn More</button>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>     
        </div>
    </section>
<?php endif; ?>  

<section class="links-404 section-margins">
    <div class="container">
        <div class="row">
            <div class="col-xxs-12 col-md-6" data-aos="zoom-in-right">
                <div class="search-404">
                    <h4>Or, try searching our site:</h4>
                    <?php get_search_form(); ?>
                </div>
            </div>
            <?php if( get_field('contact_page', 'option') ) : 
                $contact = get_field('contact_page', 'option');
            ?>
                <div class="col-xxs-12 col-md-6" data-aos="zoom-in-left">
                    <div class="contact-404">
                        <h4>Still can't find what you're looking for?</h4>
                        <a href="<?php echo $contact['url'] ?? ''; ?>" class="btn btn-primary">Contact Us Today!</a>
                    </div>
                </div>
            <?php endif; ?>  
        </div>
    </div>
</section>



<?php get_footer(); 