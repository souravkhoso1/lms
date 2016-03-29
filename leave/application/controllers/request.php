<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {

	
	public function index(){

		if(!$this->input->post('typeofleave')){
			$this->session->set_userdata(array('error_home'=>'Select type of leave.'));
			header('Location: '.base_url('home'));
			goto end;
		}

		$query1 = $this->db->get_where('users', array('rollnumber'=>$this->input->post('rollnumber'), 'role'=>$this->input->post('role')))->row_array();
		$query2 = $this->db->get_where('admin', array('id'=>'1'))->row_array();

		$leaveleft = $query2[$this->input->post('role').$this->input->post('typeofleave')] - $query1[$this->input->post('typeofleave')];
		if($this->input->post('daysofleave')>$leaveleft){
			$this->session->set_userdata(array('error_home'=>'Requested days of leave exceeds the left days of leave.'));
			header('Location: '.base_url('home'));
			goto end;
		}

		$leavefrom = explode('-', $this->input->post('leavefrom'));
		$leaveto = explode('-', $this->input->post('leaveto'));

		if($this->greaterdate($leaveto, $leavefrom)==$leavefrom){
			$this->session->set_userdata(array('error_home'=>'To date is smaller than From date'));
			header('Location: '.base_url('home'));
			goto end;
		}

		if(($this->greaterdate($leaveto, $leavefrom)=='0') && ($this->input->post('daysofleave') != 1)){
			$this->session->set_userdata(array('error_home'=>'Both dates same.'));
			header('Location: '.base_url('home'));
			goto end;
		}

		if($this->datedifference($leavefrom, $leaveto)+1 != $this->input->post('daysofleave')){
			$this->session->set_userdata(array('error_home'=>'Days does not match the date duration of leave.'));
			header('Location: '.base_url('home'));
			goto end;
		}


		$this->db->update('users', array($this->input->post('typeofleave')=>($query1[$this->input->post('typeofleave')]+$this->input->post('daysofleave'))), array('rollnumber'=>$this->input->post('rollnumber')));
		$data = array(
			'name'=>$this->input->post('name'),
			'rollnumber'=>$this->input->post('rollnumber'),
			'role'=>$this->input->post('role'),
			'department'=>$this->input->post('department'),
			'typeofleave'=>$this->input->post('typeofleave'),
			'daysofleave'=>$this->input->post('daysofleave'),
			'leavefrom'=>$this->input->post('leavefrom'),
			'leaveto'=>$this->input->post('leaveto'),
			'hodapproved'=>'pending',
			'coordinatorapproved'=>'pending'
		);

		if($this->db->insert('applications', $data)){
			echo '<script>window.alert("Leave Request sent");window.location="'.base_url('home').'";</script>';

		}

		end:
		
	}

	public function greaterdate($date1, $date2){
		if($date1[2]>$date2[2]) return $date1;
		elseif($date1[2]<$date2[2]) return $date2;
		else{
			if($date1[1]>$date2[1]) return $date1;
			elseif($date1[1]<$date2[1]) return $date2;
			else{
				if($date1[0]>$date2[0]) return $date1;
				elseif($date1[0]<$date2[0]) return $date2;
				else return 0;	
			}
		}
	}

	public function datedifference($date1, $date2){
		$d3 = $date1[2]."-".$date1[1]."-".$date1[0];
		$d4 = $date2[2]."-".$date2[1]."-".$date2[0];
		$d1 = date_create($d3);
		$d2 = date_create($d4);

		$d = date_diff($d1, $d2);
		return $d->format("%a");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */