<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('testimonial_block') ) : ?>
        <?php 
             $testimonial_block = get_field('testimonial_block');
             $heading = $testimonial_block['heading'];
             $subheading = $testimonial_block['subheading'];
             $testimonial_link = $testimonial_block['testimonial_link']['url'] ?? '';
             $testimonial_title = $testimonial_block['testimonial_link']['title'] ?? '';
             $testimonial_target = $testimonial_block['testimonial_link']['target'] ?? '';
             $association_heading = $testimonial_block['association_heading'];
             $associations = $testimonial_block['associations'];
             $association_link = $testimonial_block['view_our_patents_awards_link']['url'] ?? '';
             $association_title = $testimonial_block['view_our_patents_awards_link']['title'] ?? '';
             $association_target = $testimonial_block['view_our_patents_awards_link']['target'] ?? '';
             $show_sidebar = $testimonial_block['show_sidebar'];
             $testimonial_id = fx_get_featured_testimonial_id();
        ?>
        <section class="testimonial-block">
            <div class="container">
                <div class="row flex-row">
                    <div class="<?php if( $show_sidebar ): ?> col-xxs-12 col-lg-7<?php endif; ?>">
                        <div class="testimonial-content" data-aos="zoom-in-left">
                            <?php if( $subheading ): ?>
                                <h4><span><?php echo $subheading; ?></span></h4>
                            <?php endif; ?>     
                            <?php if( $heading ): ?>
                                <h2><?php echo $heading; ?></h2>
                            <?php endif; ?> 
                            <?php if( $testimonial_id ): ?>
                                <div class="read-more__box container-style only-mobile">
                                    <div class="read-more__content js-read-more" style="-webkit-line-clamp: 5;">
                                        <div class="read-more__wrapper">
                                            <?php echo get_field('testimonial_excerpt', $testimonial_id ); ?>
                                        </div>
                                    </div>
                                    <a class="expand js-read-more-expand" href="javascript:;">Read more </a> 
                                </div>
                                <div class="testimonial-user-identity">
                                    <?php if( get_field('client_name', $testimonial_id ) ): ?>
                                        <h3><?php echo get_field('client_name', $testimonial_id ); ?></h3>
                                    <?php endif; ?>    
                                    <?php if( get_field('location', $testimonial_id ) ): ?>
                                        <h5><?php echo get_field('location', $testimonial_id ); ?></h5>
                                    <?php endif; ?>  
                                    <?php if( $testimonial_link ): ?>
                                        <a href="<?php echo $testimonial_link; ?>" class="btn btn-primary" target="<?php echo esc_attr( $testimonial_target ); ?>"><?php echo $testimonial_title; ?></a>
                                    <?php endif; ?> 
                                </div>
                            <?php endif; ?> 
                        </div>
                    </div>

                    <?php if( $show_sidebar ): ?>
                        <div class="col-xxs-12 col-lg-5">
                            <div class="testimonial-company-area" data-aos="zoom-in-right" data-aos-delay="300">
                                <?php if( $association_heading ): ?>
                                    <h5><?php echo $association_heading; ?></h5>
                                <?php endif; ?>  
                                <?php if( $associations ): ?>   
                                    <div class="testimonial-company-wrapper">
                                        <?php foreach( $associations as $association ): ?>
                                            <?php if( $association['logo'] ): ?> 
                                                <a href="<?php echo $association['link'] ?? ''; ?>" target="_blank"><?php echo fx_get_image_tag( $association['logo'], '', 'medium', true, [ 'alt' => 'Company Logo' ] ); ?></a>
                                            <?php endif; ?> 
                                        <?php endforeach; ?> 
                                    </div>
                                <?php endif; ?> 
                                <?php if( $association_link ): ?>
                                    <a href="<?php echo $association_link; ?>" class="btn btn-secondary" target="<?php echo esc_attr( $association_target ); ?>"><?php echo $association_title; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>     
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?php endif; ?>      