<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('two_column_list') ) : ?>
        <?php 
            $two_column_list = get_field('two_column_list');
            $heading = $two_column_list['heading'];
            $wysiwyg_1 = $two_column_list['wysiwyg_1'];
            $wysiwyg_2 = $two_column_list['wysiwyg_2'];
        ?>
        <section class="wysiwyg section-padding bg-light-blue feature-setion">
            <div class="container clearfix">
                    
                    <div class="row">
                        <div class="col-xxs-12 col-lg-10 col-lg-offset-1">
                            <?php if( $heading ): ?>
                                <h3 data-aos="zoom-in-left"><?php echo $heading; ?></h3>
                            <?php endif; ?> 
                            <div class="<?php echo ( $wysiwyg_1 && $wysiwyg_2 ? 'wysiwyg-grid' : ''); ?>">
                                <?php if( $wysiwyg_1 ): ?>
                                    <div class="wysiwyg-listing" data-aos="zoom-in-left">
                                        <?php echo $wysiwyg_1 ?>
                                    </div>
                                <?php endif; ?> 
                                <?php if( $wysiwyg_2 ): ?>   
                                    <div class="wysiwyg-listing" data-aos="zoom-in-right">
                                        <?php echo $wysiwyg_2 ?>
                                    </div> 
                                <?php endif; ?> 
                            </div> 
                        </div>
                    </div>
                    
            </div>
        </section>
    <?php endif; ?>  
<?php endif; ?>     