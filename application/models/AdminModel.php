<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ADminModel extends CI_Model
{
	function __construct(){
		parent::__construct();
	}


	public function setRecipeRecord($recipe,$cookingTime,$cal,$sugar,$fat,$carbs,$protein,$fibre)
	{
		$cluster = 0;
		$category = 1;
		$difficulty = 0;
		$prepMin = 10;
		$servings = 5;
		$directory = 'assets/image/'.$recipe.'.jpg';

		$fields = array(
			'Cluster'=> $cluster,
			'Category'=> $category,
			'Recipe' => $recipe,
			'Cooking_Time_mins'=> $cookingTime,
			'Difficulty'=> $difficulty,
			'Preparation_Time_mins'=> $prepMin,
			'Servings'=> $servings,
			'Protein_g'=> $protein,
			'Energy_kcal'=> $cal,
			'Carbohydrate_incl_fibre_g'=> $carbs,
			'Sugar_g'=> $sugar,
			'Fibre_g'=> $fibre,
			'Fat_g'=> $fat,
			'Directory'=> $directory,);

		$this->db->insert('updated_dataset',$fields);
		if($this->db->affected_rows()>0){
			return true;
		}
		else
		{
			return false;
		}


	}

	public function setNewRecipeRecord($id,$cluster,$recipe,$cookingTime,$cal,$sugar,$fat,$carbs,$protein,$fibre)
	{
		$category = 1;
		$difficulty = 0;
		$prepMin = 10;
		$servings = 5;
		$directory = 'assets/image/'.$recipe.'.jpg';

		$fields = array(
			'Cluster'=> $cluster,
			'Category'=> $category,
			'Recipe' => $recipe,
			'Cooking_Time_mins'=> $cookingTime,
			'Difficulty'=> $difficulty,
			'Preparation_Time_mins'=> $prepMin,
			'Servings'=> $servings,
			'Protein_g'=> $protein,
			'Energy_kcal'=> $cal,
			'Carbohydrate_incl_fibre_g'=> $carbs,
			'Sugar_g'=> $sugar,
			'Fibre_g'=> $fibre,
			'Fat_g'=> $fat,
			'Directory'=> $directory,);

		$this->db->where('id',$id);
		$this->db->update('updated_dataset',$fields);
		if($this->db->affected_rows()>0){
			return true;
		}
		else
		{
			return false;
		}


	}


	public function getAllRecipe(){
		$sql = $this->db->get('updated_dataset');
		if($sql->num_rows() > 0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function removeRecipe($id){
		$this->db->where('ID',$id);
		$this->db->delete('updated_dataset');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function removeUser($id){
		$this->db->where('ID',$id);
		$this->db->delete('user_info');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getRecipeRecord($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('updated_dataset');
		if($sql->num_rows() > 0){
			return $sql->row();
		}else{
			return false;
		}
	}

	public function getAllAdminRecords(){
		$sql = $this->db->get('tblregister');
		if($sql->num_rows() > 0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function getAllUserRecords(){
		$sql = $this->db->get('user_info');
		if($sql->num_rows() > 0){
			return $sql->result();
		}else{
			return false;
		}
	}



public function fetch_data($query){
		$this->db->like('Recipe',$query);
		$this->db->or_like('Cluster',$query);
		$this->db->order_by('ID', 'ASC');
        $query = $this->db->get('updated_dataset');
        return $query->result();
	}





	
	
	
	public function getAllDeliverRecords(){
		$sql = $this->db->get('tbldeliver');
		if($sql->num_rows() > 0){
			return $sql->result();
		}else{
			return false;
		}
	}
	public function getAllRecordHistory(){
		$sql = $this->db->get('pigme_order_history');
		if($sql->num_rows() > 0){
			return $sql->result();
		}else{
			return false;
		}
	}
	public function getAllProcess(){
		$sql = $this->db->get('tblprocess');
		if($sql->num_rows() > 0){
			return $sql->result();
		}else{
			return false;
		}
	}
	public function getFromProcess($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('tblprocess');
		if($sql->num_rows() > 0){
			return $sql->row();
		}else{
			return false;
		}
	}

	public function getOrderRecord($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('pigme_confirmed_orders');
		if($sql->num_rows() > 0){
			return $sql->row();
		}else{
			return false;
		}
	}
	
	public function setNewDeliverRecord($id,$customername,$contactnumber,$customeraddress,$deliverschedule,$specialinstructions,$total){
		$fields = array(
			'id' => $id, 
			'customername' => $customername, 
			'contactnumber' => $contactnumber, 
			'customeraddress' => $customeraddress, 
			'deliverschedule' => $deliverschedule, 
			'specialinstructions' => $specialinstructions, 
			'total' => $total 
		);
		
		$this->db->insert('tbldeliver',$fields);
		if($this->db->affected_rows() > 0){
		   $this->db->where('id',$id);
		   $this->db->delete('tblprocess');
			return true;

		}else{
			return false;
		}

	}

	public function setNewProcess($id,$customername, $customeremailaddress, $contactnumber,$customeraddress,$dateordered,$deliverschedule,$specialinstructions, $order1, $order2, $order3, $order4, $order5, $order6, $order7, $order8, $order9, $order10, $quantity1, $quantity2, $quantity3, $quantity4, $quantity5, $quantity6, $quantity7, $quantity8, $quantity9, $quantity10, $subtotal1, $subtotal2, $subtotal3, $subtotal4, $subtotal5, $subtotal6, $subtotal7, $subtotal8, $subtotal9, $subtotal10, $total){
		$fields = array(
			'id' => $id,
			'customername' => $customername,
			'customeremailaddress' => $customeremailaddress,
			'contactnumber' => $contactnumber,
			'customeraddress' =>  $customeraddress,
			'dateordered' => $dateordered,
			'deliverschedule' =>  $deliverschedule,
			'specialinstructions' =>  $specialinstructions,
			'order1' => $order1,
			'order2' => $order2,
			'order3' => $order3,
			'order4'=> $order4,
			'order5' =>$order5,
			'order6' =>$order6,
			'order7'=> $order7,
			'order8' =>$order8,
			'order9' =>$order9,
			'order10' =>$order10,
			'quantity1'=> $quantity1,
			'quantity2' =>$quantity2,
			'quantity3' =>$quantity3,
			'quantity4' =>$quantity4,
			'quantity5' =>$quantity5,
			'quantity6'=> $quantity6,
			'quantity7'=> $quantity7,
			'quantity8' =>$quantity8,
			'quantity9'=> $quantity9,
			'quantity10'=> $quantity10,
			'subtotal1'=> $subtotal1,
			'subtotal2' =>$subtotal2,
			'subtotal3'=> $subtotal3,
			'subtotal4' =>$subtotal4,
			'subtotal5' =>$subtotal5,
			'subtotal6'=> $subtotal6,
			'subtotal7'=> $subtotal7,
			'subtotal8'=> $subtotal8,
			'subtotal9' =>$subtotal9,
			'subtotal10'=> $subtotal10,
			'total' =>$total
		);
		
		$this->db->insert('tblprocess',$fields);
		if($this->db->affected_rows() > 0){
		   $this->db->where('id',$id);
		   $this->db->delete('pigme_confirmed_orders');
			return true;
		}else{
			return false;
		}

	}


	public function setNewHistoryRecord($id,$customername,$customeremailaddress,$contactnumber,$customeraddress,$dateordered,$deliverschedule,$specialinstructions, $order1, $order2, $order3, $order4, $order5, $order6, $order7, $order8, $order9, $order10, $quantity1, $quantity2, $quantity3, $quantity4, $quantity5, $quantity6, $quantity7, $quantity8, $quantity9, $quantity10, $subtotal1, $subtotal2, $subtotal3, $subtotal4, $subtotal5, $subtotal6, $subtotal7, $subtotal8, $subtotal9, $subtotal10, $total){
		$fields = array(
			'id' => $id,
			'customername' => $customername,
			'customeremailaddress' => $customeremailaddress,
			'contactnumber' => $contactnumber,
			'customeraddress' =>  $customeraddress,
			'dateordered' => $dateordered,
			'deliverschedule' =>  $deliverschedule,
			'specialinstructions' =>  $specialinstructions,
			'order1' => $order1,
			'order2' => $order2,
			'order3' => $order3,
			'order4'=> $order4,
			'order5' =>$order5,
			'order6' =>$order6,
			'order7'=> $order7,
			'order8' =>$order8,
			'order9' =>$order9,
			'order10' =>$order10,
			'quantity1'=> $quantity1,
			'quantity2' =>$quantity2,
			'quantity3' =>$quantity3,
			'quantity4' =>$quantity4,
			'quantity5' =>$quantity5,
			'quantity6'=> $quantity6,
			'quantity7'=> $quantity7,
			'quantity8' =>$quantity8,
			'quantity9'=> $quantity9,
			'quantity10'=> $quantity10,
			'subtotal1'=> $subtotal1,
			'subtotal2' =>$subtotal2,
			'subtotal3'=> $subtotal3,
			'subtotal4' =>$subtotal4,
			'subtotal5' =>$subtotal5,
			'subtotal6'=> $subtotal6,
			'subtotal7'=> $subtotal7,
			'subtotal8'=> $subtotal8,
			'subtotal9' =>$subtotal9,
			'subtotal10'=> $subtotal10,
			'total' =>$total
		);
		
		$this->db->insert('pigme_order_history',$fields);
		if($this->db->affected_rows() > 0){
			return true;

		}else{
			return false;
		}

	}
	
}
?>