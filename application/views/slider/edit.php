<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('slider') ?>">slider</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('slider/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('slider') ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="btn bg-utama" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$slider['foto'] ?>" width="100">

			
			  <input type="hidden" name="foto_old" value="<?php echo $slider['foto'] ?>">
		


			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			    <div class="form-group col col-sm-6">
			    <label for="keterangan1" class="AppLabel">keterangan</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $slider['id'] ?>">
			    <input autocomplete="off" value="<?php echo $slider['keterangan1'] ?>" required="required" type="text" name="keterangan1" class="AppInput" id="keterangan1">
			  </div>


			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



