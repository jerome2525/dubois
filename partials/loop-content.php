<?php
	$thumb_id = get_post_thumbnail_id();

	// if no thumb ID, check for placeholder image (from ACF options page)
	if( empty( $thumb_id ) ) {
		$thumb_id = get_field( 'placeholder_image', 'option' );
	}

	$img_tag 	= fx_get_image_tag( $thumb_id, 'blog-post__img', 'large' );
	$permalink 	= get_permalink();
	$terms 		= wp_get_object_terms( get_the_ID(), 'category' );
	$excerpt 	= wp_trim_words( get_the_excerpt(), 20, ' &hellip;' );
?>

<?php if ( get_post_type( get_the_ID() ) == 'post' ): ?>
	<article class="blog-post__item" data-aos="zoom-in">

		<?php if( !empty( $img_tag ) ): ?>
			<a class="blog-post__img-container show" href="<?php echo esc_url( $permalink ); ?>">
				<?php echo $img_tag; ?>
			</a>
		<?php endif; ?>

		<div class="blog-post__meta">	
			<?php if( !empty( $terms ) ): ?>
				<div class="blog-post__tags">
					<?php
						$numItems = count( $terms );
						$i = 0;
					?>
					<?php foreach( $terms as $term ): ?>
						<?php
							$comma = ",";
							if( ++$i === $numItems ) {
								$comma = "";
							}
						?>
						<a class="blog-post__tag" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?><?php echo $comma; ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<h3 class="blog-post__title">
				<a class="blog-post__title__link" href="<?php echo esc_url( $permalink ); ?>"><?php the_title(); ?></a>
			</h3>

			<div class="blog-post__excerpt push-bottom"><?php echo $excerpt; ?></div>
		</div>
		<div class="blog-post__link_container">
			<a class="blog-post__link btn btn-secondary" href="<?php echo esc_url( $permalink ); ?>">Read More</a>
		</div>
		
	</article>
<?php endif; ?>	

<?php if ( get_post_type( get_the_ID() ) == 'testimonial' ): ?>
	<div class="testimonial-content grid-item" data-aos="zoom-in">
        <div class="read-more__box container-style only-mobile">
            <div class="read-more__content js-read-more" style="-webkit-line-clamp: 5;">
                <div class="read-more__wrapper">
                    <?php echo get_field('testimonial_content', get_the_ID() ); ?>
                </div>
            </div>
        </div>
        <div class="testimonial-user-identity">
            <?php if( get_field('client_name', get_the_ID() ) ): ?>
                <h3><?php echo get_field('client_name', get_the_ID() ); ?></h3>
            <?php endif; ?>    
            <?php if( get_field('location', get_the_ID() ) ): ?>
                <h5><?php echo get_field('location', get_the_ID() ); ?></h5>
            <?php endif; ?>  
        </div>
    </div>
<?php endif; ?>		
