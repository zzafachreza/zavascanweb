<div class="container-fluid">


	  <form action="<?php echo site_url($modul.'/insert_invoice') ?>" method="POST" enctype="multipart/form-data">

    <div class="row" style="margin-top:2%;margin-bottom:2%">
        <div class="col col-sm-6">
            	<a href="<?php echo site_url($modul) ?>" class="btn bg-white col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  
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
        	  		        <label>Status</label>
        	  		        <select class="form-control" name="status_invoice">
        	  		            <option>PENAWARAN</option>
        	  		            <option>DP</option>
        	  		            <option>TERMIN</option>
        	  		            <option>PELUNASAN</option>
        	  		        </select>
        	  		    </div>
        	  		    
	  		        <div class="form-group">
    	  		        <label>Tanggal Buat</label>
    	  		        <input class="form-control" name="tanggal_invoice" type="date" value="<?php echo date('Y-m-d') ?>" />
    	  		    </div>
    	  		    
    	  		    <div class="form-group">
    	  		        <label>Nomor Invoice / Penawaran</label>
    	  		        <input class="form-control" name="nomor_invoice" readonly  type="text" required autocomplete="off" value="INVZVL<?php echo date('ymdHis') ?>" />
    	  		    </div>
    
                   <div class="row">
                       
                        <div class="form-group col-sm-6">
    	  		        <label>Harga Project</label>
    	  		        <input class="form-control uang" name="harga" type="text" required autocomplete="off" />
        	  		    </div>
        	  		     <div class="form-group col-sm-6">
        	  		        <label>Diskon</label>
        	  		        <input class="form-control uang" name="diskon" type="text" value="0" required autocomplete="off" />
        	  		    </div>
        	  		     <div class="form-group col-sm-6">
        	  		        <label>Hosting dan Domain / tahun</label>
        	  		        <input class="form-control uang" name="hosting_domain" type="text" value="0" required autocomplete="off" />
        	  		    </div>
    	  		    
    	  		    
                   </div>
                  
    	  	
	  		    </div>
	  		    
	  		    <div class="col-sm-6">
	  		    
    	  		    
    	  		 
    	  		    
                     <div class="form-group">
    	  		        <label>Deskripsi</label>
    	  		        <textarea rows="5" name="keterangan" id="summernote"></textarea>
    	  		    </div>
    	  		    
    	  		    
    	  		    <!-- <div class="form-group">-->
    	  		    <!--    <label>Down Payment</label>-->
    	  		    <!--    <input class="form-control uang" name="bayar_1" type="text" value="0" required autocomplete="off" />-->
    	  		    <!--</div>-->
    	  		    
    	  		    <!-- <div class="form-group">-->
    	  		    <!--    <label>Termin 1</label>-->
    	  		    <!--    <input class="form-control uang" name="bayar_2" type="text" required autocomplete="off" />-->
    	  		    <!--</div>-->
    	  		    
    	  		    
    	  		    <!-- <div class="form-group">-->
    	  		    <!--    <label>Termin 2</label>-->
    	  		    <!--    <input class="form-control uang" name="bayar_3" type="text" required autocomplete="off" />-->
    	  		    <!--</div>-->
	  		        
	  		          
        	  		    
        	  	
        	  		    
        	  		    
	  		    </div>
	  		    </div>

			

	
			   
			   
			
			</form>





</div>
<script>
    $(document).ready(function() {
  $('#summernote').summernote({
      height:200
  });
});
</script>


