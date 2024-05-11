<?php 

/**
 * home class
 */
class Theater
{
	use Controller;

	public function index()
	{

		$this->view('admin-theater');
	}
	
}
