<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if(get_field('product_image_buttons')) : ?>
        <?php 
            $product_image_buttons = get_field('product_image_buttons');
            $buttons = $product_image_buttons['buttons'];
            $heading = $product_image_buttons['heading'];
            $text = $product_image_buttons['text'];
            $link_url = $product_image_buttons['link']['url'] ?? '';
            $link_title = $product_image_buttons['link']['title'] ?? '';
            $link_target = $product_image_buttons['link']['target'] ?? '';
        ?>
        <section class="<?php echo ( !is_front_page() ? 'image-buttons section-padding' : 'product-image-button'); ?>">
            <div class="container">
                <?php if( $heading || $text ): ?>
                    <div class="image-button-heading" data-aos="fade-up" data-aos="zoom-in-up">
                        <?php if( $heading ): ?>
                            <h2><?php echo $heading; ?></h2>
                        <?php endif; ?>    
                        
                        <?php if( $text ): ?> 
                            <?php echo $text; ?>
                        <?php endif; ?> 
                        
                        <?php if( $link_url ): ?>    
                            <a href="<?php echo $link_url; ?>" class="btn btn-primary" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link_title; ?></a>
                        <?php endif; ?> 
                    </div>
                <?php endif; ?>
                <?php if( $buttons ): ?> 
                    <div class="product-image-wrapper">
                        <?php foreach( $buttons as $button ): ?>
                            <?php 
                                $button_url = $button['link']['url'] ?? ''; 
                                $button_title = $button['link']['title'] ?? ''; 
                                $button_target = $button['link']['target'] ?? '';
                            ?>
                            <a href="<?php echo $button['link']['url'] ?? ''; ?>" class="product-image-item" target="<?php echo esc_attr( $button_target ); ?>" data-aos="zoom-in-up">
                                <?php if( $button['image'] ){
                                    $button_img = $button['image'];
                                }
                                else {
                                    $button_img = get_field('placeholder_image', 'option');
                                }
                                ?>      
                                <div class="product-image-item-image"><?php echo fx_get_image_tag( $button_img, '', 'large', true, [ 'alt' => $button['top_line_title'] ] ); ?></div>
                                  
                                <div class="product-image-content">
                                    <?php if( $button['top_line_title'] ): ?>
                                        <h3><?php echo $button['top_line_title']; ?></h3>
                                    <?php endif; ?>
                                    <?php if( $button['bottom_line_title'] ): ?>
                                        <button class="btn btn-secondary"><?php echo $button['bottom_line_title']; ?></button>
                                    <?php endif; ?>
                                    <?php if( $button['description'] ): ?>
                                        <p><?php echo $button['description']; ?></p>
                                    <?php endif; ?>   
                                    <?php if( $button_url  ): ?>  
                                        <button class="btn btn-primary"><?php echo $button_title; ?></button>
                                    <?php endif; ?>  
                                </div>
                            </a>
                        <?php endforeach; ?>   
                    </div>
                <?php endif; ?> 
            </div>
        </section>
    <?php endif; ?>    
<?php endif; ?>      