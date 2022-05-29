<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if(get_field('product_detail_block')) : ?>
        <?php 
            $product_solutions = get_field('product_detail_block');
            $heading = $product_solutions['heading'];
            $subheading = $product_solutions['subheading'];
            $text = $product_solutions['text'];
            $button_url = $product_solutions['button']['url'] ?? '';
            $button_title = $product_solutions['button']['title'] ?? '';
            $button_target = $product_solutions['button']['target'] ?? '';
        ?>
        <section class="product-detail-block" data-aos="zoom-in-up">
            <div class="container">
                <?php if( $subheading ): ?>
                    <h4><span><?php echo $subheading; ?></span></h4>
                <?php endif; ?> 
                <?php if( $heading ): ?>
                    <h2><?php echo $heading; ?></h2>
                <?php endif; ?>    
                <?php if( $text ): ?>
                   <p class="show-read-more"><?php echo $text; ?></p> 
                <?php endif; ?>   
                <?php if( $button_url ): ?>
                    <a href="<?php echo $button_url; ?>" class="btn btn-primary" target="<?php echo esc_attr( $button_target ); ?>"><?php echo $button_title; ?></a>
                <?php endif; ?>  
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>    