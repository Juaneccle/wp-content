/**
 * Custom js for Coherent
 */

( function( $ ) {
	var $window       = $( window ),
	  $document = $( document ),
	  resizeTimer,
	  toolbarHeight,
	  slideMenu = $( '.slide-panel' ),
	  body = $( 'body' ),
	  actionText = $('.action-text'),
	  menuToggle = $( '.menu-toggle' );

	/**
    * Full width feature images
    *
    * Makes full width images have a class.
    *
    */
	function bigImageClass() {
		$( '.entry-content img.size-full' ).each( function() {
			var img = $( this ),
			newImg = new Image();

			newImg.src = img.attr( 'src' );

			$( newImg ).load( function() {
				var imgWidth = newImg.width;

				if ( imgWidth >= 1080 ) {
					$( img ).addClass( 'size-big' );
				}

			} );
		} );
	}

	/**
    * Full screen size images: props to Resonar for solution
    *
    */
	function fullscreenFeaturedImage() {
		var entryHeaderBackground, entryHeaderHeight, windowWidth;
		entryHeaderBackground = $( '.feature-header' );

		if ( ! entryHeaderBackground ) {
			return;
		}

		toolbarHeight     = body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;
		entryHeaderHeight = $window.height();
		windowWidth       = $window.width();

		entryHeaderBackground.css( {
			'height': entryHeaderHeight + 'px',
			'margin-top': '-' + toolbarHeight + 'px',
		} );
	}

	/**
    * Sliding panel
    *
    * Swaps classes for sliding panel so it uses CSS transformations.
    *
    */
    function slideControl() {
		menuToggle.on( 'click', function( e ) {
			e.preventDefault();
			var $this = $( this );

			// Remove mejs players from sidebar
			$( '#secondary .mejs-container' ).each( function( i, el ) {
				if ( mejs.players[ el.id ] ) {
					mejs.players[ el.id ].remove();
				}
			} );

			slideMenu.toggleClass( 'expanded' ).resize();
			body.toggleClass( 'sidebar-open' );

			$this.toggleClass( 'toggle-on' );
			$this.attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');

			if( slideMenu.hasClass( 'expanded' ) ) {
            	actionText.text( menuToggleText.hide );

        		// Re-initialize mediaelement players.
				setTimeout( function() {
					if ( window.wp && window.wp.mediaelement ) {
						window.wp.mediaelement.initialize();
					}
				} );

				// Trigger resize event to display VideoPress player.
				setTimeout( function(){
					if ( typeof( Event ) === 'function' ) {
						window.dispatchEvent( new Event( 'resize' ) );
					} else {
						var event = window.document.createEvent( 'UIEvents' );
						event.initUIEvent( 'resize', true, false, window, 0 );
						window.dispatchEvent( event );
					}
				} );

        	} else {
        		actionText.text( menuToggleText.show );
        	}

			//Close slide menu with double click
			body.dblclick( function( e ) {
				e.preventDefault();
				slideMenu.removeClass( 'expanded' ).resize();
				$( this ).removeClass( 'sidebar-open' );
				menuToggle.removeClass( 'toggle-on' );
			} );
		} );

	}

	/**
    * Navigation sub menu show and hide
    *
    * Show sub menus with an arrow click to work across all devices
    * This switches classes and changes the genericon.
    *
    */
    $( '.main-navigation .page_item_has_children > a, .main-navigation .menu-item-has-children > a' ).append( '<button class="showsub-toggle" aria-expanded="false"></button>' );

    $( '.showsub-toggle' ).click( function( e ) {
        e.preventDefault();
        var $this = $( this );
        $this.toggleClass( 'sub-on' );
        $this.parent().next( '.children, .sub-menu' ).toggleClass( 'sub-on' );
        $this.attr( 'aria-expanded', $this.attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');
    } );

	/**
    * Close slide menu with escape key
    *
    * Adds in this functionality
    *
    */
	$document.keyup( function( e ) {
		if ( e.keyCode === 27 && slideMenu.hasClass( 'expanded' ) ) {
			body.removeClass( 'sidebar-open' );
			menuToggle.removeClass( 'toggle-on' );
			slideMenu.removeClass( 'expanded' ).resize();

			if( slideMenu.hasClass( 'expanded' ) ) {
            	actionText.text( menuToggleText.hide );
        	} else {
        		actionText.text( menuToggleText.show );
        	}
		}
	} );

	/**
    * Loader for all the theme functions: props to Resonar for resizing
    *
    */
    $window.on( 'resize', function() {
		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( function() {
			fullscreenFeaturedImage();
		}, 100 );
    } );

	$document.ready( function() {
		fullscreenFeaturedImage();
		bigImageClass();
		slideControl();
	} );

} )( jQuery );
