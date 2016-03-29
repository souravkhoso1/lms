<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username')&&($this->session->userdata('role')=='student')){
			$data['leavedetails'] = $this->db->get_where('admin', array('id'=>'1'))->row_array();
			$data['details'] = $this->db->get_where('users', array('rollnumber'=>$this->session->userdata('username'), 'role'=>$this->session->userdata('role')))->row_array();
			$data['role'] = 'Student';
			$data['approved'] = $this->db->get_where('applications', array('rollnumber'=>$this->session->userdata('username'), 'hodapproved'=>'approved', 'coordinatorapproved'=>'approved'))->result_array();
			$data['pending'] = $this->db->query("SELECT * FROM `applications` WHERE `rollnumber` = '".$this->session->userdata('username')."' AND (`hodapproved` = 'pending' OR `coordinatorapproved` = 'pending' )")->result_array(); 
			$this->load->view('blank', $data);
		} elseif($this->session->userdata('username')&&($this->session->userdata('role')=='hod')){
			$data['details'] = $this->db->get_where('users', array('rollnumber'=>$this->session->userdata('username'), 'role'=>$this->session->userdata('role')))->row_array();
			$data['role'] = 'HOD';
			$data['approved'] = $this->db->get_where('applications', array('role'=>'student', 'hodapproved'=>'approved', 'department'=>$data['details']['department']))->result_array();
			$data['pending'] = $this->db->get_where('applications', array('role'=>'student', 'department'=>$data['details']['department'], 'hodapproved'=>'pending'))->result_array(); 
			$this->load->view('blank', $data);
		} elseif($this->session->userdata('username')&&($this->session->userdata('role')=='ugpgcoordinator')){
			$data['details'] = $this->db->get_where('users', array('rollnumber'=>$this->session->userdata('username'), 'role'=>$this->session->userdata('role')))->row_array();
			$data['role'] = 'UG/PG Coordinator';
			$data['approved'] = $this->db->get_where('applications', array('role'=>'student', 'coordinatorapproved'=>'approved'))->result_array();
			$data['pending'] = $this->db->get_where('applications', array('role'=>'student', 'hodapproved'=>'approved', 'coordinatorapproved'=>'pending'))->result_array(); 
			$this->load->view('blank', $data);
		} elseif($this->session->userdata('username')&&($this->session->userdata('role')=='faculty')){
			$data['leavedetails'] = $this->db->get_where('admin', array('id'=>'1'))->row_array();
			$data['details'] = $this->db->get_where('users', array('rollnumber'=>$this->session->userdata('username'), 'role'=>$this->session->userdata('role')))->row_array();
			$data['role'] = 'Faculty';
			$data['approved'] = $this->db->get_where('applications', array('rollnumber'=>$this->session->userdata('username'), 'coordinatorapproved'=>'approved'))->result_array();
			$data['pending'] = $this->db->get_where('applications', array('rollnumber'=>$this->session->userdata('username'), 'coordinatorapproved'=>'pending'))->result_array(); 
			$this->load->view('blank', $data);
		} elseif($this->session->userdata('username')&&($this->session->userdata('role')=='facultycoordinator')){
			$data['details'] = $this->db->get_where('users', array('rollnumber'=>$this->session->userdata('username'), 'role'=>$this->session->userdata('role')))->row_array();
			$data['role'] = 'Faculty Coordinator';
			$data['approved'] = $this->db->get_where('applications', array('role'=>'faculty', 'coordinatorapproved'=>'approved'))->result_array();
			$data['pending'] = $this->db->get_where('applications', array('role'=>'faculty', 'coordinatorapproved'=>'pending'))->result_array(); 
			$this->load->view('blank', $data);
		} elseif($this->session->userdata('username')&&($this->session->userdata('role')=='admin')){
			$data['details'] = $this->db->get_where('users', array('role'=>$this->session->userdata('role')))->row_array();
			$data['role'] = 'Admin';
			$data['users'] = $this->db->get('users')->result_array();
			$data['admin'] = $this->db->get_where('admin', array('id'=>'1'))->row_array();
			//$this->session->set_userdata(array('error_home'=>'With great power comes great responsibility!!'));
			$this->load->view('blank', $data);
		} else {	
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = $this->input->post('role');

			$query = $this->db->get_where('users', array('rollnumber'=>$username, 'password'=>$password, 'role'=>$role));
			if($query->num_rows()==1){
				$this->session->set_userdata(array('username'=>$username, 'role'=>$role));
				header('Location: '. base_url('home'));
			} else {
				$data['error_alert'] = 'Username/Password combination error. If you have not registered please register.';
				$this->load->view('login', $data);
			}
			//echo '<script>window.alert("'.$username.$password.$role.'")</script>';
		}
	}

	public function approve(){
		$id = $this->input->post('id');
		$role = $this->input->post('role');
		if($role=='hod'){
			if($this->db->update('applications', array('hodapproved'=>'approved'), array('id'=>$id))){
				echo 'success';
			} else {
				echo 'false';
			}
		} elseif($role=='ugpgcoordinator'){
			if($this->db->update('applications', array('coordinatorapproved'=>'approved'), array('id'=>$id))){
				echo 'success';
			} else {
				echo 'false';
			}
		} elseif($role=='facultycoordinator'){
			if($this->db->update('applications', array('coordinatorapproved'=>'approved'), array('id'=>$id))){
				echo 'success';
			} else {
				echo 'false';
			}
		} else {
			echo 'Role error!';
		}	
	}

	public function disapprove(){
		$id = $this->input->post('id');
		$role = $this->input->post('role');
		if($role=='hod'){
			if($this->db->update('applications', array('hodapproved'=>'disapproved'), array('id'=>$id))){
				echo 'success';
			} else {
				echo 'false';
			}
		} elseif($role=='ugpgcoordinator'){
			if($this->db->update('applications', array('coordinatorapproved'=>'disapproved'), array('id'=>$id))){
				echo 'success';
			} else {
				echo 'false';
			}
		} elseif($role=='facultycoordinator'){
			if($this->db->update('applications', array('coordinatorapproved'=>'disapproved'), array('id'=>$id))){
				echo 'success';
			} else {
				echo 'false';
			}
		} else {
			echo 'Role error!';
		}	
	}

	public function cancelrequest(){
		$id = $this->input->post('id');
		$data = $this->db->get_where('applications', array('id'=>$id))->row_array();
		$data2 = $this->db->get_where('users', array('rollnumber'=>$data['rollnumber']))->row_array();
		if($this->db->update('users', array($data['typeofleave']=>$data2[$data['typeofleave']]-$data['daysofleave']), array('rollnumber'=>$data['rollnumber'])) && $this->db->delete('applications', array('id'=>$id))){
			echo 'success';
		} else {
			echo 'false';
		}
	}

	public function update(){
		$name = $this->input->post('name');
		$rollnumber = $this->input->post('rollnumber');
		$department = $this->input->post('department');
		$password = $this->input->post('password');
		$retypepassword = $this->input->post('retypepassword');

		if($password != $retypepassword){
			$this->session->set_userdata(array('error_home'=>'Passwords don\'t match.'));
			header('Location: '.base_url('home'));
			goto end;
		}

		$this->db->update('users', array('name'=>$name, 'department'=>$department, 'password'=>$password), array('rollnumber'=>$rollnumber));
		$this->session->set_userdata(array('error_home'=>'Value Updated.'));
		header('Location: '.base_url('home'));

		end:
	}

	public function updateauth(){
		$name = $this->input->post('name');
		$rollnumber = $this->input->post('rollnumber');
		$password = $this->input->post('password');
		$retypepassword = $this->input->post('retypepassword');

		if($password != $retypepassword){
			$this->session->set_userdata(array('error_home'=>'Passwords don\'t match.'));
			header('Location: '.base_url('home'));
			goto end;
		}

		$this->db->update('users', array('name'=>$name, 'password'=>$password), array('rollnumber'=>$rollnumber));
		$this->session->set_userdata(array('error_home'=>'Value Updated.'));
		header('Location: '.base_url('home'));

		end:
	}

	public function checkprofile(){
		$rollnumber = $this->input->post('rollnumber');
		header('Location: '.base_url('home?user='.$rollnumber));
	}

	public function checkauth(){
		$rollnumber = $this->input->post('rollnumber');
		header('Location: '.base_url('home?auth='.$rollnumber));
	}

	public function updateadmin(){
		$data = array(
			'studentml'=>$this->input->post('studentml'),
			'studentvl'=>$this->input->post('studentvl'),
			'studentcl'=>$this->input->post('studentcl'),
			'facultyml'=>$this->input->post('facultyml'),
			'facultyvl'=>$this->input->post('facultyvl'),
			'facultycl'=>$this->input->post('facultycl')
		);

		if($this->db->update('admin', $data, array('id'=>'1'))){
			$this->session->set_userdata(array('error_home'=>'Value Updated.'));
			header('Location: '.base_url('home'));
		} else {
			$this->session->set_userdata(array('error_home'=>'Value not Updated.'));
			header('Location: '.base_url('home'));
		}
	}

	public function createadmin(){
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$retypepassword = $this->input->post('retypepassword');

		if($password != $retypepassword){
			$this->session->set_userdata(array('error_home'=>'Passwords don\'t match.'));
			header('Location: '.base_url('home'));
			goto end;
		}

		if($this->db->get_where('users', array('rollnumber'=>$username))->num_rows() > 0){
			$this->session->set_userdata(array('error_home'=>'Username already exists!'));
			header('Location: '.base_url('home'));
			goto end;
		}

		if($this->db->insert('users', array('name'=>$name, 'rollnumber'=>$username, 'role'=>'admin', 'password'=>$password))){
			$this->session->set_userdata(array('error_home'=>'New Admin added.'));
			header('Location: '.base_url('home'));
		} else {
			$this->session->set_userdata(array('error_home'=>'Admin Account not created.'));
			header('Location: '.base_url('home'));
		}

		end:
	}

	public function resetdata(){
		$users = $this->db->get('users')->result_array();
		foreach($users as $user){
			if($user['role']=='student'||$user['role']=='faculty'){
				if(!$this->db->update('users', array('ml'=>'0', 'vl'=>'0', 'cl'=>'0'), array('rollnumber'=>$user['rollnumber']))){
					echo 'error'; goto end;
				}
			}
		}
		echo 'success';
		end:
	}

	public function sendmail(){
		$filename = $this->writereport();
		if($filename==false){
			echo 'error occured. try later';
			goto end;
		}
		$this->load->library('email');

		$config['mailtype'] = 'text';

		$this->email->from('admin_lms@iitj.ac.in', 'Admin, LMS');
		$this->email->to('accounts@iitj.ac.in');

		$this->email->subject('Regarding Leave Report of '.date('M Y'));
		$this->email->message('PFA this month\'s Leave Report named \''.$filename.'\'.');
		$this->email->attach($filename);
		$this->email->send();

		echo 'success';

		end:
	}

	public function writereport(){
		$filename = 'leavereport-'.date('d-m-o').'.txt';
		$file = fopen($filename, 'w');
		if($file==false){ echo 'error in opening file'; return false; }
		fwrite($file, "Leave Report for ".date('M Y').": \n-------------------------------------------------- \n\n");

		$date['month'] = date('m');
		$date['year'] = date('o');

		$allapplications = $this->db->get('applications')->result_array();
		$allusers = $this->db->query("SELECT * FROM users WHERE (role = 'student' OR role = 'faculty')")->result_array();

		

		foreach($allusers as $user){
			$count = 0;
			foreach($allapplications as $application){
				if($application['rollnumber'] == $user['rollnumber']){
					$fromdate = explode('-', $application['leavefrom']);
					$todate = explode('-', $application['leaveto']);

					$i=0;
					if($fromdate[1]==$date['month'] && $fromdate[2]==$date['year']) $i = $i + 1;
					if($todate[1]==$date['month'] && $todate[2]==$date['year']) $i = $i + 2;

					if($i==3){
						$count = $count + ($todate[0] - $fromdate[0]) + 1;
					}
					if($i==1){
						if($date['month']=='01'||$date['month']=='03'||$date['month']=='05'||$date['month']=='07'||$date['month']=='08'||$date['month']=='10'||$date['month']=='12'){
							$count = $count + (31 - $fromdate[0]) + 1;
						} elseif($date['month']=='04'||$date['month']=='06'||$date['month']=='09'||$date['month']=='11'){
							$count = $count + (30 - $fromdate[0]) + 1;
						} else {
							if($date['year']%4==0){
								$count = $count + (29 - $fromdate[0]) + 1;
							} else {
								$count = $count + (28 - $fromdate[0]) + 1;
							}
						}
					}
					if($i==2){
						$count = $count + $todate[0] + 1;
					} 
					if($i==0) {
						// do nothing
					}
				}
			}
			if($user['role']=='student')
				fwrite($file, "Name: ".$user['name']."\nRoll Number: ".$user['rollnumber']."\n\nLeave Status this semester: ".$user['ml']."ML-".$user['vl']."VL-".$user['cl']."CL\n\nThis month leave taken: ".$count." Days \n-------------------------------------------------- \n\n");
			if($user['role']=='faculty')
				fwrite($file, "Name: ".$user['name']."\nUsername: ".$user['rollnumber']."\n\nLeave Status this semester: ".$user['ml']."ML-".$user['vl']."VL-".$user['cl']."CL\n\nThis month leave taken: ".$count." Days \n-------------------------------------------------- \n\n");			
		}

		return $filename;
	}
}