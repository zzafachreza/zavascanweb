<?php

class Customer_model extends CI_Model{

	function getData(){
		$sql ="SELECT * FROM member";
		$data = $this->db->query($sql);
		return $data;
	}

	function insert($nama_lengkap,$username,$password,$level){

	 $sql ="INSERT INTO member(nama_lengkap,username,password,level) values('$nama_lengkap','$username','$password','$level')";

	 $this->db->query($sql);
	}

	function delete($id){
		$sql="DELETE FROM member WHERE id='$id'";
		 $this->db->query($sql);
	}

	function getId($id){
		$sql = "SELECT * FROM member WHERE  id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}

	function update($id,$nama_lengkap,$username,$password,$level){

		if(!empty($password)){
			echo $sql= "UPDATE member SET nama_lengkap='$nama_lengkap',username='$username',password='".sha1($password)."',level='$level' WHERE id='$id'";
		}else{
			echo $sql= "UPDATE member SET nama_lengkap='$nama_lengkap',username='$username',level='$level' WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}

}