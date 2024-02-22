<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">artikel</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('artikel/add') ?>" class="btn bg-utama"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  		
	  			<th>Foto</th>
	  				<th>judul</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT*FROM data_artikel")->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  			
		  				<td><img src="<?php echo site_url().$row->foto ?>" width="100"></td>
		  					<td><?php echo $row->judul ?></td>
	
	
		  				
		  				
		  				<td>
		  					<a href="<?php echo site_url('artikel/detail/'.$row->id_artikel) ?>" class="btn bg-utama"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('artikel/edit/'.$row->id_artikel) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('artikel/delete/'.$row->id_artikel) ?>" class="btn btn-danger"><i class="flaticon-delete"></i></a>	


		  				

		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>





