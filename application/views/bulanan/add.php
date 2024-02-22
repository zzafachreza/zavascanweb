<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bulanan') ?>">member</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('bulanan/insert') ?>" method="POST" >

	<a href="<?php echo site_url('bulanan') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
			  <div class="form-group col col-sm-6">
			    <label for="nama_lengkap">Nama Pengguna / Toko</label>
    			  <select class="form-control" name="fid_member">
    			      <?php
    			      foreach($this->db->query("SELECT * FROM member")->result() as $r){
    			      ?>
    			      <option value="<?php echo $r->id ?>"><?php echo $r->nama_lengkap ?> - <?php echo $r->email ?></option>
    			      
    			      <?php 
    			      
    			      }
    			      ?>    
    			  </select>
			  </div>

			  <div class="form-group col col-sm-6">
			    <label for="email">Tanggal Invoice</label>
	
			    <input autocomplete="off" required="required" type="date" name="tanggal_bulanan" class="form-control" id="email">
			  </div>
			  
			  <div class="form-group col col-sm-6">
			    <label for="jatuh_tempo">Tanggal Expired / Pembayaran Selanjutnya</label>
	
			    <input autocomplete="off" required="required" type="date" name="jatuh_tempo" class="form-control" id="jatuh_tempo">
			  </div>
			  
	
			    <input autocomplete="off" value="0" type="hidden" name="jumlah_resi" class="form-control" id="jumlah_resi">
	
			  
			   <div class="form-group col col-sm-6">
			    <label for="biaya">Biaya</label>
			    <input autocomplete="off" required="required" type="text" name="biaya" class="form-control" id="biaya">
			  </div>
			  
			  <div class="form-group col col-sm-6">
			    <label for="nama_lengkap">Status Invoice</label>
    			  <select class="form-control" name="status">
    			     <option>BELUM BAYAR</option>
    			     <option>LUNAS</option>
    			  </select>
			  </div>
			  
			 
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



