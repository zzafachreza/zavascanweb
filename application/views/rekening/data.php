<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">rekening</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('rekening/add') ?>" class="btn bg-utama"><i class="flaticon-add"></i> Tambah</a>
	    <!--<a href="<?php echo site_url('rekening/timeline') ?>" class="btn btn-success" ><i class="flaticon-notes"></i> TIMELINE PROGRESS</a>-->
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr class="bg-utama" style="color:#FFF;font-size:small">
	  			    
	  			<th width="5%">No</th>
	  			<th width="15%">Kode Rekening</th>
	  			<th width="40%">Kegiatan</th>
	  			<th width="5%">Level</th>
	  			<th>Induk</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  	
	  				foreach($rekening->result() as $row):
	  				$no++;
	  				
	  			
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->kode ?></td>
		  				<td><?php echo $row->nama ?></td>
		  				<td><?php echo $row->level ?></td>
		  				<td><?php echo $row->induk ?></td>
		  			
		  				
		  			
	
		  				
		  				
		  				<td>
		  				
		  					<a href="<?php echo site_url('rekening/edit/'.$row->id) ?>" class="btn bg-kedua" ><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('rekening/delete/'.$row->id.'/'.$row->foto) ?>" class="btn" style="background-color:red;color:#FFF" ><i class="flaticon-delete"></i></a>	



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



