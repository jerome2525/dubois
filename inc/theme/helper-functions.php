<?php


/**
 * Determine if site is in debug/development mode
 *
 * @param   bool    $include_dev_mode   Include check for development mode
 * @return  bool                        True, if in debug mode
 */
function fx_debug_mode_enabled( bool $include_dev_mode = true ): bool {

    // check for constants set in wp-config
    if( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
        return true;
    }

    // conditionally check if site is in development mode
    if( $include_dev_mode && 'development' === wp_get_environment_type() ) {
        return true;
    }

    return false;
}


/**
 * Create an SEO-friendly image tag based on supplied arguments
 *
 * @param	mixed   $image      Image ID (integer/string) or image URL (string)
 * @param   mixed   $class      Either string or array of classes
 * @param   string  $size       Image size
 * @param   bool    $skip_lazy  Prevent WP Rocket from lazy-loading image
 * @param   array   $atts       Additional attributes to add to tag 
 *      
 * @return  string              If valid image, then <img> string; otherwise empty string
 */
function fx_get_image_tag( $image, $classes = '', string $size = 'full', bool $skip_lazy = false, array $atts = [] ): string {
    $image_id = null;

    // determine if image ID or URL
    if( is_numeric( $image ) ) {
        $image_id = absint( $image );

    // try to find ID based on URL
    } elseif( is_string( $image ) ) {
        $image_id = attachment_url_to_postid( $image );
    }

    // if still empty, check for placeholder
    if( empty( $image_id ) ) {
        $image_id = get_field( 'placeholder_img', 'option' );
	}

    // if STILL empty, return empty string
    if( empty( $image_id ) ) {
        return '';
	}

    // if classes weren't passed as string, try to form string
    if( is_array( $classes ) ) {
        $classes = implode( ' ', $classes );
	}

    // prevent lazyloading from WP Rocket?
    if( $skip_lazy && false !== strpos( $classes, 'skip-lazy' ) ) {
        $classes .= ' skip-lazy';
    }

    // combine classes with tag attributes
    $atts = array_merge( 
        [ 
            'class' => $classes 
        ], 
        $atts 
    );
    $atts = array_filter( $atts );

    // use WP's native function to generate image element
    $tag = wp_get_attachment_image( $image_id, $size, false, $atts );

    return $tag;
}


/**
 * Strip all nonalphanumeric characters from string
 *
 * @param	string	$arg    String to strip
 * @return  string          Stripped string
 */
function fx_string_strip_special( string $arg = '' ): string {
    return preg_replace( '/[^A-Za-z0-9]/', '', $arg );
}


/**
 * Pretty-print var_dump for easier readability
 *
 * @param	mixed   $var        Variable to var_dump
 * @param   bool    $esc_html   If true, will escape HTML to prevent rendering content as HTML
 * @return  void
 */
if( !function_exists( 'fx_var_dump' ) ) {
    function fx_var_dump( $var = null, bool $esc_html = false ): void {
        if( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || 'development' === wp_get_environment_type() ) {
            echo '<pre><code>'; 

            if( $esc_html && is_string( $var ) ) {
                $var = esc_html( $var );
            }

            var_dump( $var );

            echo '</code></pre>';
        }
    }
}


/**
 * Get attachment ID for client logo
 * 
 * The image for the client logo can be set in WP Admin > Theme Settings > Media Assets > Logo
 *
 * @return  int|null     Attachment ID if logo has been set in admin; otherwise, null
 */
function fx_get_client_logo_image_id() {
    $logo_id = get_field( 'logo', 'option' );

    return $logo_id ?: null;
}


/**
 * Get client telephone number
 * 
 * The phone number can be set in WP Admin > Theme Settings > Contact Info > Phone
 *
 * @param	bool    $raw    Get phone number with special characters stripped (ideal for usage with tel: protocol)
 * @return  string|null     String if phone number set in admin; otherwise, null
 */
function fx_get_client_phone_number( bool $raw = false ) {
    $phone_number = get_field( 'phone', 'option' );

    if( !empty( $phone_number ) ) {
        if( $raw ) {
            $phone_number = fx_string_strip_special( $phone_number );
        }

        return $phone_number;
    }

    return null;
}


/**
 * Get client email address
 * 
 * The email address can be set in WP Admin > Theme Settings > Contact Info > Email
 *
 * @param	bool    $antispam   Get email address with random characters converted to HTML entities to deter spambots
 * @return  string|null         String if email address is set in admin and valid; otherwise, null
 */
function fx_get_client_email( bool $antispam = false ) {
    $email_address = get_field( 'email', 'option' );

    if( !empty( $email_address ) && is_email( $email_address ) ) {
        if( $antispam ) {
            $email_address = antispambot( $email_address );
        }

        return $email_address;
    }

    return null;
}


/**
 * Get client physical address
 * 
 * The physical address can be set in WP admin > Theme Settings > Contact Info > Address
 *
 * @return  string|null     String if email address is set in admin and valid; otherwise, null
 */
function fx_get_client_address() {
    $address = get_field( 'address', 'option' );

    return $address ?: null;
}


/**
 * Get client physical address
 * 
 * The physical address can be set in WP admin > Theme Settings > Contact Info > Address
 *
 * @return  string|null     String if email address is set in admin and valid; otherwise, null
 */
function fx_get_featured_testimonial_id() {
    $args_list = array(
        'post_type'     => 'testimonial',
        'post_status'   => 'publish',
        'posts_per_page' => 1,
    );

    $meta_query[] = array(
        'relation' => 'AND',
        array(
            'key' => 'featured',
            'value' => '1',
            'compare' => '='
        )
    );

    $args_list['meta_query'] = $meta_query;
    $query = new WP_Query( $args_list );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            return get_the_ID() ?: null;
        }
    }
   
}