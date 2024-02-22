<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('bidang/update') ?>" method="POST" enctype="multipart/form-data" >

	<a onClick="window.history.back();"  class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  id="simpan" type="SUBMIT" class="btn bg-utama" ><i class="flaticon2-download-2"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		

			
			  <input type="hidden" name="foto_old" value="<?php echo $bidang['foto'] ?>">
			   <input type="hidden" name="id" value="<?php echo $bidang['id'] ?>">
		


			   <div class="form-group col col-sm-6">

			    <label for="foto" >Dokumentasi (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			   


			   <table class="table">
			        <tr><th>Nama bidang</th><td><input autocomplete='off' type='text' name='nama' class='form-control' value='<?php echo $bidang['nama'] ?>'></td></tr>
			          <tr><th>Anggaran</th><td><input autocomplete='off' type='text' name='anggaran' class='form-control' value='<?php echo $bidang['anggaran'] ?>'></td></tr>
			           <tr><th>Realisasi</th><td><input autocomplete='off' type='text' name='perubahan' class='form-control' value='<?php echo $bidang['perubahan'] ?>'></td></tr>
			     </table>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



