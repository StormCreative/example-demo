<?php

class pages extends application_controller
{
	private $_pages;
	private $_admin_helper;

	public function __Construct ()
	{
		parent::__Construct ();

		$this->_pages = new pages_model();
		$this->_admin_helper = new Admin_helper();
		
		$this->forms->setActionTable ( 'pages' );
	}

	public function edit ( $id = "" )
	{
		$this->_pages->attributes[ 'id' ] = !!$id ? $id : $_POST['pages']['id'];

		if ( post_set() )
		{
			
			//Handle the image
            if ( !!$_POST["image"] || !!$_FILES ) {

            	Image_helper::multi_image_move( $_FILES[ 'images' ] );

            	if( !!$_POST[ 'image' ] ) {
            		$_POST[ "pages" ][ "image_id" ] = Image_helper::save_one( $_POST[ "image" ] );
            	}

            	if( !!$_POST['multi-image'] ) {
            		$_POST[ "pages" ][ "image_id" ] = Image_helper::save_one( $_POST['multi-image'] );
            	}
                
            }
            else {
                $_POST[ "pages" ][ "image_id" ] = NULL;
            }

			//If the user has selected some files to upload run this
           //Send the $_FILES array to the application controller for the saving to be handled
           if ( ( !!$_FILES[ "uploads" ] && $_POST[ "upload_name" ] ) || !!$_POST[ "downloads" ] ) 
               $_POST[ "pages" ][ "uploads_id" ] = Document_helper::save();
           else
               $_POST[ "pages" ]["uploads_id"] = !!$_POST[ "uploads" ][ "id" ] ? $_POST[ "uploads" ][ "id" ] : NULL;

			if ( !$this->_pages->save( $_POST[ 'pages' ] ) ) {
				$feedback = organise_feedback( $this->_pages->errors, TRUE );
			}
			else {
				$feedback = organise_feedback( $this->forms->getSuccessMessage () );

				if( !!$_POST[ 'pages' ][ 'links' ] ) {
					$this->process_links();
				}
			}
		}

		$this->_pages->find( $this->_pages->attributes[ 'id' ] );

		//die( print_r( $this->_pages ) );

		// Sets the form values by the properties set through the Find method in active record
		$this->mergeTags ( $this->_pages->attributes );
		$this->addTag ( "gallery_items", $this->_admin_helper->get_images( $this->_pages->attributes[ 'gallery' ] ) );
		
		$this->addTag ( 'image', $this->_pages->image );
		$this->addTag ( 'feedback', $feedback );

		$this->addStyle ( 'edit' );
		$this->addStyle ( 'button' );

		$this->setScript( 'main' );
	}

	public function process_links()
	{
		$links = $_POST[ 'pages' ][ 'links' ];
		$c = count( $links[ 'title' ] );

		for( $i = 0; $i < $c; $i++ ) {
			if( !!$links[ 'title' ][$i] && !!$links[ 'url' ][$i] ) {
				$links_model = new Links_model();
				$links_model->save( array( 'id' => $links[ 'id' ][$i], 'title' => $links[ 'title' ][$i], 'url' => $links[ 'url' ][$i], 'pages_id' => $this->_pages->attributes[ 'id' ] ) );
			}
		}
	} 
}

?>