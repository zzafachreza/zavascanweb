<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('pica') ?>">pica</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('pica/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('pica') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="AppButton-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="AppButton-primary" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    
	  		    <table class="table table-hover table-bordered">
	  		        <tr><th>Kegiatan</th><td>
	  		            <select class="form-control selectza" name="kegiatan" >
	  		                <option></option>
	  		                <?php 
	  		                    
	  		                    
	  		                    
	  		                    foreach($this->db->query("SELECT nama FROM data_kegiatan_pica")->result() as $r){
	  		                    
	  		                ?>
	  		                <option><?php echo $r->nama ?></option>
	  		                
	  		                <?php 
	  		                
	  		                    }
	  		                ?>
	  		            </select>
	  		        </td></tr>
                    <tr><th>Tempat</th><td><input autocomplete='off' type='text' name='tempat' class='form-control'></td></tr>
                    <tr><th>Tanggal</th><td><input autocomplete='off' type='date' name='tanggal' class='form-control'></td></tr>
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


