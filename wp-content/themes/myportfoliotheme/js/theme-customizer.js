(function( $ ) {

	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( 'a.navbar-brand' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	//Logo js Settings
	// wp.customize( 'wp_logo', function( value ) {
	// 	value.bind( function( to ) {
	// 		if( to == '' ) {
	// 			$('#logo').hide();
	// 		}
	// 		else {
	// 			$('#logo').show();
	// 			$('#logo').attr('src', to );
	// 		}
	// 	} );
	// } );

})( jQuery );