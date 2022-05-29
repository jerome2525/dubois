<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 
    <!-- font-family: 'Sora', sans-serif; -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">

    <?php wp_body_open(); ?>

    <?php
        // gets client logo image set in Theme Settings
        // @todo — replace with get_custom_logo
        $logo_id    = fx_get_client_logo_image_id(); 
        $home_url   = get_home_url();
        $contact_link     = get_field('contact_page', 'option');
    ?>
    <header class="page-header">
        <div class="header-top hidden-sm-down hidden-md">
            <div class="container">
                <div class="header-top-wrapper">
                    <div class="header-top-link">
                        <div class="top-menu hidden-md-down">
                            <?php
                                wp_nav_menu(
                                    [
                                        'menu_class'        => 'menu-top-navigation',
                                        'depth'             => 2,
                                        'theme_location'    => 'top_menu',
                                    ]
                                );
                            ?>
                        </div>
                    </div>
                    <div class="search-header">
                        <?php get_search_form(); ?>
                    </div>
                    <?php if ( get_field('phone', 'option' ) ) : ?>
                        <div class="header-phone"><a href="tel:<?php echo get_field('phone', 'option'); ?>"><i class="icon-phone"></i> <?php echo get_field('phone', 'option'); ?></a></div>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container clearfix">
                <div class="logo"><a class="site-logo" href="<?php echo esc_url( $home_url ); ?>"><?php echo fx_get_image_tag( $logo_id, 'img-responsive', 'full', true, [ 'alt' => 'Dubois Equipment Company, LLC' ] ); ?></a></div>

                <div class="header-right">
                    <div class="desktop-menu hidden-sm-down hidden-md">
                        <?php ubermenu( 'main' ); ?>
                    </div>

                    <?php if ( get_field('phone', 'option' ) ) : ?>
                        <div class="header-phone hidden-xs-down hidden-lg"><a href="tel:<?php echo get_field('phone', 'option'); ?>"> <i class="icon-phone"></i> <?php echo get_field('phone', 'option'); ?></a></div>
                    <?php endif; ?> 
                    <?php if ( $contact_link['url'] ) : ?> <div class="header-contact-btn hidden-xs-down"><a href="<?php echo $contact_link['url']; ?>" class="btn btn-primary">Contact us</a></div><?php endif; ?> 
                    <div class="search-icon js-search-toggle hidden-lg"><i class="icon-search"></i> <span> SEARCH </span></div>
                    <div class="toggle-menu hidden-xs-down hidden-lg ubermenu-responsive-toggle">
                        <?php ubermenu_toggle(); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Nav -->
    <div class="nav-fixed hidden-sm-up">
        <?php if ( get_field('phone', 'option' ) ) : ?>
            <div class="call-btn"><a href="<?php echo get_field('phone', 'option'); ?>" class="fixed-btn"><i class="icon-phone"></i> CALL US</a></div>
        <?php endif; ?>
        <?php if ( $contact_link['url'] ) : ?>
            <div class="contact-btn"><a href="<?php echo $contact_link['url']; ?>" class="fixed-btn"><?php echo fx_get_image_tag( 38, 'img-responsive', 'full', true, [ 'alt' => 'Contact chat' ] ); ?> CONTACT US</a></div>
        <?php endif; ?> 
        <div class="toggle-menu ubermenu-responsive-toggle"><?php ubermenu_toggle(); ?></div>
    </div>
    <div class="search-div desktop-menu__search">
        <div class="container clearfix">
            <div class="search-content">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
