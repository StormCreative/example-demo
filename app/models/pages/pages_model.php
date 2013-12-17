<?php

class pages_model extends activerecord
{
	public function __Construct ()
	{
		parent::__Construct ();

		//$this->_has_image = TRUE;
		//$this->_has_upload = TRUE;

		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = "image";
        $this->has_many = array( 'links' );
	}
}

?>