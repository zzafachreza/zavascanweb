<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">slider</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('slider/add') ?>" class="btn bg-utama"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead class="bg-kedua" style="color:black">
	  			<tr>
    	  			<th>No</th>
    	  			<th>keterangan</th>
    	  			<th>Foto</th>
    	  			<th>Action</th>
    	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($slider->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->keterangan1 ?></td>
		  				<td><img src="<?php echo $row->foto ?>" width="100"> </td>
		  				<td>
		  					<a href="<?php echo site_url('slider/detail/'.$row->id) ?>" class="btn bg-utama"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('slider/edit/'.$row->id) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('slider/delete/'.$row->id.'/'.$row->foto) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


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



