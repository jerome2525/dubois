        <?php
            // gets contact information set in Theme Settings
            $address    = fx_get_client_address();
            $email      = fx_get_client_email( true );
            $phone      = fx_get_client_phone_number();
            $phone_link = fx_get_client_phone_number( true );
            $home_url   = get_home_url();
        ?>
        <footer class="page-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <?php if( get_field('footer_logo', 'option') ): ?>
                                    <div class="col-sm-6 col-lg-12">
                                        <div class="footer-logo">
                                            <a href="<?php echo $home_url; ?>"><?php echo fx_get_image_tag( get_field('footer_logo', 'option'), '', 'full', true, [ 'alt' => 'Dubois Equipment Company, LLC' ] ); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>    
                                <?php if( get_field('usa_logo', 'option') ): ?>
                                    <div class="col-sm-6 col-lg-12">
                                        <div class="footer-info">
                                            <?php echo fx_get_image_tag( get_field('usa_logo', 'option'), '', 'full', true, [ 'alt' => 'Proudly made in the USA' ] ); ?> Proudly made in the USA
                                        </div>
                                    </div>
                                <?php endif; ?>  
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <?php if( $address ): ?>
                                    <div class="col-sm-6 col-lg-12">
                                        <div class="footer-address">
                                            <i class="icon-Map-pin"></i> <?php echo $address; ?>
                                            <?php if( get_field('google_map_url', 'option') ): ?>
                                                <a href="<?php echo get_field('google_map_url', 'option'); ?>" target="_blank" class="btn btn-secondary">View in google maps</a>
                                            <?php endif; ?>  
                                        </div>
                                    </div>
                                <?php endif; ?>    
                                <div class="col-sm-6 col-lg-12">
                                    <?php if( $phone ): ?>
                                        <div class="footer-tel">
                                            <a href="tel:<?php echo $phone; ?>"><i class="icon-phone"></i> <?php echo $phone; ?></a>
                                        </div>
                                    <?php endif; ?> 
                                    <div class="back-top hidden-lg">
                                        <a href="javascript:void(0);" class="back-to-top">BACK TO TOP <i class="icon-arrow-up"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 hidden-md-down">
                            <div class="footer-link">
                                <?php
                                    $back = '<div class="back-top"><a href="javascript:void(0);" class="back-to-top">BACK TO TOP <i class="icon-arrow-up"></i> </a></div>';
                                    $items_wrap = '<ul id="%1$s" class="%2$s">%3$s';
                                    $items_wrap .= sprintf( '<li>%1$s</li></ul>', $back );
                                    wp_nav_menu(
                                        [
                                            'menu_class'        => 'menu-footer-navigation',
                                            'depth'             => 1,
                                            'theme_location'    => 'footer_menu',
                                            'items_wrap'        => $items_wrap,
                                        ]
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-flex">
                        <div class="social-media">
                            <ul class="clearfix">
                                <?php if( get_field('facebook', 'option') ): ?>
                                    <li><a href="<?php echo get_field('facebook', 'option'); ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                                <?php endif; ?>    
                                <?php if( get_field('linkedin', 'option') ): ?> 
                                    <li><a href="<?php echo get_field('linkedin', 'option'); ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                                <?php endif; ?> 
                                <?php if( get_field('youtube', 'option') ): ?>
                                    <li><a href="<?php echo get_field('youtube', 'option'); ?>" target="_blank"><i class="icon-youtube"></i></a></li>
                                <?php endif; ?> 
                            </ul>
                        </div>
                        <div class="footer-left">
                            <?php
                                wp_nav_menu(
                                    [
                                        'menu_class'        => 'menu-copyright-navigation',
                                        'depth'             => 1,
                                        'theme_location'    => 'copyright_menu'
                                    ]
                                );
                            ?>
                            <p>Copyright © <?php echo date("Y"); ?>. All Rights Reserved.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
        
    </body>
</html>
