<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('artikel') ?>">artikel</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		<?php
	  		
	  		$id_artikel = $this->uri->segment(3);
	  		$arr  = $this->db->query("SELECT * FROM data_artikel WHERE id_artikel='$id_artikel'")->row_object();
	  		
	  		?>
	
	<a href="<?php echo site_url('artikel') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">

	  		 <div class="form-group">
	  		 	
	
				<img src="<?php  echo site_url().$arr->foto ?>" width="200">
			  </div>

	  		 	<h2> <?php  echo $arr->judul ?></h2>
	  		       <?php  echo $arr->isi ?>


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



