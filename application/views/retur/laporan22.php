<div class="container-fluid">
    <form method="POST">
        <input value="<?php echo $_SESSION['id'] ?>" name="id_member" type="hidden" />
        <div class="row" style="margin-top:1%">
            
             <div class="form-group col col-lg-3">
     
		
			    <select class="form-control" name="ekspedisi">
			        <option>SEMUA</option>
			        <?php
			            
			            foreach($this->db->query("SELECT nama_kurir FROM data_kurir GROUP BY nama_kurir")->result() as $r){
			        
			        ?>
			        <option <?php echo isset($_POST['ekspedisi']) && $_POST['ekspedisi']==$r->nama_kurir ?'selected':'' ?> ><?php echo $r->nama_kurir ?></option>
			        
			        <?php 
			        
			        
			        }
			        
			        ?>
			        
			    </select>
			    <small class="form-text text-muted" ><i class="flaticon-truck"></i> Ekspedisi</small>
	
      </div>
      <div class="form-group col col-lg-2">
     
		
			    <select class="form-control" name="status_barcode">
			        <option>SEMUA</option>
			          <option>SUDAH SERAH TERIMA</option>
			 
			    </select>
			    <small class="form-text text-muted" ><i class="flaticon-interface-3"></i> Status</small>
	
      </div>
    
      <div class="form-group col col-lg-2">
     			  
			    <input autocomplete="off" required="required" type="text" name="awal" class="tgl form-control" value="<?php echo isset($_POST['awal'])?$_POST['awal']:date('d/m/Y') ?>">
			    <small class="form-text text-muted"><i class="flaticon2-calendar-9"></i> Dari Tanggal</small>
	
      </div>
        <div class="form-group col col-lg-2">
     
		
			    <input autocomplete="off" required="required" type="text" name="akhir" class="tgl form-control" value="<?php echo isset($_POST['akhir'])?$_POST['akhir']:date('d/m/Y') ?>">
			    <small class="form-text text-muted" ><i class="flaticon2-calendar-9"></i> Sampai Tanggal</small>
	
      </div>
      <div class="col col-lg-3">
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
	   $ekspedisi = $_POST['ekspedisi'];
	   $status_barcode = $_POST['status_barcode'];
	   
	   if($ekspedisi=="SEMUA"){
	       
	        if($status_barcode=="SEMUA"){
	            $sql="SELECT ekspedisi,nama,barcode3.tanggal,jam,barcode3.id id,nama_lengkap,status_barcode FROM barcode3 join member ON member.id = barcode3.id_member  WHERE id_member='$id_member' AND barcode3.tanggal between '$awal' AND '$akhir' ORDER BY barcode3.id ASC";     
	        }else{
	            $sql="SELECT ekspedisi,nama,barcode3.tanggal,jam,barcode3.id id,nama_lengkap,status_barcode FROM barcode3 join member ON member.id = barcode3.id_member  WHERE id_member='$id_member' AND barcode3.tanggal between '$awal' AND '$akhir' AND status_barcode='OUT' ORDER BY barcode3.id ASC";
	        }
	       
 
	   }else{
	       
	        if($status_barcode=="SEMUA"){
	            $sql="SELECT ekspedisi,nama,barcode3.tanggal,jam,barcode3.id id,nama_lengkap,status_barcode FROM barcode3 join member ON member.id = barcode3.id_member  WHERE id_member='$id_member' AND barcode3.ekspedisi='$ekspedisi' AND barcode3.tanggal between '$awal' AND '$akhir' ORDER BY barcode3.id ASC";
	        }else{
	            $sql="SELECT ekspedisi,nama,barcode3.tanggal,jam,barcode3.id id,nama_lengkap,status_barcode FROM barcode3 join member ON member.id = barcode3.id_member  WHERE id_member='$id_member' AND barcode3.ekspedisi='$ekspedisi' AND barcode3.tanggal between '$awal' AND '$akhir' AND status_barcode='OUT' ORDER BY barcode3.id ASC";
	        }
	       
 
	   }
	   
	   
	   
	   
	          
        
        
        
        $jml = $this->db->query($sql)->num_rows();
    ?>
    
 <center>
        <form action="laporan/excel" method="POST">
        <input value="<?php echo $sql ?>" name="sql" type="hidden"/>
        <button type="submit" class="btn btn-success" ><i class="flaticon-download"></i> Export To Excel</button>
    </form>
    
<?php 
    if(!empty($_POST)){
        
    
?>

<a href="<?php echo site_url('laporan3') ?>/delete_all/<?php echo $awal ?>/<?php  echo $akhir ?>" onclick="return confirm('Apakah Anda yakin akan hapus resi dari tanggal <?php echo $_POST['awal'] ?> sampai <?php echo $_POST['akhir'] ?> ?')" class="btn btn-danger" style="margin-top:1%" href="">Hapus Resi dari Tanggal <?php echo $_POST['awal'] ?> sampai <?php echo $_POST['akhir'] ?> </a>
    
    
    <?php } ?>
 </center>
    Total Data Yang Scan : <strong><?php echo $jml ?></strong>
    <table class="table table-bordered table-striped table-hover tabza2">
	  		<thead>
	  			<tr class="bg-danger text-white">
	  			<th>No</th>
	  			<th>Ekspedisi</th>
	  	
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
		  	

		  		

		  					<a href="<?php echo site_url().'laporan3/hapus/'.$row->id.'/'.$awal.'/'.$akhir ?>" class="btn btn-danger text-white"><i class="flaticon-delete"></i></a>	


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
    $('table').dataTable({searching: true, paging: false, info: false});
</script>