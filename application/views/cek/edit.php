
<?php

$data = $this->db->query("SELECT * FROM data_$modul WHERE id_$modul='$id'")->row_object();

?>
<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url($modul) ?>">s<?php echo ucfirst($modul) ?></a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url($modul.'/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url($modul) ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="btn bg-utama" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	
                <input name="id_<?php echo $modul ?>" type="hidden" value="<?php echo $id ?>" />
	
			  
			  
			  
			    <?php
    	  			

    	  			
    	  			foreach($this->db->query("SHOW COLUMNS from `data_$modul` WHERE FIELD !='id_$modul'")->result() as $col){
    	  			    
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
    	  			      elseif($col->Field=="foto_medsos_old"){
    	  			        $tipe_field='hidden';
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
        			       <option <?php echo $data->{$col->Field}==$r->nama_lengkap?'selected':'' ?>><?php echo $r->nama_lengkap ?></option>
        			       <?php
        			        }
        			       ?>
        			   </select>
        		     </div>
        			  <?php 
    	  			    }elseif($col->Field=="foto_medsos"){
    	  			        ?>
    	  			        
    	
        			    <input type="hidden" name="foto_medsos_old" class="form-control" value="<?php echo $data->{$col->Field} ?>" />
        	
    	  			        
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
        			   
        			    <input autocomplete="off" value="<?php echo $data->{$col->Field} ?>" type="<?php echo $tipe_field ?>" name="<?php echo $col->Field ?>" class="form-control" id="<?php echo $col->Field ?>" autofocus="autofocus">
        			  </div>
    	  			        
    	  			        <?php
    	  			    }
    	  			?>
    	  			
    	  			
    	  	
    	  			
    	  			
    	  			<?php } ?>


			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



