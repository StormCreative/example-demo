<?php

class Ajax
{
	public function delete_link()
	{
		$result = array( 'status' => 201 );

		if( !!$_POST ) {
			$links_model = new Links_model();

			if( $links_model->delete( '', $_POST[ 'id' ] ) ) {
				$result = array( 'status' => 200 );
			}
		}

		die( json_encode( $result ) );
	}

	public function update_order()
	{
		if( !!$_POST ) {
			foreach( $_POST[ 'items' ] as $item ) {
				$pages_model = new Pages_model();
				$pages_model->save( array( 'id' => $item[ 'id' ], 'ordered' => $item[ 'order' ] ) );
			}
		}
	}
}


?>