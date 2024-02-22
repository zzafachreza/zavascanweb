<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".date('ymdhis').".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
error_reporting(0);




          $this->load->library('session');
          
        function tglSql($tgl){
    $ex = explode("/",$tgl);
    return $ex[2].'-'.$ex[1].'-'.$ex[0];
    
}

$id_member = $_SESSION['id'];
                                    
                                    
                                     
                                    if(!empty($_GET)){
                                        $status = $_GET['status'];
                                        $awal = tglSql($_GET['awal']);
                                        $akhir = tglSql($_GET['akhir']);
                                        $ekspedisi = $_GET['ekspedisi'];
                                        if($status !=='all'){
                                                
                                            if($status==0){
                                                $tipe='scan';
                                            }elseif($status==1){
                                                $tipe='packing';
                                            }elseif($status==2){
                                                $tipe='ekspedisi';
                                            }elseif($status==3){
                                                $tipe='retur';
                                            }
                                            
                                            if($ekspedisi =='all'){
                                                 $sql="SELECT * FROM barcode_$id_member WHERE status='$status' AND tanggal_$tipe BETWEEN '$awal' AND '$akhir'";
                                            }else{
                                                 
                                                 $sql="SELECT * FROM barcode_$id_member WHERE status='$status' AND ekspedisi='$ekspedisi' AND tanggal_$tipe BETWEEN '$awal' AND '$akhir'";
                                            }
                                            
                                           
                                        }else{
                                            
                                             if($ekspedisi =='all'){
                                                  $sql="SELECT * FROM barcode_$id_member WHERE tanggal_scan BETWEEN '$awal' AND '$akhir'";
                                            }else{
                                                 
                                                 $sql="SELECT * FROM barcode_$id_member WHERE ekspedisi='$ekspedisi' AND tanggal_scan BETWEEN '$awal' AND '$akhir'";
                                            }
                                            
                                            
                                          
                                        }
                                    }else{
                                        $sql="SELECT * FROM barcode_$id_member limit 0";
                                    }



?>
<style type="text/css">
  
.num {
  mso-number-format:General;
}
.text{
  mso-number-format:"\@";/*force text*/
}
</style>

 <table style="border-collapse: collapse;" cellspacing="0" width="100%" border="1">
	  		<thead>
	  				<tr>
                                        	    
                                	  			<th>Courir</th>
                                	  			<th>Waybill</th>
                                                <th>Tanggal Scan</th>
                                                <th>Scanned By</th>
                                	            <th>Tanggal Packing</th>
                                	            <th>Packing By</th>
                                	            <th>Tanggal Ekspedisi</th>
                                	            <th>Ekspedisi By</th>
                                	            <th>Tanggal Retur</th>
                                	            <th>Retur By</th>
                                	            
                                	            <th width="10%">Status</th>
                                	          
                                             </tr>
	  		</thead>
	  		<tbody>
	  		 <?php
                                    
                                  
                                    
                                    foreach($this->db->query($sql)->result() as $r){
                                        
                                        if($r->status==0){
                                        $warna='#58A55D';
                                        $status='Scan Resi';
                                    }elseif($r->status==1){
                                        $warna='#F2BF41';
                                        $status='Scan Packing';
                                    }elseif($r->status==2){
                                        $warna='#D85040';
                                        $status='Scan Ekspedisi';
                                    }elseif($r->status==3){
                                        $warna='#85A8F1';
                                        $status='Scan Retur';
                                        
                                    }
                                    
                                    $showstatus = $status;
                                    
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $r->ekspedisi ?></td>
                                        <td class="text"><?php echo $r->nama ?></td>
                                        <td><?php echo $r->tanggal_scan ?></td>
                                        <td><?php echo $r->by_scan ?></td>
                                         <td><?php echo $r->tanggal_packing ?></td>
                                          <td><?php echo $r->by_packing ?></td>
                                         <td><?php echo $r->tanggal_ekspedisi ?></td>
                                          <td><?php echo $r->by_ekspedisi ?></td>
                                         <td><?php echo $r->tanggal_retur ?></td>
                                          <td><?php echo $r->by_retur ?></td>
                                        
                                         <td><?php echo $showstatus?></td>
                                       
                                    </tr>
                                    
                                    <?php } ?>
	  		</tbody>
	  	</table>