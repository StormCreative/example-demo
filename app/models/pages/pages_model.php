<?php

class Pages_model extends Activerecords
{
	public static function list($page)
	{
		$pages_model = new Pages_model();
		// Whatever the page id is in the database
		$pages_model->where('pages_id = :pages_id');

		$result = $pages_model->all(array('pages_id' => $page));

		if ($result != false) {
			return $result;
		}

	}
}

?>