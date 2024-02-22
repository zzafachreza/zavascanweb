<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">pica</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn" style="background-color:#F98D1B;color:#FFF"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('pica/add') ?>"class="btn" style="background-color:#6B63FF;color:#FFF"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr style="background-color:#6B63FF;color:#FFF">
	  			<th>No</th>
	  			
	  		<th>Kegiatan</th>
            <th>Tempat</th>
            <th>Tanggal</th>
	  			
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($pica->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				
		  			<td><?php echo $row->kegiatan ?></td>
                    <td><?php echo $row->tempat ?></td>
                    <td><?php echo Indonesia3Tgl($row->tanggal) ?></td>
	
	
		  				
		  				
		  				<td>
		  					<a href="<?php echo site_url('pica/detail/'.$row->id) ?>"class="btn" style="background-color:#6B63FF;color:#FFF"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('pica/edit/'.$row->id) ?>" class="btn" style="background-color:#F98D1B;color:#FFF"><i class="flaticon-edit"></i></a>

		  				
		  					
		  					<a href="<?php echo site_url('pica/report/'.$row->id) ?>" class="btn btn-success"><i class="flaticon-graph"></i> Activity Report</a>
		  					
		  						<a href="<?php echo site_url('pica/delete/'.$row->id) ?>" class="btn" style="background-color:red;color:#FFF"><i class="flaticon-delete"></i></a>


		  				

		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>





