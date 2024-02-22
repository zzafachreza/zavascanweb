<div class="container-fluid">


	  <form action="<?php echo site_url($modul.'/insert') ?>" method="POST" enctype="multipart/form-data">
	      <input name="fid_member" value="<?php echo $_SESSION['id'] ?>" type="hidden" />

    <div class="row" style="margin-top:2%;margin-bottom:2%">
        <div class="col col-sm-6">
            	<a href="<?php echo site_url($modul) ?>" class="btn bg-white col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  
        </div>
        <div class="col col-sm-6">
            	<button class="btn bg-utama col col-sm-12" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
        </div>
    </div>
	
	  		<form>
	  		    
	  		    
	  		   <?php
    	  			

    	  			
    	  			foreach($this->db->query("SHOW COLUMNS from `data_$modul` WHERE FIELD NOT IN('id_$modul','fid_member')")->result() as $col):
    	  			    
    	  			    $value="";
    	  			    if($col->Field=="nama_toko"){
    	  			        $tipe_field='text';
    	  			        $label = "Nama Toko di Marketplace";
    	  			    }elseif($col->Field=="nama_penerima"){
    	  			        $tipe_field='text';
    	  			        $label = "Nama Penerima";
    	  			    }elseif($col->Field=="barcode_oke"){
    	  			        $tipe_field='text';
    	  			        $label = "Nomor Resi";
    	  			    }elseif($col->Field=="nomor_pesanan"){
    	  			        $tipe_field='text';
    	  			        $label = "Nomor Pesanan";
    	  			    }elseif($col->Field=="nama_barang"){
    	  			        $tipe_field='text';
    	  			        $label = "Nama Barang";
    	  			    }elseif($col->Field=="jumlah"){
    	  			        $tipe_field='text';
    	  			        $label = "Jumlah";
    	  			    }
    	  			    elseif($col->Field=="waktu_medsos"){
    	  			        $tipe_field='time';
    	  			    }
    	  			    
    	  			    else{
    	  			        $tipe_field='text';
    	  			        $value="";
    	  			    }
    	  			    
    	  			?>
    	  			
    	  			<?php 
    	  			
    	  			    if($col->Field=="pic_medsos"){
    	  			        ?>
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label class="AppLabel">
        			        <?php echo ucfirst(str_replace("_"," ",$col->Field)) ?> <?php echo $col->Field=='level'?'(SUPER ADMIN / ADMIN)':'' ?>
        			     </label>
        			   <select  name="<?php echo $col->Field ?>" class="form-control">
        			       <?php
        			       
        			        foreach($this->db->query("SELECT * FROM users")->result() as $r){
        			       
        			       ?>
        			       <option><?php echo $r->nama_lengkap ?></option>
        			       <?php
        			        }
        			       ?>
        			   </select>
        		     </div>
        			  
        			  <?php 
    	  			    }elseif($col->Field=="foto_medsos"){
    	  			        ?>
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label class="AppLabel">
        			        <?php echo ucfirst(str_replace("_"," ",$col->Field)) ?> <?php echo $col->Field=='level'?'(SUPER ADMIN / ADMIN)':'' ?>
        			     </label>
        			    <input type="file" name="foto_medsos" class="form-control" />
        		     </div>
        			  
        			  <?php 
    	  			    }else{
    	  			        ?>
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label for="nama_kecamatan" class="AppLabel">
        			        <?php echo $label ?>
        			     </label>
        			   
        			    <input autocomplete="off" type="<?php echo $tipe_field ?>" name="<?php echo $col->Field ?>" class="form-control" id="<?php echo $col->Field ?>" autofocus="autofocus">
        			  </div>
    	  			        
    	  			        <?php
    	  			    }
    	  			?>
    	  		
    	  			
    	  			  
    	  			
    	  			<?php
    	  			
    	  			endforeach;
    	  			?>
	  		    

			

	
			   
			   
			
			</form>





</div>



