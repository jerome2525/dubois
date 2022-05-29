/* ---------------------------------------------------------------------
	Global Js
	Target Browsers: All

	HEADS UP! This script is for general functionality found on ALL pages and not tied to specific components, blocks, or
	plugins. 

	If you need to add JS for a specific block or component, create a script file in js/components or js/blocks and
	add your JS there. (Don't forget to enqueue it!)
------------------------------------------------------------------------ */

var FX = ( function( FX, $ ) {

	/**
	 * Doc Ready
	 * 
	 * Use a separate $(function() {}) block for each function call
	 */
	$( () => {
		FX.General.init(); // For super general or super short scripts
	})

    $( () => {
        FX.ExternalLinks.init(); // Enable by default
	})

    $( () => {
        FX.Menu.init();
	})

	$( () => {
        FX.Affix.init();
	})

	$( () => {
        FX.MobileMenu.init();
	})
	
	$(window).on( 'load', () => {
		FX.BackToTop.init()
	})



	/**
	 * Example Code Block - This should be removed
	 * @type {Object}
	 */
	FX.CodeBlock = {
		init() {

		},
	};



	/**
	 * Display scroll-to-top after a certain amount of pixels
	 * @type {Object}
	 */
	FX.BackToTop = {
		$btn: null,

		init() {
			this.$btn = $('.back-to-top');

			if( this.$btn.length ) {
				this.bind();
			}
		},

		bind() {
			$(window).on( 'scroll load', this.maybeShowButton.bind( this ) );
			this.$btn.on( 'click', this.scrollToTop );
		},

		maybeShowButton() {
			if( $( window ).scrollTop() > 100 ) { // TODO: Update "100" for how far down page to show button
				this.$btn.removeClass( 'hide' );
			} else {
				this.$btn.addClass( 'hide' );
			}
		},

		scrollToTop() {
			$(window).scrollTop( 0 );
		}
	};

	
	
	/**
	 * General functionality — ideal for one-liners or super-duper short code blocks
	 */
	FX.General = {
		init() {
			this.bind();
			this.inputEffects()
		},

		bind() {

			// Makes all PDF to open in new tabs
			$('a[href*=".pdf"]').each( e => {
				$(this).attr('target', '_blank');
			});

			// FitVids - responsive videos
			$('body').fitVids();

			// Input on focus remove placeholder
			$('input,textarea').focus( () => {
				$(this).removeAttr('placeholder');
			});
			
			// nav search toggle
			$('.js-search-toggle').on('click', () => {
				$('.desktop-menu__phone, .js-search-toggle, .desktop-menu__search').toggleClass('js-search-active');
                $('.desktop-menu__search input[name="s"]').focus();
			});
			
			$('.ubermenu-responsive-toggle.toggle-menu i').removeClass('fas fa-bars').addClass('icon-menu');
			$('.ubermenu-sub-indicator-close i').removeClass('fa-times').addClass('fa-angle-up');
			$('.toggle-menu').click( function() {
				$('.nav-fixed').toggleClass('hidden-sm-up');
				$('.nav-fixed .toggle-menu a').toggleClass('close-active');
				$('.nav-fixed .toggle-menu i').toggleClass('icon-menu fas fa-times');
			});

			// Add Current URL in cf7 hidden field url
			var url = window.location.href;   
			$('input.hidden-url').attr('value', url ); 	

			//wcf7 error message
			$('.wpcf7-submit').click(function() {
				$('.choices__inner').removeClass('error');
				setTimeout( function() {
					$('select.wpcf7-not-valid').parent().addClass('error');

					$('.wpcf7-not-valid-tip').append('<span class="info">!</span>');
				}, 2000);
			});


			$('.wysiwyg p a img').parent().addClass('disabled-link-effects');

		},	


		/**
		 * Adds special classes to form elements when user clicks/fills fields
		 * 
		 */
		inputEffects() {
			$('input, textarea').on('click focus blur', e => {
				const $el = $(e.currentTarget)
				const $wrapper = $el.closest('.wpcf7-form-control-wrap')
				const { type } = e

				if ('click' === type || 'focus' === type) {
					$wrapper.addClass('input-has-value')
				} else if ('blur' === type) {
					if ('' === $el.val()) {
						$wrapper.removeClass('input-has-value')
					}
				}
			})
		}
	};



	/**
	 * Mobile menu script for opening/closing menu and sub menus
	 * @type {Object}
	 */
	FX.MobileMenu = {
		init() {
			$('.nav-primary li.menu-item-has-children > a').after('<span class="sub-menu-toggle icon-down-chevron"></span>');

			$('.sub-menu-toggle' ).click( () => {
				var $this = $(this),
					$parent = $this.closest( 'li' ),
					$wrap = $parent.find( '> .sub-menu' );

				$wrap.toggleClass('js-toggled');
				$this.toggleClass('js-toggled');
			});
		}
	};



	/**
	 * Ubermenu mobile menu toggle hack
	 * @type {Object}
	 */
	FX.Menu = {
		windowWidth: 		0,
		$ubermenu: 			$('#ubermenu-nav-main-4x'), // replace with ID of ubermenu element
		$topLevelMenuItems: null,
		$mobileMenuToggle: 	$('.ubermenu-responsive-toggle'),


        init() {
            this.setMenuClasses();
			this.setSubMenuClasses();

			this.$topLevelMenuItems = this.$ubermenu.children('.ubermenu-item-level-0');
			this.bind();
        },

        setMenuClasses() {
            let windowWidth = $( window ).innerWidth();

            // iOS fires resize event on scroll - let's first make sure the window width actually changed
            if ( windowWidth == this.windowWidth ) {
                return;
            }

            this.windowWidth = windowWidth;

            if ( this.windowWidth < 1025 ) {
                $('.ubermenu-item-has-children').each( () => {
                    $(this).removeClass('ubermenu-has-submenu-drop');
                });

            } else {
                $('.ubermenu-item-has-children').each( () => {
                    $(this).addClass('ubermenu-has-submenu-drop');
                });
            }
        },

		setSubMenuClasses() {
			$('.ubermenu-item-has-children').each( () => {
                $(this).children('a').each( () => {
                    let $this = $(this);
                    $this.children('.ubermenu-sub-indicator').clone().insertAfter( $this).addClass('submenu-toggle hidden-md-up');
                    $this.children('.ubermenu-sub-indicator').addClass('hidden-sm-down');
                });
			});
		},

        bind() {
			$(window).on( 'resize', this.setMenuClasses.bind(this) );

			$('.submenu-toggle').on( 'touchstart click', this.toggleNextLevel );

			this.$topLevelMenuItems.on( 'ubermenuopen', this.handleUbermenuOpen.bind( this ) )
			this.$topLevelMenuItems.on( 'ubermenuclose', this.handleUbermenuClose.bind( this ) )

			// when clicking to open/close mobile menu toggle
			this.$mobileMenuToggle.on( 'ubermenutoggledopen', this.handleUbermenuOpen.bind( this ) )
			this.$mobileMenuToggle.on( 'ubermenutoggledclose', this.handleUbermenuClose.bind( this ) )
		},

		handleUbermenuOpen( e ) {
			const self = this,
				$container = self.$ubermenu.closest('.desktop-menu')

			$(document.body).addClass('menu-is-active')

			$container.addClass('menu-is-active')
			self.$mobileMenuToggle.addClass('menu-is-active')
		},


		handleUbermenuClose( e ) {
			const self = this,
				$container = self.$ubermenu.closest('.desktop-menu')

			$(document.body).removeClass('menu-is-active')
			$container.removeClass('menu-is-active')
			self.$mobileMenuToggle.removeClass('menu-is-active')
		},


		/* handleResponsiveToggleClick( e ) {
			const $btn = $(e.currentTarget),
				$menu = $('.desktop-menu').find('.ubermenu-main')

			$btn.toggleClass('menu-is-active', $menu.hasClass('ubermenu-responsive-collapse') )
		}, */


        toggleNextLevel( e ) {
            let $this = $( this );
            
			e.preventDefault();
			
            $this.toggleClass('fa-angle-down').toggleClass('fa-times');
            $this.parent().toggleClass('ubermenu-active');
            if( $this.parent().hasClass('ubermenu-active') ) {
                $this.parent().siblings('.ubermenu-active').removeClass('ubermenu-active').children('.submenu-toggle').addClass('fa-angle-down').removeClass('fa-times');
            }
        }
	}



	/**
	 * Force External Links to open in new window.
	 * @type {Object}
	 */
	FX.ExternalLinks = {
		init() {
			var siteUrlBase = FX.siteurl.replace( /^https?:\/\/((w){3})?/, '' );

			$( 'a[href*="//"]:not([href*="'+siteUrlBase+'"])' )
				.not( '.ignore-external' ) // ignore class for excluding
				.addClass( 'external' )
				.attr( 'target', '_blank' )
				.attr( 'rel', 'noopener' );
		}
	};



	/**
	 * Affix
	 * Fixes sticky items on scroll
	 * @type {Object}
	 */
	FX.Affix = {

		init: function() {
            this.windowHeight = $(window).height();
            this.bind();
        },

        bind: function(e) {
            $(window).on('scroll', this.scroll);
            $(window).on('resize', this.updateWindowHeight);
        },
		
		scroll:function(){ 
			var fromTopPx = 200; 
			var scrolledFromtop = $(window).scrollTop(); 
			if(scrolledFromtop > 150){ $('.page-header').addClass('hideheader'); }
			else{ $('.page-header').removeClass('hideheader'); } 
			if(scrolledFromtop > fromTopPx){ $('.page-header').addClass('js-scrolled'); $('.mastheads').addClass('scrolled'); $('.masthead-inner').addClass('scrolled'); }
			else{ $('.page-header').removeClass('js-scrolled'); $('.masthead').removeClass('scrolled'); $('.masthead-inner').removeClass('scrolled'); } },
		};



	/**
	 * FX.SmoothAnchors
	 * Smoothly Scroll to Anchor ID
	 * @type {Object}
	 */
	FX.SmoothAnchors = {
		hash: null,

		init() {
			this.hash = window.location.hash;

			if( '' !== this.hash ) {
				this.scrollToSmooth( this.hash );
			}

			this.bind();
		},

		bind() {
			$( 'a[href^="#"]' ).on( 'click', $.proxy( this.onClick, this ) );
		},

		onClick( e ) {
			e.preventDefault();

			var target = $( e.currentTarget ).attr( 'href' );

			this.scrollToSmooth( target );
		},

		scrollToSmooth( target ) {
			var $target = $( target ),
				headerHeight = 0 // TODO: if using sticky header change to $('#page-header').outerHeight(true)
			
			$target = ( $target.length ) ? $target : $( this.hash );

			if ( $target.length ) {
				var targetOffset = $target.offset().top - headerHeight;

				$( 'html, body' ).animate({ 
					scrollTop: targetOffset 
				}, 600 );

				return false;
			}
		}
	};

	

	return FX;

} ( FX || {}, jQuery ) );
