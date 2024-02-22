

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
	  		
	  <form action="<?php echo site_url('pica/update2') ?>" method="POST" enctype="multipart/form-data" >
<a href="<?php echo site_url('pica/detail') ?>/<?php echo $id_pica ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$pica['foto'] ?>" width="100">

			
			  <input type="hidden" name="foto_old" value="<?php echo $pica['foto'] ?>">
			   <input type="hidden" name="id" value="<?php echo $pica['id'] ?>">
			   
			   <input type="hidden" name="id_pica" value="<?php echo $pica['id_pica'] ?>">
		


			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			   


			   <table class="table">
			       <tr><th>Kegiatan utama</th><td><input autocomplete='off' type='text' name='kegiatan_utama' class='form-control' value='<?php echo $pica['kegiatan_utama'] ?>'></td></tr>
                    <tr><th>Kegiatan tambahan</th><td><input autocomplete='off' type='text' name='kegiatan_tambahan' class='form-control' value='<?php echo $pica['kegiatan_tambahan'] ?>'></td></tr>
                    <tr><th>Pic</th><td><input autocomplete='off' type='text' name='pic' class='form-control' value='<?php echo $pica['pic'] ?>'></td></tr>
                    <tr><th>Status</th><td><input autocomplete='off' type='text' name='status' class='form-control' value='<?php echo $pica['status'] ?>'></td></tr>
                    <tr><th>Masalah</th><td><input autocomplete='off' type='text' name='masalah' class='form-control' value='<?php echo $pica['masalah'] ?>'></td></tr>
                    <tr><th>Perbaikan</th><td><input autocomplete='off' type='text' name='perbaikan' class='form-control' value='<?php echo $pica['perbaikan'] ?>'></td></tr>
                    <tr><th>Upd</th><td><input autocomplete='off' type='date' name='upd' class='form-control' value='<?php echo $pica['upd'] ?>'></td></tr>
                    <tr><th>Foto</th><td><input autocomplete='off' type='text' name='foto' class='form-control' value='<?php echo $pica['foto'] ?>'></td></tr>
			  </table>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



