<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">kurir</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">

	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			    
	  			<th>No</th>
	  			<th>Tanggal & Jam</th>
                <th>nama</th>
                <th>Deskripsi Aplikasi</th>
                <th>jenis App</th>
                <th>tujuan App</th>
                <th>Nama Kantor / Bidang Usaha</th>
                <th>Siapa yang pakai</th>
                <th>Upload Playstore</th>
                <th>Punya Hoting / Domain</th>
                <th>Deadline</th>
                <th>Ada Konsep / Alur</th>
                <th>Estimasi Budget</th>

	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM data_formulir")->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo Indonesia3Tgl($row->tanggal) ?> <?php echo substr($row->jam,0,5) ?></td>
		  			    <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->aplikasi ?></td>
                        <td><?php echo $row->jenis ?></td>
                        <td><?php echo $row->tujuan ?></td>
                        <td><?php echo $row->nama_usaha ?></td>
                        <td><?php echo $row->siapa ?></td>
                        <td><?php echo $row->playstore ?></td>
                        <td><?php echo $row->hosting ?></td>
                        <td><?php 
                        
                        $awal  = new DateTime($row->kapan);
                        $akhir = new DateTime(); // Waktu sekarang
                        $diff  = $awal->diff($akhir);
                        
                        echo Indonesia3Tgl($row->kapan) ?> <span class="badge badge-danger"><?php echo $diff->d ?> Hari dari sekarang</span></td>
                        <td><?php echo $row->konsep ?></td>
                        <td><?php echo $row->estimasi ?></td>
		  	    
	
	
		  				
		  				
		  			
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



