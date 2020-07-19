<?php

/**
 *  
 */
class Login extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_Login');
		$this->load->helper(array('url','form'));
	}

	function index(){
		$this->load->view('v_login');
	}

	function login_action(){
		$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('username','Username','required|min_length[8]|max_length[64]');
		
		// $this->form_validation->set_message('min_length[8]','{field} tidak boleh kurang dari 8');
		// $this->form_validation->set_message('max_length[32]','{field} tidak boleh lebih dari 32');
		// $this->form_validation->set_message('max_length[64]','{field} tidak boleh lebih dari 64');

		$username = anti_injection($this->input->post('username'));
		if ($this->form_validation->run() == true) {
			if ($this->M_Login->login_check($username)->num_rows() == 1) {
				$db = $this->M_Login->login_check($username)->row();
				if (hash_verified(anti_injection($this->input->post('password')), $db->password)) {
					if ($db->level == "admin") {
						$datauser = array(
							'nama' => $db->nama_lengkap,
							'level' => $db->level
						);
						$this->session->set_userdata($datauser);
						redirect('Admin/home');
					}
					elseif ($db->level == "guru") {
						$datauser = array(
							'username' => $db->username,
							'nama' => $db->nama_lengkap,
							'level' => $db->level
						);
						$this->session->set_userdata($datauser);
						redirect('Guru/Home');
					}
					else{
						echo "a";
						redirect('Login/index');
					}
				}
				else{
					$this->session->set_flashdata('wrong','Password atau username salah');
					redirect('Login');
				}
			}
			else{
				$this->session->set_flashdata('noreg','akun tidak terdaftar');
				redirect('Login');
			}
		}
		else{
			$this->session->set_flashdata('noclue','Masukan harus berisi minimal 8 karakter');
			redirect('Login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}

?>