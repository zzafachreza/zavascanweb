<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('slider') ?>">slider</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('slider') ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">

	  		 <div class="form-group">
	  		 	
	
				<img src="<?php  echo site_url().$slider['foto'] ?>" width="100">
			  </div>

	  		  <div class="form-group">
			    <label>keterangan</label>
			    <h3><?php  echo $slider['keterangan1'] ?></h3>
			  </div>


	


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



