<?php
/**
 * 
 */
class Main extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function admin()
	{
		$this->load->view('admin/v_admin');
	}

	public function guru()
	{
		$this->load->view('v_guru');
	}
}
?>