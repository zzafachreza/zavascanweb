<?php

	$sql ="SELECT data_rencana.id,komponen,satuan,koefisien,harga,pajak,total, data_rekening.nama as nama_rekening,id_rekening ,data_rencana.id_kegiatan,data_kegiatan_pica.nama as nama_kegiatan,data_kegiatan_pica.anggaran as anggaran_kegiatan,data_kegiatan_pica.foto,data_bidang.nama as nama_bidang,id_bidang,data_bidang.anggaran as anggaran_bidang FROM data_rencana JOIN data_kegiatan_pica on data_rencana.id_kegiatan = data_kegiatan_pica.id join data_bidang on data_bidang.id = data_kegiatan_pica.id_bidang join data_rekening on data_rekening.id = data_rencana.id_rekening GROUP BY data_kegiatan_pica.nama";
	

	
	
	
	?>
<div class="container">
      <table border="1" width="100%" cellpadding="10" style="font-size:small;border:1px solid black;border-collapse: collapse;font-weight:bold">
                <!--<tr style="background-color:#F98D1B">-->
                <!--</tr>-->
                <?php
                
                foreach($this->db->query($sql)->result() as $row){
                
                ?>
                <tr>
                    <td colspan="6"><h5>[#] <?php echo $row->nama_kegiatan ?></h5></td>
                </tr>
                  <tr>
                    <td>PAGU ANGGARAN (<?php echo $row->nama_bidang ?>) </td>
                    <td colspan="3" rowspan="2"></td>
                    <td colspan="2" rowspan="2">
                       <h3> <?php echo number_format($row->anggaran_bidang) ?></h3>
                    </td>
                </tr>
                  <tr>
                    <td>C+ (C Plus)</td>
                    
                </tr>
                
                <tr>
                    <th>KOMPONEN</th>
                    <th>SATUAN</th>
                    <th>KOEFISIEN</th>
                    <th>HARGA</th>
                    <th>PAJAK</th>
                    <th>TOTAL</th>
                </tr>
                
                <?php
                $id_kegiatan = $row->id_kegiatan;
                	$sql2 ="SELECT data_rencana.id,komponen,satuan,koefisien,harga,pajak,total, data_rekening.nama as nama_rekening,id_rekening ,data_rencana.id_kegiatan,data_kegiatan_pica.nama as nama_kegiatan,data_kegiatan_pica.anggaran as anggaran_kegiatan,data_kegiatan_pica.foto,data_bidang.nama as nama_bidang,id_bidang,data_bidang.anggaran as anggaran_bidang FROM data_rencana JOIN data_kegiatan_pica on data_rencana.id_kegiatan = data_kegiatan_pica.id join data_bidang on data_bidang.id = data_kegiatan_pica.id_bidang join data_rekening on data_rekening.id = data_rencana.id_rekening WHERE data_rencana.id_kegiatan='$id_kegiatan' GROUP BY data_rencana.id_rekening";
                    foreach($this->db->query($sql2)->result() as $r ){
                ?>
                      <tr>
                        <td colspan="6"><?php echo $row->nama_rekening ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $r->komponen ?></td>
                        <td><?php echo $r->satuan ?></td>
                        <td><?php echo $r->koefisien ?></td>
                        <td><?php echo number_format($r->harga) ?></td>
                        <td><?php echo number_format($r->pajak) ?></td>
                        <td><?php echo number_format($r->total) ?></td>
                    </tr>
                
                <?php
                }
                ?>
                
                <?php 
                }
                
                ?>
    </table>
</div>