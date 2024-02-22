<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">content</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('content/add') ?>" class="AppButton-primary"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Menu</th>
	  			<th>Halaman</th>
	  			<th>Judul content</th>
	  			<th>Tipe</th>
	  			
	  			
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($content->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->nama_menu ?></td>
		  			
		  				<td><?php echo $row->nama_halaman ?></td>
		  					<td><?php echo $row->nama_content ?></td>
		  						<td><?php echo $row->tipe ?></td>
		  				
		  				
		  				<td>
		  						<a href="<?php echo site_url('../ckeditor/index.php?id='.$row->id) ?>" class="AppButton-secondary"><i class="flaticon-edit"></i> Edit Isi </a>	
		  						&nbsp;

		  					<a href="<?php echo site_url('content/detail/'.$row->id) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('content/edit/'.$row->id) ?>" class="AppButton-secondary"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('content/delete/'.$row->id) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>	

		  				

		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>


</div>



