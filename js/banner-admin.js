/**
 * Media picker for the "Page Banner Image" meta box.
 */
( function ( $ ) {
	var l10n = window.amanahBannerAdmin || {};
	var frame;

	$( document ).on( 'click', '.amanah-banner-field__select', function ( event ) {
		event.preventDefault();

		var $field = $( this ).closest( '.amanah-banner-field' );

		frame = wp.media( {
			title: l10n.title,
			button: { text: l10n.button },
			library: { type: 'image' },
			multiple: false,
		} );

		frame.on( 'select', function () {
			var image = frame.state().get( 'selection' ).first().toJSON();
			var url = image.sizes && image.sizes.medium ? image.sizes.medium.url : image.url;

			$field.find( '.amanah-banner-field__id' ).val( image.id );
			$field.find( '.amanah-banner-field__preview' ).show().find( 'img' ).attr( 'src', url );
			$field.find( '.amanah-banner-field__select' ).text( l10n.change );
			$field.find( '.amanah-banner-field__remove' ).show();
		} );

		frame.open();
	} );

	$( document ).on( 'click', '.amanah-banner-field__remove', function ( event ) {
		event.preventDefault();

		var $field = $( this ).closest( '.amanah-banner-field' );

		$field.find( '.amanah-banner-field__id' ).val( '' );
		$field.find( '.amanah-banner-field__preview' ).hide().find( 'img' ).attr( 'src', '' );
		$field.find( '.amanah-banner-field__select' ).text( l10n.set );
		$( this ).hide();
	} );
} )( jQuery );
