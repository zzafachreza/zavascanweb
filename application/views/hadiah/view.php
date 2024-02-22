<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('hadiah') ?>">hadiah</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('hadiah') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">

	  		 <div class="form-group">
	  		 	
	
				<img src="<?php  echo site_url().$hadiah['foto'] ?>" width="100">
			  </div>

	  		 <table class="table">
	  		        
	  		        <tr><th>nama</th><td><?php echo $hadiah['nama'] ?></td></tr>
                    <tr><th>point</th><td><?php echo $hadiah['point'] ?></td></tr>
                    <tr><th>keterangan</th><td><?php echo $hadiah['keterangan'] ?></td></tr>
	  		     
	  		 </table>

	


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



