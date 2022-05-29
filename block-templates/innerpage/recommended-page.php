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
