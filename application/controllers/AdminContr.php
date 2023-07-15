<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class AdminContr extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel','am');
		if (!$this->session->userdata('username')) {
			redirect('LogInContr');
		}
	}
	public function index(){
		$data['records'] = $this->am->getAllProcess();
		$this->load->view('admin/index', $data);
	}




	public function addRecipeRecord(){
		$recipe = $this->am->input->post('txtRecipe');
		$cookingTime = $this->am->input->post('txtCookingTime');
		$cal = $this->am->input->post('txtCal');
		$sugar = $this->am->input->post('txtSugar');
		$fat = $this->am->input->post('txtFat');
		$carbs = $this->am->input->post('txtCarb');
		$protein = $this->am->input->post('txtProtein');
		$fibre = $this->am->input->post('txtFibre');

		$result = $this->am->setRecipeRecord($recipe,$cookingTime,$cal,$sugar,$fat,$carbs,$protein,$fibre);

		if($result){
			$this->runAlgo();
			$this->session->set_flashdata('success_msg', 'Recipe has been Added!');
			}else{
			$this->session->set_flashdata('error_msg', 'Fail to process!');
			}
			redirect(base_url('AdminContr/viewAllRecipe'));
	}

	public function deleteRecipe($id){
		$result = $this->am->removeRecipe($id);
		if($result){
			$this->session->set_flashdata('success_msg', 'Recipe has been Deleted');
		}else{
			$this->session->set_flashdata('error_msg', 'Failed to process!');
		}
		redirect(base_url('AdminContr/viewAllRecipe'));
	}

	public function deleteUser($id){
		$result = $this->am->removeUser($id);
		if($result){
			$this->session->set_flashdata('success_msg', 'User has been Deleted');
		}else{
			$this->session->set_flashdata('error_msg', 'Failed to process!');
		}
		redirect(base_url('AdminContr/viewAllUserRecords'));
	}

	public function editRecipeRecord($id){
		$data['record'] = $this->am->getRecipeRecord($id);
		$this->load->view('admin/editRecipe', $data);

	}

	public function updateRecipeRecord(){
		$id = $this->am->input->post('txtID');
		$cluster = $this->am->input->post('txtCluster');
		$recipe = $this->am->input->post('txtRecipe');
		$cookingTime = $this->am->input->post('txtCookingTime');
		$cal = $this->am->input->post('txtCal');
		$sugar = $this->am->input->post('txtSugar');
		$fat = $this->am->input->post('txtFat');
		$carbs = $this->am->input->post('txtCarb');
		$protein = $this->am->input->post('txtProtein');
		$fibre = $this->am->input->post('txtFibre');

		$result = $this->am->setNewRecipeRecord($id,$cluster,$recipe,$cookingTime,$cal,$sugar,$fat,$carbs,$protein,$fibre);
		if($result){
			$this->session->set_flashdata('success_msg', 'Recipe has been Updated!');
			}else{
			$this->session->set_flashdata('error_msg', 'Fail to process!');
			}
			redirect(base_url('AdminContr/viewAllRecipe'));
	}

	public function viewAllAdminRecords(){
		$data['records'] = $this->am->getAllAdminRecords();
		$this->load->view('admin/admin',$data);
	}

	public function viewAllUserRecords(){
		$data['records'] = $this->am->getAllUserRecords();
		$this->load->view('admin/users',$data);
	}

	private function runAlgo(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_URL, "http://192.168.0.24:5000/");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'api');
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
		curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_exec($ch);
		curl_close($ch);
	}














	public function fetch(){
		$query = $this->input->post('search');
		$data['records'] = $this->am->fetch_data($query);
		$this->load->view('admin/search',$data);
		
	}

	public function viewAllRecipe(){
		$data['records'] = $this->am->getAllRecipe();
		$this->load->view('admin/orders',$data);
	}
	
	public function viewAllDeliverRecords(){
		$data['records'] = $this->am->getAllDeliverRecords();
		$this->load->view('admin/delivery',$data);
	}
	public function viewAllProcess(){
		$data['records'] = $this->am->getAllProcess();
		$this->load->view('admin/process',$data);
	}
	public function viewRecordHistory(){
		$data['records'] = $this->am->getAllRecordHistory();
		$this->load->view('admin/history',$data);
	}
	
	
	
	public function setProcess($id){
		$data['records'] = $this->am->getOrderRecord($id);
		if ($data) {
				foreach ($data as $records) {
					$id = $records->id;
					$customername = $records->customername;
					$customeremailaddress = $records->customeremailaddress;
					$contactnumber = $records->contactnumber;
					$customeraddress =  $records->customeraddress;
					$dateordered = $records->dateordered;
					$deliverschedule =  $records->deliverschedule;
					$specialinstructions =  $records->specialinstructions;
					$order1 = $records->order1;
					$order2 = $records->order2;
					$order3 = $records->order3;
					$order4 = $records->order4;
					$order5 = $records->order5;
					$order6 = $records->order6;
					$order7 = $records->order7;
					$order8 = $records->order8;
					$order9 = $records->order9;
					$order10 = $records->order10;
					$quantity1 = $records->quantity1;
					$quantity2 = $records->quantity2;
					$quantity3 = $records->quantity3;
					$quantity4 = $records->quantity4;
					$quantity5 = $records->quantity5;
					$quantity6 = $records->quantity6;
					$quantity7 = $records->quantity7;
					$quantity8 = $records->quantity8;
					$quantity9 = $records->quantity9;
					$quantity10 = $records->quantity10;
					$subtotal1 = $records->subtotal1;
					$subtotal2 = $records->subtotal2;
					$subtotal3 = $records->subtotal3;
					$subtotal4 = $records->subtotal4;
					$subtotal5 = $records->subtotal5;
					$subtotal6 = $records->subtotal6;
					$subtotal7 = $records->subtotal7;
					$subtotal8 = $records->subtotal8;
					$subtotal9 = $records->subtotal9;
					$subtotal10 = $records->subtotal10;
					$total =  $records->total;
				}
			}
		$result = $this->am->setNewProcess($id,$customername, $customeremailaddress, $contactnumber,$customeraddress,$dateordered,$deliverschedule,$specialinstructions, $order1, $order2, $order3, $order4, $order5, $order6, $order7, $order8, $order9, $order10, $quantity1, $quantity2, $quantity3, $quantity4, $quantity5, $quantity6, $quantity7, $quantity8, $quantity9, $quantity10, $subtotal1, $subtotal2, $subtotal3, $subtotal4, $subtotal5, $subtotal6, $subtotal7, $subtotal8, $subtotal9, $subtotal10, $total);

		if($result){
			redirect(base_url('AdminContr/viewAllProcess'));
			//$this->session->set_flashdata('success_msg', 'Order is Finished and ready to Deliver');
			}else{
			//$this->session->set_flashdata('error_msg', 'Fail to process the order!');
			}

	}

	public function setOrderRecord($id){
		$data['records'] = $this->am->getFromProcess($id);
			if ($data) {
				foreach ($data as $records) {
					$id = $records->id;
					$customername = $records->customername;
					$customeremailaddress = $records->customeremailaddress;
					$contactnumber = $records->contactnumber;
					$customeraddress =  $records->customeraddress;
					$dateordered = $records->dateordered;
					$deliverschedule =  $records->deliverschedule;
					$specialinstructions =  $records->specialinstructions;
					$order1 = $records->order1;
					$order2 = $records->order2;
					$order3 = $records->order3;
					$order4 = $records->order4;
					$order5 = $records->order5;
					$order6 = $records->order6;
					$order7 = $records->order7;
					$order8 = $records->order8;
					$order9 = $records->order9;
					$order10 = $records->order10;
					$quantity1 = $records->quantity1;
					$quantity2 = $records->quantity2;
					$quantity3 = $records->quantity3;
					$quantity4 = $records->quantity4;
					$quantity5 = $records->quantity5;
					$quantity6 = $records->quantity6;
					$quantity7 = $records->quantity7;
					$quantity8 = $records->quantity8;
					$quantity9 = $records->quantity9;
					$quantity10 = $records->quantity10;
					$subtotal1 = $records->subtotal1;
					$subtotal2 = $records->subtotal2;
					$subtotal3 = $records->subtotal3;
					$subtotal4 = $records->subtotal4;
					$subtotal5 = $records->subtotal5;
					$subtotal6 = $records->subtotal6;
					$subtotal7 = $records->subtotal7;
					$subtotal8 = $records->subtotal8;
					$subtotal9 = $records->subtotal9;
					$subtotal10 = $records->subtotal10;
					$total =  $records->total;
				}
			}
			
			$result = $this->am->setNewDeliverRecord($id,$customername,$contactnumber,$customeraddress,$deliverschedule,$specialinstructions,$total);
			$history = $this->am->setNewHistoryRecord($id,$customername, $customeremailaddress, $contactnumber,$customeraddress,$dateordered,$deliverschedule,$specialinstructions, $order1, $order2, $order3, $order4, $order5, $order6, $order7, $order8, $order9, $order10, $quantity1, $quantity2, $quantity3, $quantity4, $quantity5, $quantity6, $quantity7, $quantity8, $quantity9, $quantity10, $subtotal1, $subtotal2, $subtotal3, $subtotal4, $subtotal5, $subtotal6, $subtotal7, $subtotal8, $subtotal9, $subtotal10, $total);

			if($result && $history){
			$this->session->set_flashdata('success_msg', 'Order is Finished and ready to Deliver');
			}else{
			$this->session->set_flashdata('error_msg', 'Fail to process the order!');
			}
			redirect(base_url('AdminContr/viewAllProcess'));
		

	}
	public function logout(){
		$this->session->unset_userdata('username');
		redirect('LogInContr');
	}

}
?>