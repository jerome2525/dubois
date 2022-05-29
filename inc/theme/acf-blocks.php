<?php

/**
 * Register FX blocks
 * 
 * fx_register_block() is, at its core, a wrapper function for acf_register_block_type with additional parameters for 
 * our supporting functionality 
 * 
 * @see Guru card: https://app.getguru.com/card/Tn9zzk8c/FX-ACF-Blocks
 * @see more info for acf_register_block_type(): https://www.advancedcustomfields.com/resources/acf_register_block_type/
 * 
 * Below is a reference for the parameters you can pass to fx_register_block(). You can also pass any setting from 
 * acf_register_block_type() to fx_register_block().
 * 
 * Required arguments: "name", "title", and "template"
 * 
 */

// @todo — remove $reference_settings before launch
$reference_settings = [

    // required
    'name'                  => '', // (string) unique name to identify block (no spaces)
    'title'                 => '', // (string) display title for block
    'template'              => '', // (string) relative path of the template for block (e.g "/block-templates/innerpage/template.php")
    
    // optional
    'css'                   => '', // (string) block-specific stylesheet. Assumed to be in /themes/fx/assets/css, so use relative path (e.g. "homepage/homepage-block.css")
    'css_deps'              => [], // (array|string) CSS dependency handles. These will be loaded before block's stylesheet. Dependencies must already be registered
    'js'                    => '', // (string) block-specific script. Assumed to be in /themes/fx/assets/js, so use relative path (e.g. "homepage/homepage-block.js")
    'js_deps'               => [], // (array|string) JS dependency handles. These will be loaded before block's script. Dependencies must already be registered
    'description'           => '', // (string) short, useful description of block to indicate block's purpose
    'category'              => '', // (string) category for where block appears in Block Library
    'icon'                  => '', // (array|string) can be a dashicon or SVG image used to identify the block
    'keywords'              => '', // (array) terms to help find block in block editor
    'post_types'            => [], // (array) if declared, will restrict block to being available for only specified post types. Default is "page"
    'exclude_post_types'    => [], // (array) post types that block should NOT appear for
    'mode'                  => '', // (string) display mode for block when you add block in Block Editor
    'supports'              => '', // (associative array) features to support. See https://developer.wordpress.org/block-editor/developers/block-api/block-supports/
];




/**
 * General blocks
 * 
 * These blocks are intended to be used anywhere, including the homepage and innerpage.
 * 
 * Block template path: /themes/fx/block-templates/general
 * Stylesheet path:     /themes/fx/assets/css/general
 * Script path:         /themes/fx/assets/js/general
 * 
 */


/**
 * Create a "FX General Blocks" category in the block editor. Use "fx-general-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX General Blocks', 'fx-general-blocks' );


/**
 * Plain WYSIWYG block for general usage
 * 
 */
fx_register_block(
    [
        'name'          => 'wysiwyg',
        'title'         => 'WYSIWYG',
        'template'      => 'general/wysiwyg.php',
        'description'   => 'A basic "What you see is what you get" editor.',
        'css_deps'      => [ 'fx_wysiwyg', 'contact-form-7' ],
        'post_types'    => [],
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/wysiwyg.png',
                    'is_preview'    => true
                )
            )
        ) 
    ]
);

/**
 * Plain WYSIWYG block with Button link for general usage
 * 
 */
fx_register_block(
    [
        'name'          => 'wysiwyg-button',
        'title'         => 'WYSIWYG with Buttons',
        'template'      => 'general/wysiwyg-button.php',
        'description'   => 'A basic "What you see is what you get" editor and it has link buttons',
        'css_deps'      => [ 'fx_wysiwyg' ],
        'post_types'    => [],
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/wysiwyg-button.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


/**
 * To avoid issues with CF7 assets, we're creating our own CF7 block. You shouldn't need to touch this section.
 *
 */
$cf7_settings = [
    'name'          => 'cf7-block',
    'title'         => 'CF7 Block',
    'template'      => 'general/cf7-block.php',
    'description'   => 'Adds a CF7 block to page',
    'css'           => 'general/contact-form.css',
    'css_deps'      => [ 'fx_choices_custom', 'contact-form-7' ],
    'js_deps'       => [ 'contact-form-7', 'wpcf7-recaptcha', 'google-recaptcha' ],
    'keywords'      => [ 'cf7', 'contact', 'form' ],
    'mode'          => 'edit',
    'post_types'    => [],
    'example'       => array(
        'attributes' => array(
            'mode' => 'preview',
            'data' => array(
                'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/contact-form.png',
                'is_preview'    => true
            )
        )
    ) 
];
$cf7_icon = WP_PLUGIN_DIR . '/contact-form-7/assets/icon.svg';
if( file_exists( $cf7_icon ) ) {
    $cf7_settings['icon'] = file_get_contents( $cf7_icon );
}
fx_register_block( $cf7_settings );

// @todo — add additional general blocks below with the "fx-general-blocks" category




/**
 * Homepage blocks
 * 
 * These blocks are intended to be used ONLY on the homepage.
 * 
 * Block template path: /themes/fx/block-templates/homepage
 * Stylesheet path:     /themes/fx/assets/css/homepage
 * Script path:         /themes/fx/assets/js/homepage
 * 
 */

/**
 * Create a "FX Homepage Blocks" category in the block editor. Use "fx-homepage-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX Homepage Blocks', 'fx-homepage-blocks' );


/**
 * This is the main homepage "outer block." All other homepage blocks should be added within this block in the Block 
 * Editor and in block-templates/homepage/homepage-block.php
 * 
 */
fx_register_block(
    [
        'name'          => 'homepage-block',
        'title'         => 'Homepage',
        'template'      => 'homepage/homepage-block.php',
        'description'   => 'The main content block for the homepage',
        'mode'          => 'preview',
        'supports'      => [ 'jsx' => true ], // enables support for inner blocks
        'category'      => 'fx-homepage-blocks',
    ]
);

// @todo —  remove this block if not using a homepage masthead slider

fx_register_block(
    [
        'name'          => 'homepage-masthead-slider',
        'title'         => 'Homepage - Masthead Slider',
        'template'      => 'homepage/masthead-slider.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/masthead-slider.css',
        'css_deps'      => [ 'fx_slick' ],
        'js'            => 'homepage/masthead-slider.js',
        'js_deps'       => [ 'fx_slick' ],
        'category'      => 'fx-homepage-blocks',
    ]
);

// Product Detail Block
fx_register_block(
    [
        'name'          => 'homepage-product-detail',
        'title'         => 'Homepage - Product Detail Block',
        'template'      => 'homepage/product-detail-block.php',
        'description'   => 'Block for the homepage product detail.',
        'css'           => 'homepage/product-detail-block.css',
        'css_deps'      => [ 'fx_readmore' ],
        'js'            => 'homepage/product-detail-block.js',
        'category'      => 'fx-homepage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/homepage/product-detail.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);

// Product Image buttons
fx_register_block(
    [
        'name'          => 'homepage-product-image-buttons',
        'title'         => 'Homepage - Product Image buttons',
        'template'      => 'homepage/product-image-buttons.php',
        'description'   => 'Block for the Product Image buttons.',
        'css'           => 'homepage/product-image.css',
        'category'      => 'fx-homepage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/homepage/product-image-buttons.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);

// Product Card
fx_register_block(
    [
        'name'          => 'homepage-product-card',
        'title'         => 'Homepage - Product Card',
        'template'      => 'homepage/product-card.php',
        'description'   => 'Block for the Product Card.',
        'css'           => 'homepage/product-card.css',
        'category'      => 'fx-homepage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/homepage/product-card.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// Image Text
fx_register_block(
    [
        'name'          => 'homepage-half-image-text',
        'title'         => 'Homepage - Half Image Text',
        'template'      => 'homepage/half-image-text.php',
        'description'   => 'Block for the Product Card.',
        'css_deps'      => ['fx_half_image_text'],
        'category'      => 'fx-homepage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/homepage/half-image-text.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);

// Testimonial Block
fx_register_block(
    [
        'name'          => 'homepage-testimonial-block',
        'title'         => 'Homepage - Testimonial Block',
        'template'      => 'homepage/testimonial-block.php',
        'description'   => 'Block for the Testimonial Block.',
        'css'           => 'homepage/testimonial-block.css',
        'category'      => 'fx-homepage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/homepage/testimonial.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// CTA Block
fx_register_block(
    [
        'name'          => 'homepage-cta-block',
        'title'         => 'Homepage - CTA Block',
        'template'      => 'homepage/cta-block.php',
        'description'   => 'Block for the CTA Block.',
        'css'           => 'homepage/cta-block.css',
        'category'      => 'fx-homepage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/homepage/cta.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);







/**
 * Innerpage blocks
 * 
 * These blocks are intended to be used ONLY on innerpages
 * 
 * Block template path: /themes/fx/block-templates/innerpage
 * Stylesheet path:     /themes/fx/assets/css/innerpage
 * Script path:         /themes/fx/assets/js/innerpage
 * 
 */

/**
 * Create a "FX Innerpage Blocks" category in the block editor. Use "fx-innerpage-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX Innerpage Blocks', 'fx-innerpage-blocks' );

// @todo — add additional innerpage blocks below with the "fx-innerpage-blocks" category

// CTA Bar
fx_register_block(
    [
        'name'          => 'cta-bar',
        'title'         => 'CTA Bar',
        'template'      => 'innerpage/cta-bar.php',
        'description'   => 'Block for the CTA Bar.',
        'css'           => 'innerpage/cta-bar.css',
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/cta-bar.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// CTA Bar Product cut-out
fx_register_block(
    [
        'name'          => 'cta-bar-product',
        'title'         => 'CTA Bar Product cut-out',
        'template'      => 'innerpage/cta-bar-product.php',
        'description'   => 'Block for the CTA Bar Product cut-out.',
        'css'           => 'homepage/cta-block.css',
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/cta-bar-cut.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// Image Text
fx_register_block(
    [
        'name'          => 'image-text',
        'title'         => 'Image Text',
        'template'      => 'innerpage/image-text.php',
        'description'   => 'Block for Image Text.',
        'css_deps'      => ['fx_contained_image_text'],
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/image-text.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// Inner Product Block
fx_register_block(
    [
        'name'          => 'inner-product-block',
        'title'         => 'Inner Product Block',
        'template'      => 'innerpage/inner-product-block.php',
        'description'   => 'Block for Inner Product Block.',
        'css'           => 'innerpage/product-details.css',
        'css_deps'      => [ 'fx_slick' ],
        'js'           => 'innerpage/product-gallery.js',
        'js_deps'      => [ 'fx_slick' ],
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/inner-product.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// Two Column List Block
fx_register_block(
    [
        'name'          => 'two-column-list',
        'title'         => 'Two Column List Block',
        'template'      => 'innerpage/two-column-list.php',
        'description'   => 'Block for Two Column List Block.',
        'css_deps'      => [ 'fx_wysiwyg' ],
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/two-column.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);

// FX Testimonial List
fx_register_block(
    [
        'name'          => 'testimonial-list',
        'title'         => 'FX Testimonial List',
        'template'      => 'innerpage/testimonial-list.php',
        'description'   => 'Block for the Testimonial List.',
        'css'           => 'homepage/testimonial-block.css',
        'css_deps'      => [ 'fx_slick' ],
        'js'            => 'innerpage/testimonial-list.js',
        'js_deps'       => [ 'fx_slick', 'jquery' ],
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/testimonial-list.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);


// FX Recommended Pages
fx_register_block(
    [
        'name'          => 'recommended-page',
        'title'         => 'FX Recommened Pages',
        'template'      => 'innerpage/recommended-page.php',
        'description'   => 'All the settings are in the Theme Settings.',
        'category'      => 'fx-innerpage-blocks',
        'example'       => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri(). '/assets/img/block-previews/innerpage/testimonial-list.png',
                    'is_preview'    => true
                )
            )
        )
    ]
);








