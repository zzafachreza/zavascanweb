<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('sub_kategori') ?>">sub_kategori</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('sub_kategori/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('sub_kategori') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

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
			     
			      <tr><th>Kategori</th><td>
			          
			         <select name="id_kategori" class="form-control selectza">
			             <?php 
			             
			             foreach($this->db->query("SELECT * FROM data_kategori")->result() as $r ){
			                 ?>
			             
			             <option value="<?php echo $r->id ?>"><?php echo $r->nama_kategori ?></option>
			            <?php } ?>
			         </select>
			      
			      
			      </td></tr>
			     
			   <tr><th>Nama sub_kategori</th><td><input autocomplete='off' type='text' name='nama_sub_kategori' class='form-control'></td></tr>
                     
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



