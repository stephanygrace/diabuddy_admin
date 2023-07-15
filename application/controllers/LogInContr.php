<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogInContr extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('LoginModel','lm');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		/*if ($this->session->userdata('username')) {
			redirect('AdminContr');
		}*/

	}
	function index(){
		$this->load->view('layout/header');
		$this->load->view('login/index');
		$this->load->view('layout/footer');
	}
	
	function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
		if ($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$result = $this->lm->can_login($email,$password);
			$userdata['record'] = $this->lm->getRecord($email);
			if ($userdata) {
				foreach ($userdata as $record) {
					$id = $record->id;
					$email = $record->email;
					$first_name = $record->first_name;
					$last_name = $record->last_name;
				}
			}
			$userName = $first_name.' '.$last_name;


			if ($result == '') {
				$session_data = array (
					'username'=> $userName,
					'email'=>$email
				);
				$this->session->set_userdata($session_data);
				$code =mt_rand(100000, 999999);
				$this->lm->setNewCode($id,$code,$email);
				redirect('AdminContr');
			}else{
				$this->session->set_flashdata('message', $result);
				redirect('LogInContr');
			}
			
		}else{
			$this->index();
		}
	}

	function enter(){
		if ($this->session->userdata('email') !='') {
			echo '<h1>Welcome - '.$this->session->userdata('email').'</h1>';
			echo "string";
			echo '<a href="'.base_url().'LogInContr" />Logout</a>';
		}else{
			redirect(base_url().'LogInContr/enter');
		}
	}

	function logout(){
		$this->session->unsent_userdata('email');
		redirect(base_url().'LogInContr/index');
	}

	function twoFactorAuth(){
			$user = $this->session->userdata('email');
			$data['records'] = $this->lm->getCode($user);
			if ($data) {
				foreach ($data as $record) {
					$id = $record->id;
					$code = $record->code;
					$email = $record->email;
				}
			}
			$subject = "PigMe Log-in Code";
			$message = "
				<p>Hi <b>".$this->session->userdata('username')."</b>!</p>
				<p>This is email veriication from PigMe Samgyupsal Admin.<br>
				To Complete your Login process and Proceed to the System.<br>
				Please Enter this code:<br>
				<h3><b>".$code."</b></h3>
				</p>
			";
		
		$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.gmail.com', 
					'smtp_port' => 465,
					'smtp_user' => 'micoparreno66@gmail.com',
					'smtp_pass' => 'hvexzkgmmvnrgdua',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
					);
				$this->load->library('email',$config);
				$this->email->set_newline('\r\n');
				$this->email->from('micoparreno66@gmail.com');
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype("html");
		if ($this->email->send()) {
			redirect('LogInContr/inputCode');
		}else{
			echo "Ayaw";
		}		
	}
	function inputCode(){
			$this->load->view('layout/header');
			$this->load->view('login/authenticate');
			$this->load->view('layout/footer');
	}
	function codeValidation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('code','Code','required');
		if ($this->form_validation->run()) {
			$code = $this->input->post('code');
			$result = $this->lm->checkCode($code);
			if ($result) {
				$this->lm->removeCode($code);
				redirect('AdminContr');
			}else{
				$this->session->set_flashdata('message', $result);
				redirect('LogInContr/inputCode');
			}
		}else
		$this->inputCode();
	}
	
	
}
/*

function enter(){
		if ($this->session->userdata('email') !='') {
			echo '<h1>Welcome - '.$this->session->userdata('email').'</h1>';
			echo "string";
			echo '<a href="'.base_url().'LogInContr/login" />Logout</a>';
		}else{
			redirect(base_url().'LogInContr/enter');
		}
	}

	function logout(){
		$this->session->unsent_userdata('email');
		redirect(base_url().'LogInContr/login');
	}



$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->model('LoginModel');
			if ($this->LoginModel->can_login($email,$password)) {
				$session_data = array(
					'email' => $email ,
				);
				$this->session->set_userdata($session_data);
				redirect(base_url().'LogInContr/enter');
			}else{
				$this->session->set_flashdata('error', 'Invalid Email and Password');
				redirect(base_url().'LogInContr/login');
			}
			*/

?>

