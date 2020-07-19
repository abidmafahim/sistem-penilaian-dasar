<?php

/**
 * 
 */
class M_Login extends CI_Model
{
	
	function login_check($username){
		return $this->db->get_where('users', array('username' => $username));
	}
}

?>