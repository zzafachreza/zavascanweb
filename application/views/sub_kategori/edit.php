<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('sub_kategori') ?>">sub_kategori</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('sub_kategori/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('sub_kategori') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$sub_kategori['foto'] ?>" width="100">

			
			  <input type="hidden" name="foto_old" value="<?php echo $sub_kategori['foto'] ?>">
			   <input type="hidden" name="id" value="<?php echo $sub_kategori['id'] ?>">
		


			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			   


			   <table class="table">
			       <tr>
			           <th>Kategori</th>
			           <td>
			                  <select name="id_kategori" class="form-control selectza">
    			             <?php 
    			             
    			             foreach($this->db->query("SELECT * FROM data_kategori")->result() as $r ){
    			                 ?>
    			             
    			             <option <?php echo $r->id == $sub_kategori['id_kategori']?'selected="selected"':'' ?> value="<?php echo $r->id ?>"><?php echo $r->nama_kategori ?></option>
    			            <?php } ?>
			         </select>
			           </td>
			       </tr>
			        <tr><th>Nama sub_kategori</th><td><input autocomplete='off' type='text' name='nama_sub_kategori' class='form-control' value='<?php echo $sub_kategori['nama_sub_kategori'] ?>'></td></tr>
			     </table>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



