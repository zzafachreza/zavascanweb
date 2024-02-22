<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('slider') ?>">slider</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('slider/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('slider') ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    
	  		   <div class="form-group col col-sm-6">
			    <label for="foto" class="AppLabel">Foto</label>
			    <input autocomplete="off" required="required" type="file" name="foto" >
			  </div>


			  <div class="form-group col col-sm-6">
			    <label for="keterangan1" class="AppLabel">keterangan</label>
			    <i class="flaticon2-file iconInput"></i>
			    <input autocomplete="off" type="text" name="keterangan1" class="AppInput" id="keterangan1" autofocus="autofocus">
			  </div>

	
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



