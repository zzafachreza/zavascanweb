<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('hadiah') ?>">hadiah</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('hadiah/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('hadiah') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="AppButton-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="AppButton-primary" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    
	  		   <div class="form-group col col-sm-6">
			    <label for="foto" class="AppLabel">Foto</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>


			 <table class="table">
			     
			   <tr><th>Nama</th><td><input autocomplete='off' type='text' name='nama' class='form-control'></td></tr>
                <tr><th>Point</th><td><input autocomplete='off' type='text' name='point' class='form-control'></td></tr>
                <tr><th>Keterangan</th><td><input autocomplete='off' type='text' name='keterangan' class='form-control'></td></tr>
                 
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



