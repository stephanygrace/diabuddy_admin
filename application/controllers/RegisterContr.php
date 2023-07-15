<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class RegisterContr extends CI_Controller
{
	function __construct(){
		parent:: __construct();
		$this->load->model('RegisterModel','sm');
		$this->load->library('form_validation');
		$this->load->library('encryption');


	}
	
	public function index(){
		$this->load->view('layout/header');
		$this->load->view('register/index.php');
		$this->load->view('layout/footer');
	}

	function validation(){
		$this->form_validation->set_rules('txtFN','First Name','required|trim');
		$this->form_validation->set_rules('txtMN','Middle Name','required|trim');
		$this->form_validation->set_rules('txtLN','Last Name','required|trim');
		$this->form_validation->set_rules('txtAge','Age','required|trim');
		$this->form_validation->set_rules('txtEmail','Email Address','required|trim|valid_email|is_unique[tblRegister.email]');
		$this->form_validation->set_rules('txtPassword','Password','required');

		if ($this->form_validation->run()) {
			$verification_key =  md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('txtPassword'));
			$data = array(
				'first_name'=> $this->input->post('txtFN'),
				'middle_name'=> $this->input->post('txtMN'),
				'last_name'=> $this->input->post('txtLN'),
				'age'=> $this->input->post('txtAge'),
				'gender'=> $this->input->post('rdoGender'),
				'email'=> $this->input->post('txtEmail'),
				'password'=> $encrypted_password,
				'verification_key'=> $verification_key,
				'is_email_verified' => 'no'
			);

			$id = $this->sm->setAdminRecord($data);
			if ($this->db->affected_rows()>0) {
			$subject = "Please verify email for Login";
				$message="
				<p>Hi <b>".$this->input->post('user_name')."</b>!</p>
				<p>This is email veriication from PigMe Samgyupsal Admin.<br>
				To Complete you Registration process and log in to the System.<br>
				Please verify your email by clicking this <a href='".base_url()."RegisterContr/verifyEmail/".$verification_key."'>Link</a>.<br>
				Thank you.
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
				$this->email->to($this->input->post('txtEmail'));
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype("html");
				//$this->email->set_charset("iso-8859-1");
				//$this->email->set_wordwrap("true");
				//$this->email->send();
				if($this->email->send())
				{
					$this->session->set_flashdata('message',
					'Check Your Email');
					redirect(base_url('RegisterContr'));
				}else{
					echo "WALA";
				} 
			}
		}else{
			$this->index();
		}
	}

	function verifyEmail(){
		if ($this->uri->segment(3)) {
			$verification_key = $this->uri->segment(3);
			if ($this->sm->verify_email($verification_key)) {
				$data['message'] = 
				'
				<h1 align = "center">
				Your Email Has Been Successfully verified.<br>
				You can now Login using your Registered Account.<br>
				Click <a href = "'.base_url().'LogInContr/">Here</a> to Login.
				</h1>';
			}else{
				$data['message'] = 
				'
				<h1 align = "center">
				Invalid Link.
				</h1>';
			}
			$this->load->view('register/email_verification',$data);
		}
	}

	public function addAdminRecord(){
		$fn = $this->sm->input->post('txtFN');
		$mn = $this->sm->input->post('txtMN');
		$ln = $this->sm->input->post('txtLN');
		$age = $this->sm->input->post('txtAge');
		$gender = $this->sm->input->post('rdoGender');
		$email = $this->sm->input->post('txtEmail');
		$password = $this->sm->input->post('txtPassword');

		$results = $this->sm->setAdminRecord($fn,$mn,$ln,$age,$gender,$email,$password);
		

		redirect(base_url('RegisterContr/index'));
	}

	public function viewAllAdminRecords(){
		$data['records'] = $this->sm->getAllAdminRecords();
		$this->load->view('layout/header');
		$this->load->view('register/result',$data);
		$this->load->view('layout/footer');
	}

	public function deleteAdminRecord($id){
		$result = $this->sm->removeAdminRecord($id);
		if($result){
			$this->session->set_flashdata('success_msg','Record has been Deleted!');
		}else{
			$this->session->set_flashdata('error_msg','Fail to delete Record!');
		}
		redirect(base_url('StudentContr/viewAllStudentRecords'));
	}

	public function editAdminRecord($id){
		$data['record'] = $this->sm->getAdminRecord($id);
		$this->load->view('layout/header');
		$this->load->view('register/edit',$data);
		$this->load->view('layout/footer');
	}

	public function updateAdminRecord(){
		$fn = $this->sm->input->post('txtFN');
		$mn = $this->sm->input->post('txtMN');
		$ln = $this->sm->input->post('txtLN');
		$age = $this->sm->input->post('txtAge');
		$gender = $this->sm->input->post('rdoGender');
		$email = $this->sm->input->post('txtEmail');
		$password = $this->sm->input->post('txtPassword');

		$result = $this->sm->setNewAdminRecord($fn,$mn,$ln,$age,$gender,$email,$password);
		if($result){
			$this->session->set_flashdata('success_msg','Record has been Updated!');
		}else{
			$this->session->set_flashdata('error_msg','Fail to Update Record!');
		}
		redirect(base_url('RegisterContr/viewAllAdminRecords'));
	}
}
?>