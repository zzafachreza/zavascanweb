<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">kegiatan</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn" style="background-color:#F98D1B;color:#FFF"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('kegiatan/add') ?>" class="btn" style="background-color:#6B63FF;color:#FFF"><i class="flaticon-add"></i> Tambah</a>
	    <!--<a href="<?php echo site_url('kegiatan/timeline') ?>" class="btn btn-success" ><i class="flaticon-notes"></i> TIMELINE PROGRESS</a>-->
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr style="background-color:#6B63FF;color:#FFF">
	  			    
	  			<th>No</th>
	  			
	  			<th>Bidang</th>
	  			<th>Nama Kegiatan</th>
	  			<th>Anggaran</th>
             
                	  			
	  			<th>Evidence</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($kegiatan->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->nama_bidang ?></td>
		  				<td><?php echo $row->nama ?></td>
		  				<td><?php echo number_format($row->anggaran) ?></td>
		  				
		  				<td>
		  				    <a href="<?php echo $row->foto ?>">Lihat Detail</a>
		  				</td>
	
	
		  				
		  				
		  				<td>
		  					<!--<a href="<?php echo site_url('kegiatan/detail/'.$row->id) ?>" class="btn" style="background-color:#6B63FF;color:#FFF" ><i class="flaticon-eye"></i></a>-->

		  					<a href="<?php echo site_url('kegiatan/edit/'.$row->id) ?>" class="btn" style="background-color:#F98D1B;color:#FFF" ><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('kegiatan/delete/'.$row->id.'/'.$row->foto) ?>" class="btn" style="background-color:red;color:#FFF" ><i class="flaticon-delete"></i></a>	



		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>

<p id="p1"></p>

</div>

<script type="text/javascript">

	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).text()).select();
	  document.execCommand("copy");
	  $temp.remove();
	}


	$(".alink").click(function(e){
		e.preventDefault();
		var link = $(this).attr('data-id');
		$("#p1").text(link);
		copyToClipboard("#p1");
		$(this).removeClass('btn-success');
		$(this).addClass('btn-secondary');

		$(this).text('Copied');
	})
</script>



