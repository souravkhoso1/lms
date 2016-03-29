<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function index(){
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$department = $this->input->post('department');
		$role = $this->input->post('role');
		$password = $this->input->post('password');

		if($this->db->get_where('users', array('rollnumber'=>$username, 'role'=>$role))->num_rows()>0){
			echo "<script>alert('Already registered!');window.location='".base_url()."'</script>";
		} else {
			$this->db->insert('users', array('name'=>$name, 'rollnumber'=>$username, 'department'=>$department, 'role'=>$role, 'password'=>$password));
			$this->session->set_userdata(array('username'=>$username, 'role'=>$role));
			header('Location: '.base_url('home'));
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */