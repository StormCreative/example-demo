<?php

class errors extends C_Controller
{
	public function error_404()
	{
		$this->setView('errors/404');
	}
}

?>