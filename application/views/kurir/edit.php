<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('kurir') ?>">kurir</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('kurir/update') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('kurir') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    
	  		 	   	<img src="<?php echo site_url().$kurir['foto'] ?>" width="100">

			
			  <input type="hidden" name="foto_old" value="<?php echo $kurir['foto'] ?>">
			 
			 <input type="hidden" name="id" value="<?php echo $kurir['id'] ?>">
			     <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  

			 <table class="table">
			     

			     <tr><th>Nama kurir</th><td><input autocomplete='off' type='text' name='nama_kurir' class='form-control' value="<?php echo $kurir['nama_kurir'] ?>"></td></tr>
			      <tr><th>Kode</th><td><input autocomplete='off' type='text' name='kode' class='form-control' value="<?php echo $kurir['kode'] ?>"></td></tr>

           
                 
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



