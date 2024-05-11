<?php 

/**
 * home class
 */
class Customers
{
	use Controller;

	public function index()
	{

		$this->view('admin-customers');
	}
	
}
