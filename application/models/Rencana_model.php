<?php

class Rencana_model extends CI_Model{

	function getData(){
		$sql ="SELECT data_rencana.id,komponen,satuan,koefisien,harga,pajak,total, data_rekening.nama as nama_rekening,id_rekening ,data_rencana.id_kegiatan,data_kegiatan_pica.nama as nama_kegiatan,data_kegiatan_pica.anggaran as anggaran_kegiatan,data_kegiatan_pica.foto,data_bidang.nama as nama_bidang,id_bidang,data_bidang.anggaran as anggaran_bidang FROM data_rencana JOIN data_kegiatan_pica on data_rencana.id_kegiatan = data_kegiatan_pica.id join data_bidang on data_bidang.id = data_kegiatan_pica.id_bidang join data_rekening on data_rekening.id = data_rencana.id_rekening";
		$data = $this->db->query($sql);
		return $data;
	}

    function getId($id){
		$sql ="SELECT * FROM data_rencana WHERE id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}


	function insert(
	
		$id_kegiatan,
        $id_rekening,
        $komponen,
        $satuan,
        $koefisien,
        $harga,
        $pajak,
        $total,
        
    $foto
	
	){

	echo $sql ="INSERT INTO data_rencana(
	    
	    		id_kegiatan,
                id_rekening,
                komponen,
                satuan,
                koefisien,
                harga,
                pajak,
                total,
        	
	    
        foto
	    ) values(
	        
		        '$id_kegiatan',
                '$id_rekening',
                '$komponen',
                '$satuan',
                '$koefisien',
                '$harga',
                '$pajak',
                '$total',
     
                    
            '$foto'
            	        
	        )";

	 $this->db->query($sql);
	}

	function update($id,
	
		
		$id_kegiatan,
        $id_rekening,
        $komponen,
        $satuan,
        $koefisien,
        $harga,
        $pajak,
        $total,
    
	
    $foto
	
	,$foto_old){

		if(!empty($foto)){
			 $sql= "UPDATE data_rencana SET 
			 
		    id_kegiatan='$id_kegiatan',
            id_rekening='$id_rekening',
            komponen='$komponen',
            satuan='$satuan',
            koefisien='$koefisien',
            harga='$harga',
            pajak='$pajak',
            total='$total',
			 
			 
			 foto='$foto' WHERE id='$id'";
		}else{

			echo $sql= "UPDATE data_rencana SET 
			
			       id_kegiatan='$id_kegiatan',
                    id_rekening='$id_rekening',
                    komponen='$komponen',
                    satuan='$satuan',
                    koefisien='$koefisien',
                    harga='$harga',
                    pajak='$pajak',
                    total='$total'
			
			WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}


	
	function delete($id){
		$sql="DELETE FROM data_rencana WHERE id='$id'";
		 $this->db->query($sql);
	}



	

}