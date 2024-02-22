<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">barang</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('barang/add') ?>" class="AppButton-primary"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			    
	  			<th>No</th>
	  			
	  			
	  			<th>Nama barang</th>
                <th>Uom</th>
                <th>HPP / Harga Dasar</th>
                <th>Harga Awal</th>
                <th>Diskon</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Kategori</th>
             
                	  			
	  			<th>Foto</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($barang->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->nama_barang ?></td>
                        <td><?php echo $row->uom ?></td>
                         <td><?php echo number_format($row->hpp) ?></td>
                        <td><?php echo number_format($row->harga_awal) ?></td>
                        <td><?php echo number_format($row->diskon)?></td>
                        <td><?php echo number_format($row->harga) ?></td>
                        <td><?php echo $row->keterangan ?></td>
                        <td><?php echo $row->nama_kategori.' / '. $row->nama_sub_kategori ?></td>
		  				<td><img src="<?php echo $row->foto ?>" width="100"> </td>
	
	
		  				
		  				
		  				<td>
		  					<a href="<?php echo site_url('barang/detail/'.$row->id) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>

		  					<a href="<?php echo site_url('barang/edit/'.$row->id) ?>" class="AppButton-secondary"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('barang/delete/'.$row->id.'/'.$row->foto) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>	


		  					<a style="color: white" data-id="<?php echo site_url($row->foto) ?>" class="alink btn btn-success">
		  						Copy Link
		  					</a>	


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



