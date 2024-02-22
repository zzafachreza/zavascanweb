<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('pica') ?>">pica</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('pica/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('pica') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			    	   <input type="hidden" name="id" value="<?php echo $pica['id'] ?>">
	
			   
	  		    <table class="table table-hover table-bordered">
	  		        <tr><th>Kegiatan</th><td><input autocomplete='off' type='text' name='kegiatan' class='form-control' value='<?php echo $pica['kegiatan'] ?>'></td></tr>
                    <tr><th>Tempat</th><td><input autocomplete='off' type='text' name='tempat' class='form-control' value='<?php echo $pica['tempat'] ?>'></td></tr>
                    <tr><th>Tanggal</th><td><input autocomplete='off' type='date' name='tanggal' class='form-control' value='<?php echo $pica['tanggal'] ?>'></td></tr>
	  		    </table>
			  
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();

    });
  </script>



