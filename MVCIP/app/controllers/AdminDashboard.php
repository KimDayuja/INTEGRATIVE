<?php 

/**
 * home class
 */
class Dashboard
	use Controller;

	public function index()
	{

		$this->view('landing-view');
	}

}
