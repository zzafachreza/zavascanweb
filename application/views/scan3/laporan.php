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
	   
	   $sql="SELECT ekspedisi,nama,barcode.tanggal,jam,barcode.id id,nama_lengkap,status_barcode FROM barcode join member ON member.id = barcode.id_member  WHERE id_member='$id_member' AND barcode.tanggal between '$awal' AND '$akhir' ORDER BY barcode.id ASC";
    
    ?>
    
 <center>
        <form action="laporan/excel" method="POST">
        <input value="<?php echo $sql ?>" name="sql" type="hidden"/>
        <button type="submit" class="btn btn-success" ><i class="flaticon-download"></i> Export To Excel</button>
    </form>
 </center>
    
    <table class="table table-bordered table-striped table-hover tabza2">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Ekspedisia</th>
	  	
                <th>Barcode</th>
	  			<th>Tanggal</th>
	  			<th>Notes</th>
	  			<th>RIT</th>
	  			<th>Status</th>
	  			<th></th>

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
		  		
		  				<td><?php echo $row->ekspedisi ?></td>
		  				<td><?php echo $row->nama ?></td>
		  				<td><?php echo Indonesia3Tgl($row->tanggal)  ?> Jam <?php echo $row->jam ?></td>
		  				<td><?php echo $row->nama_lengkap ?></td>
		  					<td>
		  				
		  				    
		  				    <?php 
		  				    
		  				        $jam = (int)substr($row->jam,0,2); 
		  				        
		  				        if($jam >=13 && $jam <= 16){
		  				            echo "RIT 1";
		  				        }else if($jam >=18 && $jam <= 21){
		  				            echo "RIT 2";
		  				        }else if($jam >=22 && $jam <= 24){
		  				            echo "RIT 3";
		  				        }else{
		  				            echo "-";
		  				        }
		  				    
		  				    
		  				    ?>
		  				
		  				</td>
		  					<td><?php echo $row->status_barcode=="OUT"?"SUDAH SERAH TERIMA":"" ?></td>
		  					<td>
		  	

		  		

		  					<a href="<?php echo site_url().'laporan/hapus/'.$row->id.'/'.$awal.'/'.$akhir ?>" class="btn btn-danger text-white"><i class="flaticon-delete"></i></a>	


		  				</td>

		  
	
		  				
		  	
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