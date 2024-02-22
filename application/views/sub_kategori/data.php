<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">sub_kategori</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('sub_kategori/add') ?>" class="AppButton-primary"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			    
	  			<th>No</th>
	  				<th>Foto</th>
	  			<th>Nama Kategori</th>
	  				<th>Foto</th>
	  			<th>Nama Sub Kategori</th>
             
                	  			
	  		
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($sub_kategori->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  					<td><img src="<?php echo $row->foto_kategori ?>" width="100"> </td>
		  					<td><?php echo $row->nama_kategori ?></td>
		  					<td><img src="<?php echo $row->foto ?>" width="100"> </td>
		  				<td><?php echo $row->nama_sub_kategori ?></td>
		  				
		  				
	
	
		  				
		  				
		  				<td>
		  					<a href="<?php echo site_url('sub_kategori/detail/'.$row->id) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('sub_kategori/edit/'.$row->id) ?>" class="AppButton-secondary"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('sub_kategori/delete/'.$row->id.'/'.$row->foto) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>	



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



