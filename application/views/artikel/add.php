<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('artikel') ?>">artikel</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('artikel/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('artikel') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="btn btn-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    
	  		    <table class="table table-hover table-bordered">
	  		        <tr>
	  		            <th>Foto</th>
	  		            <td><input autocomplete="off" required="required" type="file" name="foto" ></td>
	  		        </tr>
	  		          <tr>
	  		            <th>Judul</th>
	  		            <td>
	  		                  <input autocomplete="off" type="text" name="judul" class="form-control" id="judul" autofocus="autofocus">
	  		            </td>
	  		        </tr>
	  		        
	  		         <tr>
	  		            <td colspan="2">
	  		                  <textarea name="isi" id="summernote"></textarea>
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


