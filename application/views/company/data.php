<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">company</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <!-- <a href="<?php echo site_url('company/add') ?>" class="AppButton-primary"><i class="flaticon-add"></i> Tambah</a> -->
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Logo</th>
	  			<th>Nama</th>
	  			<th>Alamat</th>
	  			<th>Telepon</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($company->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  					<td><img src="<?php echo $row->foto ?>" width="100"> </td>
		  				<td><?php echo $row->nama ?></td>
		  				<td><?php echo $row->alamat ?></td>
		  				<td><?php echo $row->tlp ?></td>
		  				
		  			
	
	
		  				
		  				
		  				<td>
		  					<a href="<?php echo site_url('company/detail/'.$row->id) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('company/edit/'.$row->id) ?>" class="AppButton-secondary"><i class="flaticon-edit"></i></a>
<!-- 
		  					<a href="<?php echo site_url('company/delete/'.$row->id.'/'.$row->foto) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>	 -->
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



