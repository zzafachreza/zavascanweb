
<style>
    @media print {
       .print {
           display:none;
       }
 }
</style>
<nav aria-label="breadcrumb" class="print">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">redeem</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card">
	  <div class="card-header print" >
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	  	<a href="#" onClick="window.print()" class="btn btn-success"> <i class="flaticon2-print"></i> Print</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Kode</th>
	  			<th>Tanggal</th>
	  			<th>Customer</th>
	  			<th>Jumlah</th>
	  			<th>Hadiah</th>
	  			<th>Point</th>
	  			<th>Status</th>
	  			<th class="print">action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				$grand =0;
	  				foreach($redeem->result() as $row):
	  				$no++;
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
                        <td><?php echo $row->kode ?></td>
		  				<td><?php echo Indonesia3Tgl($row->tanggal) ?></td>
		  			<td><?php echo $row->nama_lengkap ?><br/><?php echo $row->email ?><br/><?php echo $row->tlp ?></td>
		  				<td><?php echo number_format($row->jumlah) ?></td>
		  				<td><?php echo $row->nama_hadiah?></td>
		  				<td><?php echo number_format($row->point) ?></td>
		  				<td><?php echo $row->status ?></td>
		  				<td class="print">
		  					<!--<a href="<?php echo site_url('redeem/detail/'.$row->id) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>-->
		  					<a href="<?php echo site_url('redeem/delete/'.$row->kode.'/'.$row->token.'/'.$row->tanggal.'/'.$row->id_member) ?>" class="AppButton-dark"><i class="flaticon-delete"></i> Tolak Redeem</a>
		  					<?php if($row->status=="SEDANG DIPROSES"){
		  					    
		  					    ?>
		  					    <a href="<?php echo site_url('redeem/done/'.$row->kode.'/'.$row->token.'/'.$row->tanggal.'/'.$row->id_member.'/'.$row->point) ?>" class="btn btn-success"><i class="flaticon2-check-mark"></i> Terima Redeem</a>
		  					    
		  					    <?php
		  					}
		  					
		  					?>
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



