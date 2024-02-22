    <?php 
            
   
            $id_pica = $pica['id'];
            $kegiatan = $pica['kegiatan'];
            $tempat= $pica['tempat'];
            $tanggal = $pica['tanggal'];
            
            $bulan = IndonesiaBulan($tanggal);
            
            $tahun = IndonesiaTahun($tanggal);
            
            $jmlPIORITAS = $this->db->query("SELECT count(id) jml FROM data_picadetail WHERE id_pica='$id_pica'")->result();
            
            $jmlStatusDone = $this->db->query("SELECT count(id) jml FROM data_picadetail WHERE id_pica='$id_pica' AND status='DONE'")->result();
            
            
              $jmlStatusYet = $this->db->query("SELECT count(id) jml FROM data_picadetail WHERE id_pica='$id_pica' AND status='OUTSTANDING'")->result();
              
              $jmlPI = $this->db->query("SELECT count(id) jml FROM data_picadetail WHERE id_pica='$id_pica' AND masalah !=''")->result();
              
              
              $jmlCA = $this->db->query("SELECT count(id) jml FROM data_picadetail WHERE id_pica='$id_pica' AND perbaikan !=''")->result();
              
              $totalPencapaian=((100/$jmlPIORITAS[0]->jml)*$jmlStatusDone[0]->jml)*(100/100);
            
            ?>
<div class="container-fluid">
    <div class="card">
    	  <div class="card-header row text-center">
    	     <div class="col col-sm-3" style="padding:1%;background-color:#F98D1B;color:#000;font-size:small">
            PEMPROV JABAR		
            </div>
             <div class="col col-sm-6" style="padding:1%;background-color:#6B63FF;color:#FFF;font-size:small">
                ACTIVITY REPORT <?php echo strtoupper($kegiatan." ".$bulan." ".$tahun) ?>
            </div>
             <div class="col col-sm-3" style="padding:1%;background-color:#F98D1B;color:#000;font-size:small">
                DISPARBUD		
            </div>			
                
        

    	  </div>
    	  	<div class="card-body row">
    	  	    
    	  	       <div class="col col-sm-3"></div>
                    <div class="col col-sm-6">
                         <canvas id="myChart"></canvas>
                    </div>
                    <div class="col col-sm-3"></div>
    	  	</div>
    	  <div class="card-footer">
    	      <iv class="col col-sm-12">
            <table border="1" width="100%" style="text-align:center;font-size:small;border:1px solid black;border-collapse: collapse;font-weight:bold">
                <tr style="background-color:#F98D1B">
                     <td style="vertical-align : middle;text-align:center;background-color:#000;color:#FFF" rowspan="2" colspan="3">KPI KEGIATAN</td>
                     <td style="vertical-align : middle;text-align:center;" colspan="2">FORUM GROUP DISCUSSION</td>
                     <td style="vertical-align : middle;text-align:center;" rowspan="2">Evaluasi</td>
                     <td style="vertical-align : middle;text-align:center;" rowspan="2">Key Issues</td>
                     <td style="vertical-align : middle;text-align:center;" rowspan="2">Corrective Action</td>
                     <td style="vertical-align : middle;text-align:center;" rowspan="2">Due Date</td>
                </tr>
                <tr>
                   <td width="5%" style="vertical-align : middle;text-align:center;background-color:#F98D1B;color:#000">Done</td>
                   <td width="5%" style="vertical-align : middle;text-align:center;background-color:#F98D1B;color:#000">Not Yet</td>
                </tr>
                 <tr>
                   <td rowspan="5" colspan="2" style="vertical-align : middle;text-align:center;">PROGRES REPORT</td>
                   <td >PRIORITAS</td>
                   <td colspan="2" style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlPIORITAS[0]->jml ?>
                     </td>
                   <td rowspan="5">
                       <!--simbol-->
                       
                       <?php
                        
                        if($totalPencapaian >= 0 && $totalPencapaian < 50 ){
                            $sys='err';
                        }elseif($totalPencapaian >= 50 && $totalPencapaian < 100){
                            $sys='war';
                        }elseif($totalPencapaian == 100){
                            $sys='done';
                        }
                        
                       ?>
                         <img src="<?php echo site_url() ?>assets/images/<?php echo $sys ?>.png" width="35"/>
                   </td>
                   <td rowspan="5"></td>
                   <td rowspan="5"></td>
                   <td rowspan="5"></td>
                </tr>
                <tr>
       
                   <td>Status</td>
                       <td style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlStatusDone[0]->jml ?>
                     </td>
                        <td style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlStatusYet[0]->jml ?>
                     </td>
                </tr>
                
                <tr>
       
                   <td>PI</td>
                      <td style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlPI[0]->jml ?>
                     </td>
                        <td style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlPI[0]->jml ?>
                     </td>
                </tr>
                
                <tr>
       
                   <td>CA</td>
                       <td style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlCA[0]->jml ?>
                     </td>
                        <td style="vertical-align : middle;text-align:center;">
                       <?php echo $jmlCA[0]->jml ?>
                     </td>
                </tr>
                
                <tr>
       
                   <td>%</td>
                     <td>
                         
                         <?php
                         
                         echo $totalPencapaian;
                            
                         ?>
                     </td>
                     <td>
                         <?php
                         
                         echo $totalYet = ((100/$jmlPIORITAS[0]->jml)*$jmlStatusYet[0]->jml)*(100/100);
                            
                         ?>
                     </td>
              
                </tr>
                
                
                

                
            </table>
            
            <hr/>
            <div>
                <table border="1" width="50%" cellpadding="10" style="float:right;color:#000;text-align:;font-size:small;border:1px solid black;border-collapse: collapse;font-weight:">
                    <tr >
                        <td style="background-color:#6B63FF;color:#FFF">Keterangan</td>
                        <td style="background-color:#6B63FF;color:#FFF">Simbol</td>
                        <td rowspan="4" width="50%">
                            note: 
<p>bila target tercapai, apa yang menjadi kunci keberhasilannya dan apa langkah selanjutnya</p>
<br/>
<p>bila target tidak tercapai, apa yang menjadi kendala/penyebab dan apa langkah perbaikannya</p>

                        </td>
                    </tr>
                      <tr>
                        <td>Pencapaian < 50%</td>
                        <td>
                            <img src="<?php echo site_url() ?>assets/images/err.png" width="35"/>
                        </td>
                    </tr>
                     <tr>
                        <td>Pencapaian < 100%</td>
                        <td> <img src="<?php echo site_url() ?>assets/images/war.png" width="35"/></td>
                    </tr>
                     <tr>
                        <td>Pencapaian 100%</td>
                        <td> <img src="<?php echo site_url() ?>assets/images/done.png" width="35"/></td>
                    </tr>
                    
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
                
                'DONE',
                'NOT YET',

                
            ],
        datasets: [{
            label: 'Percentage Progress Kegiatan',
            data: [
                    <?php echo $totalPencapaian ?>, <?php echo $totalYet ?>,
   
                ],
            backgroundColor: [
                '#1abc9c',
                '#d35400',
     
            ],
            
        }]
    },
    options: {
       legend: {
            fontColor: "white"
        },
        scales: { 
            yAxes: [{
                ticks: {
                    fontColor: "white",
                    stepSize: 1,
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>