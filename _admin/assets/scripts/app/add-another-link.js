define( ['jquery'], function() {


	$( '.js-add-another-link' ).click( function( e ) {

		$( '.js-link-area' ).append( '<input type="hidden" name="pages[links][id][]" value="" />' +
					'<p><label>Title:</label><input type="text" name="pages[links][title][]" class="medium_input" value=""></p>' +
					'<p><label>URL: </label><input type="text" name="pages[links][url][]" class="medium_input" value=""></p><hr>' );

		e.preventDefault();
	});

	$( '.js-delete-link' ).click( function( e ) {

		var target = e.target,
			id = $( target ).attr( 'data-id' );

		$.ajax({ url: window.site_path.replace( '_admin', 'admin' ) + 'ajax/delete_link',
				 data: { id: id },
				 type: 'POST',
				 dataType: 'JSON',
				 success: function( data ) {
				 	if( data[ 'status' ] == 200 ) { 
				 		$( target ).parent().parent().remove();
				 	}
				 }
		});

		e.preventDefault();
	});
});