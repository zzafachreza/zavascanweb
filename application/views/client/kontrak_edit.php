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

	  <form action="<?php echo site_url($modul.'/update_kontrak') ?>" method="POST" enctype="multipart/form-data">

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
    	
    	$id_kontrak = $this->uri->segment(4);
	
	$sql="SELECT * FROM data_client WHERE id_client='$id_client'";
	
	$kontrak = $this->db->query("SELECT * FROM data_kontrak WHERE id_kontrak='$id_kontrak'")->row_object();
	
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
	  		            <input type="hidden" name="id_kontrak" value="<?php echo $id_kontrak ?>" />
	  		            <div class="form-group">
    	  		        <label>Nomor Invoice / Penawaran</label>
    	  		        <input class="form-control" name="nomor_invoice" readonly  type="text" required autocomplete="off" value="INVZVL<?php echo date('ymdHis') ?>" />
    	  		    </div>
	  		            <div class="form-group">
        	  		        <label>Fitur</label>
        	  		        <select class="form-control" name="fitur">
        	  		            <option <?php echo $kontrak->menu=='AWAL'?'selected':'' ?>>AWAL</option>
        	  		            <option <?php echo $kontrak->menu=='BARU'?'selected':'' ?>>BARU</option>
        	  		        </select>
        	  		    </div>
        	  		    
	  	<div class="form-group">
    	  		        <label>Nama Menu ( Login / Register / Home dlll)</label>
    	  		        <input autofocus class="form-control" value="<?php echo $kontrak->menu ?>" name="menu" type="text" required autocomplete="off" />
        	  		    </div>
    	  		    
    	  		    
    
                  
    	  	
	  		    </div>
	  		    
	  		    <div class="col-sm-6">
	  		    
    	  		    
    	  		 
    	  		    
                     <div class="form-group">
    	  		        <label>Deskripsi / Keterangan Menu</label>
    	  		        <textarea rows="4" name="keterangan" id="summernote"><?php echo $kontrak->keterangan ?></textarea>
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


