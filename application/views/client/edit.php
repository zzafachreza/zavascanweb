
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
    	  			?>
    	  	
    	  	
    	<?php 
    	  			
    	  			if($col->Field=="foto_$modul"){
    	  			        ?>
    	  			        
    	
        			    <input type="hidden" name="foto_<?php echo $modul ?>_old" class="form-control" value="<?php echo $data->{$col->Field} ?>" />
        	
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label class="AppLabel">
        			<?php echo ucfirst(str_replace("_"," ",$col->Field)) ?> 
        			     </label>
        			    <input type="file" name="foto_<?php echo $modul ?>" class="form-control" />
        		     </div>
        			  
        			  <?php 
    	  			    }elseif($col->Field=="tanggal_daftar" || $col->Field=="deadline"){
    	  			        ?>
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label class="AppLabel">
        			<?php echo ucfirst(str_replace("_"," ",$col->Field)) ?> 
        			     </label>
        			      <input type="date" name="<?php echo $col->Field ?>" class="form-control" value="<?php echo $data->{$col->Field} ?>" />
        		     </div>
        			  
        			  <?php 
    	  			    }elseif($col->Field=="status_client"){
    	  			        ?>
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label class="AppLabel">
        			<?php echo ucfirst(str_replace("_"," ",$col->Field)) ?> 
        			     </label>
        			    <select class="form-control" name="<?php echo $col->Field ?>">
        			        <option <?php echo $data->{$col->Field}=="PROSPEK"?"selected":"" ?> >PROSPEK</option>
        			        <option <?php echo $data->{$col->Field}=="DEAL"?"selected":"" ?>>DEAL</option>
        			        <option <?php echo $data->{$col->Field}=="BATAL"?"selected":"" ?>>BATAL</option>
        			    </select>
        		     </div>
        			  
        			  <?php 
    	  			    }else{
    	  			        ?>
    	  			        
    	  			        <div class="form-group col col-sm-6">
        			    <label class="AppLabel">
        			 		<?php echo ucfirst(str_replace("_"," ",$col->Field)) ?> 
        			     </label>
        			   
        			    <input autocomplete="off" value="<?php echo $data->{$col->Field} ?>" type="<?php echo $col->Field=='fid_user'?'hidden':'text' ?>" name="<?php echo $col->Field ?>" class="form-control <?php echo $col->Field=='harga_asset'?'uang':'' ?>" id="<?php echo $col->Field ?>" autofocus="autofocus">
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



