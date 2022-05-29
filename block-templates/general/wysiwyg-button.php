<?php
if ( isset($block['data']['is_preview']) && $block['data']['is_preview'] == true ) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' .$preview_image. '" style="max-width:470px;"/>';
else:
?>
    <?php if( get_field('wysiwyg_with_buttons') ) : ?>
        <?php 
            $wysiwyg = get_field('wysiwyg_with_buttons');
            $content = $wysiwyg['content'];
            $buttons = $wysiwyg['buttons'];
            $button_position = $wysiwyg['button_position'];
        ?>
        <section class="wysiwyg section-padding bg-pattern side-button-section <?php echo ( $button_position ? 'button-left' : 'button-right'); ?>">
            <div class="container clearfix">
                <?php if( $content ): ?>
                    <div class="<?php echo ( $buttons ? 'wysiwyg__left-text' : ''); ?>" data-aos="zoom-in-left">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?> 
                <?php if( $buttons ): ?> 
                    <div class="wysiwyg__listing" data-aos="zoom-in-right" data-aos-delay="300">
                        <ul>
                            <?php foreach( $buttons as $button ): ?>
                                <li><a href="<?php echo $button['link']['url'] ?? ''; ?>"><?php echo $button['link']['title'] ?? ''; ?></a></li>
                            <?php endforeach; ?> 
                        </ul>
                    </div>
                <?php endif; ?> 
            </div>
        </section>
    <?php endif; ?>  
<?php endif; ?> 