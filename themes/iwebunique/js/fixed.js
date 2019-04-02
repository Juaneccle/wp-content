/**
 * File fixed.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * @package iwebunique
 */

// Menu toggle open box top morgin

						// screen width >600 and <968
 ( function( $ ) {
		var iwebunique_scrwdth = $( window ).width();
	if (iwebunique_scrwdth > 600 && iwebunique_scrwdth < 968) {
		$( document ).ready(function(){
				var iwebunique_imgHeight6 = $( ".fullwidth" ).height();
				 var abc = (iwebunique_imgHeight6 - 26) / 2;
				 var def = (abc + 26 + 10);
				$( ".nav-menu" ).css( {"margin-top":def} );
		});

				$( document ).ready(function(){
						$( window ).resize(function(){
							if ($( window ).width() > 968) {
								$( ".nav-menu" ).css( {"margin-top":"0"} );
							}
						});
				});
				$( document ).ready(function(){
						$( window ).resize(function(){
							if ($( window ).width() < 600) {
								$( ".nav-menu" ).css( {"margin-top":"0"} );
							}
						});
				});
				$( document ).ready(function(){
						$( window ).resize(function(){
							var iwebunique_scrwdth = $( window ).width();
							if (iwebunique_scrwdth > 600 && iwebunique_scrwdth < 968) {
								var iwebunique_imgHeight6 = $( ".fullwidth" ).height();
								 var abc = (iwebunique_imgHeight6 - 26) / 2;
								 var def = (abc + 26 + 10);
								$( ".nav-menu" ).css( {"margin-top":def} );
							}
						});
				});
	}
 } )( jQuery );

( function( $ ) {
	var iwebunique_scrwdth = $( window ).width();
	if (iwebunique_scrwdth < 600 || iwebunique_scrwdth > 968) {
		   $( document ).ready(function(){
			   $( window ).resize(function(){
				   var iwebunique_scrwdth2 = $( window ).width();
				   if (iwebunique_scrwdth2 < 968 || iwebunique_scrwdth2 > 600) {
					var iwebunique_imgHeight6 = $( ".fullwidth" ).height();
					var abc = (iwebunique_imgHeight6 - 26) / 2;
					var def = (abc + 26 + 10);
					$( ".nav-menu" ).css( {"margin-top":def} );
				   }
				   if (iwebunique_scrwdth2 > 968 || iwebunique_scrwdth2 < 600) {
					$( ".nav-menu" ).css( {"margin-top":"0"} );
				   }
			   });
		   });
	}
} )( jQuery );

// Add Class for fixed header with BG color change

( function( $ ) {
			$( window ).scroll(function(){
				if ( $( window ).scrollTop() >= 20 ) {
					$( '.fullwidth' ).addClass( 'fixed-header' );
				} else {
					$( '.fullwidth' ).removeClass( 'fixed-header' );
				}
			});

		$( window ).resize(function(){
			$( window ).scroll(function(){
				if ( $( window ).scrollTop() >= 20 ) {
					$( '.fullwidth' ).addClass( 'fixed-header' );
				} else {
					$( '.fullwidth' ).removeClass( 'fixed-header' );
				}
			});
		});
} )( jQuery );

// page content below header (except Front Page)

jQuery( document ).ready(function($){
	if ( $( 'main' ).hasClass( 'itopmrg' ) ) {
		$( document ).ready(function(){
			$( ".fullwidth" ).css( {"background-color":"#111"} );
			$( ".fullwidth" ).css( {"position":"static"} );
			$( ".site-header" ).css( {"position":"static"} );
		});
	}
});

// logo and title - when select one of them. another display none

jQuery( document ).ready(function($){
	$( document ).ready(function(){
		var iwebunique_titlerwdth = $( ".title-r" ).height();
		if (iwebunique_titlerwdth == 0) {
			$( ".title-r" ).css( {"display":"none"} );
		}
	});
	$( document ).ready(function(){
		var iwebunique_logolwdth = $( ".logo-l" ).height();
		if (iwebunique_logolwdth == 0) {
			$( ".logo-l" ).css( {"display":"none"} );
		} else {
			$( ".title-r" ).css( {"margin-left":"20px"} );
		}
	});
});

// Slider

var myIndex = 0;
carousel();

function carousel() {
	var i;var x = document.querySelectorAll( '.iSlides' );
	if ( x.length ) {
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		myIndex++; console.log( x.length );
		if (myIndex > x.length) {myIndex = 1}
		x[myIndex -1].style.display = "flex";
		x[myIndex -1].style.animation = "ianimat-left-r 400ms 6500ms forwards";
		setTimeout( carousel, 6600 );
	}
}

// First Word

jQuery( document ).ready(function($){
	$( ".iwebunique-sectitle" ).html(function(){
		var text = $( this ).text().trim().split( " " );
		var first = text.shift();
		return ( text.length > 0 ? "<span class='iwebfirstword'>" + first + "</span> " : first ) + text.join( " " );
	});
});


//CSS Animation

jQuery( window ).scroll(function () {
	jQuery( '.iwebunique-sectitle' ).each(function (){
		var iwebunique_imagePos = jQuery( this ).offset().top;
		var iwebunique_topOfWindow = jQuery( window ).scrollTop();
		if (iwebunique_imagePos < iwebunique_topOfWindow + 400) {
			jQuery( this ).addClass( "iwebshake" );
		}
	});
});

jQuery( window ).scroll(function () {
	jQuery( '.ianim-t' ).each(function (){
		var iwebunique_imagePos = jQuery( this ).offset().top;
		var iwebunique_topOfWindow = jQuery( window ).scrollTop();
		if (iwebunique_imagePos < iwebunique_topOfWindow + 500) {
			jQuery( this ).addClass( "iwebfadeInDown" );
			jQuery( this ).removeClass( "ianim-t" );
		}
	});
});
