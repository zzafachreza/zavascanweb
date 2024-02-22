<div class="container-fluid">
    <form method="POST">
        <input value="<?php echo $_SESSION['id'] ?>" name="id_member" type="hidden" />
        <div class="row" style="margin-top:1%">
    
      <div class="form-group col col-lg-5">
     			  
			    <input autocomplete="off" required="required" type="text" name="awal" class="tgl form-control" value="<?php echo date('d/m/Y') ?>">
			    <small class="form-text text-muted"><i class="flaticon2-calendar-9"></i> Dari Tanggal</small>
	
      </div>
        <div class="form-group col col-lg-5">
     
		
			    <input autocomplete="off" required="required" type="text" name="akhir" class="tgl form-control" value="<?php echo date('d/m/Y') ?>">
			    <small class="form-text text-muted" ><i class="flaticon2-calendar-9"></i> Sampai Tanggal</small>
	
      </div>
      <div class="col col-lg-2">
          <button type="submit" class="btn bg-utama col-sm-12"><i class="flaticon-pie-chart"></i> Prosess</button>
      </div>
      
    </div>
    </form>
    
    <hr/>
    <?php
        function tglSql($tgl){
	$tgl = explode("/", $tgl);
	return $tgl[2]."-".$tgl[1]."-".$tgl[0];
}


    if(!empty($_POST)){
        
    

	   $awal = tglSql($_POST['awal']);
	   $akhir = tglSql($_POST['akhir']);
	   $id_member = $_POST['id_member'];
	   
	   $sql="SELECT * FROM data_laporan WHERE fid_member='$id_member' AND tanggal between '$awal' AND '$akhir' ORDER BY id_laporan ASC";
    
    ?>
    
 <center>
        <form action="posting/excel" method="POST">
        <input value="<?php echo $sql ?>" name="sql" type="hidden"/>
        <button type="submit" class="btn btn-success" ><i class="flaticon-download"></i> Export To Excel</button>
    </form>
 </center>
    
    <table class="table table-bordered table-striped table-hover tabza2">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Nama Toko Di Marketplace</th>
	  		    <th>Nama Penerima</th>
	  		    <th>No. Pesanan/Invoice</th>
	  		    <th>Nama Barang</th>
	  		    <th>Jumlah</th>
	  		    <th>Nomor Resi</th>
	  			<th>Barcode Sudah Scan</th>
	  			<th>Ekspedisi</th>
	  			<th>Tanggal</th>
    	  		<th>Jam</th>
	  		

	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  		
		  			    
                        <td><?php echo $row->marketplace ?></td>
                        <td><?php echo $row->penerima ?></td>
                         <td><?php echo $row->nomor_pesanan ?></td>
                          <td><?php echo $row->nama_barang ?></td>
                           <td><?php echo $row->jumlah ?></td>
                        <td><?php echo $row->nomor_resi ?></td>
                        <td><?php echo $row->nomor_barcode ?></td>
                        <td><?php echo $row->ekspedisi ?></td>
                        <td><?php echo $row->tanggal ?></td>
                        <td><?php echo $row->jam ?></td>

		  
	
		  				
		  	
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>
    
    <?php 
    
    }
    
    ?>
    
</div>
<script>
    $('table').dataTable({searching: false, paging: false, info: false});
</script>