<?php

class Kegiatan_model extends CI_Model{

	function getData(){
		$sql ="SELECT data_kegiatan_pica.id,data_kegiatan_pica.nama,data_kegiatan_pica.anggaran,data_kegiatan_pica.foto,data_bidang.nama as nama_bidang,id_bidang,data_bidang.anggaran as anggaran_bidang FROM data_kegiatan_pica join data_bidang on data_bidang.id = data_kegiatan_pica.id_bidang";
		$data = $this->db->query($sql);
		return $data;
	}

    function getId($id){
		$sql ="SELECT * FROM data_kegiatan_pica WHERE id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}


	function insert(
	    $id_bidang,
		$nama,
        $anggaran,
        
    $foto
	
	){

	echo $sql ="INSERT INTO data_kegiatan_pica(
	            id_bidang,
	    		nama,
        		anggaran,
	    
        foto
	    ) values(
	            '$id_bidang',
		        '$nama',
        		'$anggaran',
                    
            '$foto'
            	        
	        )";

	 $this->db->query($sql);
	}

	function update($id,
	     $id_bidang,
		$nama,
        $anggaran,
	
    $foto
	
	,$foto_old){

		if(!empty($foto)){
			 $sql= "UPDATE data_kegiatan_pica SET 
			 
		    nama='$nama',
		    anggaran='$anggaran',
		    id_bidang='$id_bidang',
			 
			 
			 foto='$foto' WHERE id='$id'";
		}else{

			echo $sql= "UPDATE data_kegiatan_pica SET 
			
			       nama='$nama',
		    anggaran='$anggaran',
		    id_bidang='$id_bidang'
			
			WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}


	
	function delete($id){
		$sql="DELETE FROM data_kegiatan_pica WHERE id='$id'";
		 $this->db->query($sql);
	}



	

}