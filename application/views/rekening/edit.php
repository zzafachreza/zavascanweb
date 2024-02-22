<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('rekening') ?>">rekening</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('rekening/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('rekening') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<!--<img src="<?php echo site_url().$rekening['foto'] ?>" width="100">-->

			
			  <input type="hidden" name="foto_old" value="<?php echo $rekening['foto'] ?>">
			   <input type="hidden" name="id" value="<?php echo $rekening['id'] ?>">
		


			  <!-- <div class="form-group col col-sm-6">-->

			  <!--  <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>-->
			  <!--  <input autocomplete="off" type="file" name="foto" >-->
			  <!--</div>-->
			  
			   


			   <table class="table">
			        <tr><th>Kode Rekening</th><td><input autocomplete='off' type='text' name='kode' class='form-control' value='<?php echo $rekening['kode'] ?>'></td></tr>
			        <tr><th>Nama</th><td><input autocomplete='off' type='text' name='nama' class='form-control' value='<?php echo $rekening['nama'] ?>'></td></tr>
			        
			    <tr><th>Level</th><td>
			      <select class="form-control" name="level">
			          <option <?php echo $rekening['level']=="1"?'selected':'' ?>>1</option>
			          <option <?php echo $rekening['level']=="2"?'selected':'' ?>>2</option>
			          <option <?php echo $rekening['level']=="3"?'selected':'' ?>>3</option>
			          <option <?php echo $rekening['level']=="4"?'selected':'' ?>>4</option>
			          <option <?php echo $rekening['level']=="5"?'selected':'' ?>>5</option>
			          <option <?php echo $rekening['level']=="6"?'selected':'' ?>>6</option>
			      </select>
			   
			   </td></tr>
			   
			   
			      <tr>
			       <th>Induk</th><td>
			      <select class="form-control" name="induk">
			          
			          <?php
			          
			            
			            $sql="SELECT * FROM data_rekening where level=".($rekening['level']-1)."";
			            $hasil = $this->db->query($sql);
			            foreach($hasil->result() as $row){
			          
			          ?>
			          
			          <option <?php echo $rekening['induk']==$row->induk?'selected':'' ?> value="<?php echo $row->kode ?>"><?php echo $row->kode ?> -  <?php echo $row->nama ?> </option>
	    <?php } ?>
			      </select>
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



