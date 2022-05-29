<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php
        $remove_top_padding = get_field('remove_top_padding');
        $remove_bottom_padding = get_field('remove_bottom_padding');
    ?>
    <section class="wysiwyg section-padding <?php echo ( get_field('background') ? 'bg-light-blue' : 'bg-white'); ?><?php echo ( $remove_bottom_padding ? ' remove-bottom-padding' : ''); ?><?php echo ( $remove_top_padding ? ' remove-top-padding' : ''); ?>">
        <div class="container clearfix">
            <div class="<?php echo ( get_field('sidebar_form') ? 'wysiwyg__left-text' : 'wysiwyg__full-text col-lg-10 col-lg-push-1'); ?>" data-aos="zoom-in">
                <?php the_field( 'content' ); ?>
            </div>

            <?php if( get_field('sidebar_form') ): ?>
    	        <div class="wysiwyg__contact" data-aos="zoom-in" data-aos-delay="300">
    	            <?php echo do_shortcode('[contact-form-7 id="502" title="WYSIWYG Form" html_id="cf7-form-502"]'); ?>
    	        </div>
        	<?php endif; ?>
        </div>
    </section>
<?php endif; ?>    