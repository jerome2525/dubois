<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('product_card') ) : ?>
        <?php 
            $product_card = get_field('product_card');
            $buttons = $product_card['buttons'];
            $heading = $product_card['heading'];
            $version = $product_card['version'];
            $view_link_url = $product_card['view_all_product_link']['url'] ?? '';
            $view_link_title = $product_card['view_all_product_link']['title'] ?? '';
            $view_link_target = $product_card['view_all_product_link']['target'] ?? '';
        ?>
        <section class="product-card <?php echo ( $version ? 'dark-grey-bg' : 'light-grey-bg'); ?>">
            <div class="container">
                <div class="product-card-head" data-aos="zoom-in-up">
                    <?php if( $heading ): ?>
                        <h4><span><?php echo $heading; ?></span></h4>
                    <?php endif; ?> 
                    <?php if( $view_link_url ): ?> 
                        <a href="<?php echo $view_link_url; ?>" class="btn btn-secondary hidden-md-down" target="<?php echo esc_attr( $view_link_target ); ?>"><?php echo $view_link_title; ?></a>
                    <?php endif; ?> 
                </div>
                <?php if( $buttons ): ?> 
                    <div class="product-card-wrapper" data-aos="zoom-in-up" data-aos-delay="300">
                        <?php foreach( $buttons as $button ): ?>
                            <?php 
                                $button_link = $button['link']['url'] ?? '';
                                $button_title = $button['link']['title'] ?? '';
                                $button_target = $button['link']['target'] ?? '';
                            ?>
                            <a href="<?php echo $button_link; ?>" class="product-card-item" target="<?php echo esc_attr( $button_target ); ?>">  
                                <?php if( $button_title ): ?>                  
                                    <button class="btn btn-secondary"><?php echo $button_title; ?></button>
                                <?php endif; ?>
                                <?php if( $button['image'] ): ?>
                                    <div class="product-card-item-image"><?php echo fx_get_image_tag( $button['image'], '', 'medium', true, [ 'alt' => $button_title ] ); ?></div>
                                <?php endif; ?>     
                            </a>
                        <?php endforeach; ?> 
                    </div>
                <?php endif; ?>     
                <?php if( $product_card['view_all_product_link'] ): ?> 
                    <a href="<?php echo $view_link_url; ?>" class="btn btn-secondary hidden-lg"><?php echo $view_link_title; ?></a>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>    
<?php endif; ?>    