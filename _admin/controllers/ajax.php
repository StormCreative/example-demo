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
}


?>