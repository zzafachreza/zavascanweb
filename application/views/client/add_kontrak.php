<div class="container-fluid">
<?php
    
     date_default_timezone_set("Asia/Jakarta");
    	$id_client = $this->uri->segment(3);
	
	$sql="SELECT * FROM data_client WHERE id_client='$id_client'";
	
	$c = $this->db->query($sql)->row_object();
	
		if($c->status_client=='DEAL'){
	    $warna = 'success';
	}elseif($c->status_client=='PROSPEK'){
	    $warna = 'primary';
	}elseif($c->status_client=='BATAL'){
	    $warna = 'danger';
	}
    
    ?>

	  <form action="<?php echo site_url($modul.'/insert_kontrak') ?>" method="POST" enctype="multipart/form-data">

    <div class="row" style="margin-top:2%;margin-bottom:2%">
        <div class="col col-sm-6">
            	<a href="<?php echo site_url($modul.'/tracking/'.$id_client) ?>" class="btn bg-white col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  
        </div>
        <div class="col col-sm-6">
            	<button class="btn bg-utama col col-sm-12" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
        </div>
    </div>
    <?php
    
     date_default_timezone_set("Asia/Jakarta");
    	$id_client = $this->uri->segment(3);
	
	$sql="SELECT * FROM data_client WHERE id_client='$id_client'";
	
	$c = $this->db->query($sql)->row_object();
	
		if($c->status_client=='DEAL'){
	    $warna = 'success';
	}elseif($c->status_client=='PROSPEK'){
	    $warna = 'primary';
	}elseif($c->status_client=='BATAL'){
	    $warna = 'danger';
	}
    
    ?>
	<h3><?php echo $c->nama_client ?> <span class="badge badge-<?php echo $warna ?>"><?php echo $c->status_client ?></span></h3>
	  		
	  		    <div class="row">
	  		        <div class="col-sm-6">
	  		            <input type="hidden" name="fid_client" value="<?php echo $id_client ?>" />
	  		            <div class="form-group">
    	  		        <label>Nomor Invoice / Penawaran</label>
    	  		        <input class="form-control" name="nomor_invoice" readonly  type="text" required autocomplete="off" value="INVZVL<?php echo date('ymdHis') ?>" />
    	  		    </div>
	  		            <div class="form-group">
        	  		        <label>Fitur</label>
        	  		        <select class="form-control" name="fitur">
        	  		            <option>AWAL</option>
        	  		            <option>BARU</option>
        	  		        </select>
        	  		    </div>
        	  		    
	  	<div class="form-group">
    	  		        <label>Nama Menu ( Login / Register / Home dlll)</label>
    	  		        <input autofocus class="form-control" name="menu" type="text" required autocomplete="off" />
        	  		    </div>
    	  		    
    	  		    
    
                  
    	  	
	  		    </div>
	  		    
	  		    <div class="col-sm-6">
	  		    
    	  		    
    	  		 
    	  		    
                     <div class="form-group">
    	  		        <label>Deskripsi / Keterangan Menu</label>
    	  		        <textarea rows="4" name="keterangan" id="summernote"></textarea>
    	  		    </div>
    	  		    
    	  		    

	  		        
	  		          
        	  		    
        	  	
        	  		    
        	  		    
	  		    </div>
	  		    </div>

			

	
			   
			   
			
			</form>





</div>
<script>
    $(document).ready(function() {
  $('#summernote').summernote({
      height:150
  });
});
</script>


