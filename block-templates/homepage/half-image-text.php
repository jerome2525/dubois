<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
   <?php if( get_field('half_image_text') ) : ?>
       <?php 
            $half_image_text = get_field('half_image_text');
            $heading = $half_image_text['heading'];
            $subheading = $half_image_text['subheading'];
            $text = $half_image_text['text'];
            $image = $half_image_text['image'];
            $link_title = $half_image_text['link']['title'] ?? '';
            $link_url = $half_image_text['link']['url'] ?? '';
            $link_target = $half_image_text['link']['target'] ?? '';
       ?>
      <section class="half-and-half flex-row image-block-left blue-bg">   
          <div class="half-and-half-text clearfix right">
             <div class="half-and-half-text__wrapper" data-aos="zoom-in-right">
               <?php if( $subheading ): ?>
                  <h4><?php echo fx_get_image_tag( 397, '', 'full', true, [ 'alt' => 'usa' ] ); ?><span><?php echo $subheading; ?></span></h4>
               <?php endif; ?> 
               <?php if( $heading ): ?>
                  <h2><?php echo $heading; ?></h2>
               <?php endif; ?>   
               <?php if( $text ): ?>
                  <?php echo $text; ?>
               <?php endif; ?> 
               <?php if( $link_url ): ?>
                  <a class="btn btn-primary" href="<?php echo $link_url; ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link_title; ?></a>
               <?php endif; ?>
             </div>
          </div>
          <div class="half-and-half-flag-image" data-aos="zoom-in-left" data-aos-delay="500">
             <?php echo fx_get_image_tag( 398, '', 'full', true, [ 'alt' => 'usa' ] ); ?>
          </div>
          <?php if( $image ): ?>
             <div class="half-and-half-image" data-aos="zoom-in-left" data-aos-delay="700">
                  <?php echo fx_get_image_tag( $image, '', 'full', true, [ 'alt' => $heading ] ); ?>
             </div>
          <?php endif; ?>
       </section>
   <?php endif; ?>
<?php endif; ?>       