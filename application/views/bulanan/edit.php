<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('broadcast') ?>">broadcast</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('broadcast/update') ?>" method="POST" enctype="multipart/form-data" >
<?php

$br = $this->db->query("SELECT * FROM data_broadcast limit 1")->row_object();
?>
	<a href="<?php echo site_url('broadcast') ?>" class="btn btn-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="btn bg-utama" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	 

	  		    <table class="table table-hover table-bordered">
	  		          <tr>
	  		            <th>Title / Judul</th>
	  		            <td>
	  		                  <input autocomplete="off" type="text" name="title" class="form-control" id="judul" value="<?php echo $br->title ?>">
	  		            </td>
	  		        </tr>
	  		         <tr>
	  		          <th>Body / Isi</th>
	  		            <td>
	  		                  <input autocomplete="off" type="text" name="body" class="form-control" id="penulis" value="<?php echo $br->body ?>">
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



