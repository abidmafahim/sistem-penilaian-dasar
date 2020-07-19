<?php

/**
 *  
 */
class Login extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_Login');
		$this->load->helper('url');
	}

	function index(){
		$this->load->view('v_login');
	}

	function login_action(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password) 
		);

		$query = $this->M_Login->login_check("users",$where);
		$cek = $query->num_rows();

		if($cek > 0){
			$row = $query->row();
			$data_session = array(
				'nama' => $username,
				'level' => $row->level
			);

			$this->session->set_userdata($data_session);

			if ($data_session['level'] == 'admin') {
				redirect ('Admin');
			}
			elseif ($data_session['level'] == 'prodi') {
				redirect ('prodi');
			}
		//echo "Username dan Password benar";

		}
		else{
			echo "Username dan password salah !";
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}

?>