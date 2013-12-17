define(['jquery', 'jqueryui'], function($) {

    $( '.js-sortable' ).sortable({
            start: function(e, ui) {
                // creates a temporary attribute on the element with the old index
                $(this).attr('data-previndex', ui.item.index());
            },
            update: function(e, ui) {

                    var items = [],
                        count = 1;

                //Get a array of all the items in the table with their ID and position in the list
                $( '.js-sortable' ).children().each( function ( e, item ) {
                        var id = $( item ).attr( 'id' );
                        items.push({ id: id, order: count });
                        count++;
                });
                
                //Send the values to AJAX to be saved in the database
                $.ajax({ url: window.site_path.replace( '_admin', 'admin' ) + 'ajax/update_order',
                         data: { items: items },
                         type: 'POST',
                         dataType: 'JSON'
                });
            }
        });
});