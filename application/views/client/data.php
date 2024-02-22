<div class="container-fluid">
   
 <div class="bg-white row" style="margin-top:2%;margin-bottom:2%">
     <div class="col col-sm-6">
         <a href="<?php echo site_url() ?>" class="btn bg-white text-black col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Back</a>
     </div>
 
      <div class="col col-sm-6">
         <a href="<?php echo site_url($modul.'/add') ?>" class="btn bg-utama col col-sm-12"><i class="flaticon-add"></i> Add</a>
     </div>
 </div>
 

	  	<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead class="bg-utama" style="color:white">
	  			<tr>
    	  			<th>No</th>
    	  			<th>Logo</th>
    	  			<th>Nama</th>
    	  			<th>Telepon</th>
    	  			<th>Tanggal Daftar</th>
    	  			<th>Nama Aplikasi</th>
    	  			<th>Deadline</th>
    	  			<th>Harga Project</th>
    	  			<th>Status</th>
    	  			<th>Action</th>
    	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM data_$modul ORDER BY id_$modul*1 DESC")->result() as $row):
	  				$no++;
	  				
	  					if($row->status_client=='DEAL'){
                	    $warna = 'success';
                	}elseif($row->status_client=='PROSPEK'){
                	    $warna = 'primary';
                	}elseif($row->status_client=='BATAL'){
                	    $warna = 'danger';
                	}
                	
	
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  					<td><img src="<?php echo $row->{'foto_' . $modul} ?>" width="50" /></td>
		  					<td><?php echo $row->nama_client ?></td>
		  					<td><?php echo $row->telepon_client ?></td>
		  					<td><?php echo Indonesia3Tgl($row->tanggal_daftar) ?></td>
		  					<td><?php echo $row->nama_aplikasi ?></td>
		  					<td><?php echo Indonesia3Tgl($row->deadline) ?></td>
		  					<td><?php echo number_format($row->harga_client) ?></td>
		  					<td><span class="badge badge-<?php echo $warna ?>"><?php echo $row->status_client ?></span></td>
		  						
		 
		  			
		  				<td>
		  				    	<a style="color: white" data-id="<?php echo site_url($modul.'/tracking/'.$row->{'id_' . $modul}) ?>" class="alink btn btn-secondary">
		  						<i class="flaticon2-copy"></i> Copy Link
		  					</a>	
		  				    <!--<a href="<?php echo site_url($modul.'/tracking_update/'.$row->{'id_' . $modul}) ?>" class="btn btn-secondary text-white"><i class="flaticon2-correct"></i> Buat Tracking</a>-->
		  				    
		  				    
		  				    <a href="<?php echo site_url($modul.'/tracking/'.$row->{'id_' . $modul}) ?>" class="btn bg-success text-white"><i class="flaticon-search"></i> Track</a>
		  				<a href="<?php echo site_url($modul.'/detail/'.$row->{'id_' . $modul}) ?>" class="btn bg-utama"><i class="flaticon-eye"></i></a>
		  					<a href="<?php echo site_url($modul.'/edit/'.$row->{'id_' . $modul}) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url($modul.'/delete/'.$row->{'id_' . $modul}) ?>" class="btn bg-danger text-white"><i class="flaticon-delete"></i></a>	


		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>


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
	
	$(document).ready(function() {
    $('.tabza2').DataTable( {
        "scrollX": true
    } );
} );
</script>



