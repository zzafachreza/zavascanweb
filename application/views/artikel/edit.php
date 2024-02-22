<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('artikel') ?>">artikel</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	      
	      <?php
	  		
	  		$id_artikel = $this->uri->segment(3);
	  		$arr  = $this->db->query("SELECT * FROM data_artikel WHERE id_artikel='$id_artikel'")->row_object();
	  		
	  		?>
	  		
	  		
	  		
	  <form action="<?php echo site_url('artikel/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('artikel') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="btn bg-utama" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$arr->foto ?>" width="100">
	  			   	   <input type="hidden" name="id" value="<?php echo $arr->id_artikel ?>">
			           <input type="hidden" name="foto_old" value="<?php echo $arr->foto ?>">
		


			  <div class="form-group col col-sm-6">
			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika tidak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			   
	  		    <table class="table table-hover table-bordered">
	  		          <tr>
	  		            <th>Judul</th>
	  		            <td>
	  		                  <input autocomplete="off" type="text" name="judul" class="form-control" id="judul" value="<?php echo $arr->judul ?>">
	  		            </td>
	  		        </tr>
	  		       
	  		           <tr>
	  		            <td colspan="2">
	  		                  <textarea name="isi" id="summernote"><?php echo $arr->isi ?></textarea>
	  		            </td>
	  		         </tr>
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



