<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('rekening') ?>">rekening</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('rekening/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('rekening') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    


			 <table class="table">
			   <tr><th>Kode Rekening</th><td><input autocomplete='off' type='text' name='kode' class='form-control'></td></tr>
			   <tr><th>Nama</th><td><input autocomplete='off' type='text' name='nama' class='form-control'></td></tr>
			   
			   <tr><th>Level</th><td>
			      <select class="form-control" name="level">
			          <option>1</option>
			          <option>2</option>
			          <option>3</option>
			          <option>4</option>
			          <option>5</option>
			          <option>6</option>
			      </select>
			   
			   </td></tr>
			   
			   <tr>
			       <th>Induk</th><td>
			      <select class="form-control" name="induk">
			          
			          <?php
			          
			            
			            $sql="SELECT * FROM data_rekening";
			            $hasil = $this->db->query($sql);
			            foreach($hasil->result() as $row){
			          
			          ?>
			          
			          <option value="<?php echo $row->kode ?>" ><?php echo $row->kode ?> -  <?php echo $row->nama ?> </option>
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



