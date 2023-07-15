<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class RegisterModel extends CI_Model{
	
	public function setAdminRecord($data){
		
		$this->db->insert('tblRegister',$data);
		return $this->db->insert_id();

	}

	function verify_email($key){
		$this->db->where('verification_key', $key);
		$this->db->where('is_email_verified', 'no');
		$query = $this->db->get('tblRegister');
		if ($query->num_rows() > 0) {
			$data = array(
				'is_email_verified' =>'yes'
			);
			$this->db->where('verification_key', $key);
			$this->db->update('tblRegister', $data);
			return true;

		}else{
			return false;
		}
	}

	public function setNewAdminRecord($fn,$mn,$ln,$age,$gender,$email,$password){
		
		$fields = array(
			'first_name'=> $fn,
			'middle_name'=> $mn,
			'last_name'=> $ln,
			'age'=> $age,
			'gender'=> $gender,
			'email'=> $email,
			'password'=> $password,
			);
		$this->db->where('id',$id);
		$this->db->update('tblRegister',$fields);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function getAllAdminRecords(){
		$sql = $this->db->get('tblRegister');
		if ($sql->num_rows()>0) {
			return $sql->result();
		}else{
			return false;
		}
	}

	public function removeAdminRecord($id){
		$this->db->where('id',$id);
		$this->db->delete('tblRegister');
		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function getAdminRecord($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('tblRegister');
		if ($sql->num_rows()>0) {
			return $sql->row();
		}else{
			return false;
		}

	}
		

}
?>