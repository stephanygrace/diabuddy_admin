<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_MODEL
{
	function can_login($email,$password){
		$this->db->where('email', $email);
		$query = $this->db->get('tblRegister');

		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				if ($row->is_email_verified == 'yes') {
					$store_password = $this->encryption->decrypt($row->password);
					if ($password == $store_password) {
						$this->session->set_userdata('id', $row->id);
					}else{
						return 'Wrong Password';
					}
				}else{
						return 'Please Verify your Email First';
				}
			}
		}else{
			return false;
		}
	}
	public function checkCode($code){
		$this->db->where('code', $code);
		$query = $this->db->get('tblauthentication');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				if ($row->code = $code ) {
					return true;
				}else{
						return 'Wrong Code. Please double check your Code.';
				}
			}
		}else{
			return false;
		}
	}

	public function removeCode($code){
		$this->db->where('code',$code);
		$this->db->delete('tblauthentication');
	}

	public function getRecord($email){
		$this->db->where('email',$email);
		$sql = $this->db->get('tblRegister');
		if($sql->num_rows() > 0){
			return $sql->row();
		}else{
			return false;
		}
	}
	public function setNewCode($id,$code,$email){
		$fields = array(
			'id' => $id,
			'code' => $code,
			'email' => $email,
		);
		$this->db->insert('tblauthentication',$fields);
	}
	public function getCode($email){
		$this->db->where('email',$email);
		$sql = $this->db->get('tblauthentication');
		if($sql->num_rows() > 0){
			return $sql->row();
		}else{
			return false;
		}
	}
}
?>