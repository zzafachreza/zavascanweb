<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=report_".date('ymdhis').".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
error_reporting(0);

        $fid_member = $_SESSION['id'];
        

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
        <tr>
            <th rowspan="2" style="text-align:center;padding-top:2%;background:yellow" class="text-black">TOKO DI MARKETPLACE</th>
            <th colspan="<?php echo $this->db->query("SELECT ekspedisi FROM data_laporan WHERE fid_member='$fid_member' GROUP BY ekspedisi")->num_rows()?>" style="text-align:center;background:blue;color:white">Jumlah Resi Per Expedisi</th>
            <th rowspan="2" style="text-align:center;padding-top:2%;background:green;color:white">Total Paket</th>
        </tr>
        <tr>
            
            <?php
            
            foreach($this->db->query("SELECT ekspedisi FROM data_laporan WHERE fid_member='$fid_member' GROUP BY ekspedisi")->result() as $th ){ ?>
            <td style="text-align:center;background:darkblue;color:white"><?php echo $th->ekspedisi ?></td>

            <?php } ?>
        </tr>
        <?php
        
        
            
           

        $lap = "SELECT marketplace FROM data_laporan WHERE fid_member='$fid_member' GROUP BY marketplace";
        foreach($this->db->query($lap)->result() as $lp){
            
            $marketplace = $lp->marketplace;
            
             
    
            
     
                       
            
        ?>
            <tr>
                <td style="background:orange;color:black"><?php echo $marketplace ?></td>
                
                 <?php
            
                    foreach($this->db->query("SELECT ekspedisi FROM data_laporan WHERE fid_member='$fid_member' GROUP BY ekspedisi")->result() as $td ){ ?>
                    <td style="text-align:center"><?php echo $jml = $this->db->query("SELECT id_laporan FROM data_laporan WHERE fid_member='$fid_member' AND marketplace='$marketplace' AND ekspedisi='".$td->ekspedisi."'")->num_rows(); ?></td>
        
                    <?php   } ?>
                      
                     
                    <td style="text-align:center;background:darkblue;color:white"><?php echo $totalM = $this->db->query("SELECT id_laporan FROM data_laporan WHERE fid_member='$fid_member' AND marketplace='$marketplace'")->num_rows(); ?></td>
                                
            </tr>
        
        <?php } ?>
        <tr style="text-align:center">
            <td style="background:purple;color:white">Total Paket Per Ekspedisi</td>
 
                 <?php
            
                    foreach($this->db->query("SELECT ekspedisi FROM data_laporan WHERE fid_member='$fid_member' GROUP BY ekspedisi")->result() as $ft ){ ?>
                    <td style="text-align:center;background:purple;color:white"><?php echo $total = $this->db->query("SELECT id_laporan FROM data_laporan WHERE fid_member='$fid_member' AND ekspedisi='".$ft->ekspedisi."'")->num_rows(); ?></td>
        
                    <?php  } ?>
                    
                     <td style="text-align:center;background:purple;color:white"><?php echo $totalAll = $this->db->query("SELECT id_laporan FROM data_laporan WHERE fid_member='$fid_member'")->num_rows(); ?></td>
 
        </tr>
    </table>