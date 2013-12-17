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

	public static function list_menu($page)
	{
		$pages_model = new Pages_model();
		// Whatever the page id is in the database
		$pages_model->where('main_pages_id = :pages_id');

		$result = $pages_model->all(array('pages_id' => $page));

		if ($result != false) {
			return $result;
		}
	}
}

?>