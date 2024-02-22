<style>
    .box{
       /*border:1px solid black;*/
       height:270;
       overflow:hidden;
      
       background-color:white;
       box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }
</style>

<?php

 $level = $_SESSION['level'];

?>

<div class="container-fluid" style="padding-top:2%">
    
    <a href="<?php echo site_url('bidang/add') ?>" class="btn bg-utama" ><i class="flaticon2-add"></i> Tambah Bidang Baru</a>
    <div class="row">
        
        
     <?php
     
                if($level=="ADMIN" OR $level=="Admin"){
                         $sqlLevel = "SELECT * FROM data_bidang";
                }else{
                         $sqlLevel = "SELECT * FROM data_bidang WHERE nama='$level'";
                }
        
	  				$no=0;
	  				$totalAnggaranBidang=0;
	  				$totalPerubahanBidang=0;
	  				foreach($this->db->query($sqlLevel)->result() as $row):
	  				$no++;
	  				
	  				$id_bidang= $row->id;
	  				
	  				$sqlCek="SELECT id_bidang,bulan,tahun,sum((select sum(masuk) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode)) as penerimaan, sum((select sum(keluar) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode)) as pengeluaran ,(sum((select sum(keluar) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode)) - sum((select sum(masuk) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode))) as realisasi FROM data_kegiatan WHERE id_bidang='$id_bidang'";
                   $real = $this->db->query($sqlCek)->row_object();
	  				
	  				$totalAnggaranBidang+=$row->anggaran;
	  				$totalPerubahanBidang+=$row->perubahan;
		  		?>
        
        <div class="col col-sm-4" style="padding:1%;">
            <div class="box">
                <div class="bg-utama" style="padding-left:2%;padding-top:1%;border-bottom:5px solid #FCBC0F">
                    <h3 style="font-weight:bold;"><i class="flaticon-pie-chart"></i> <?php echo $row->nama ?></h3>
                </div>
                <table class="table">
                    <tr>
                        <td><a href="<?php echo site_url('bidang/anggaran/'.$row->id) ?>" ><i class="flaticon2-layers-2"></i> Anggaran</a></td>
                        <td><?php echo number_format($row->anggaran) ?> </td>
                    </tr>
                     <tr>
                        <td class="text-kedua"><strong><i class="flaticon2-download"></i> Realisasi Input SPJ</strong></td>
                        <td class="text-kedua"><?php echo number_format($row->perubahan) ?></td>
                    </tr>
                     <tr>
                        <td class="text-utama"><i class="flaticon2-correct"></i> Realisasi SPJ Valid</td>
                        <td class="text-utama"><?php echo number_format($real->realisasi) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                                <a class="btn bg-utama" style="border-bottom:0px solid #FCBC0F" href="<?php echo site_url('bidang/curva/'.$row->id) ?>" ><i class="flaticon2-chart"></i> CURVA S <?php echo $row->nama ?></a>
                            </center>
                        </td>
                    </tr>
                </table>
                <div class="row">
                   <div class="col col-sm-6">
                     	<a href="<?php echo site_url('bidang/detail/'.$row->id) ?>" class="btn col-sm-12 bg-secondary" style="color:#FFF;border-radius:0px" ><i class="flaticon-calendar-with-a-clock-time-tools"></i> Kegiatan</a>
                   </div>
                   <div class="col col-sm-6">
                       <a href="<?php echo site_url('bidang/delete/'.$row->id.'/'.$row->foto) ?>" class="btn bg-kedua" style="float:right" ><i class="flaticon-delete"></i> Hapus</a>	
                        <a href="<?php echo site_url('bidang/edit/'.$row->id) ?>" class="btn bg-utama" style="float:right"><i class="flaticon-edit"></i> Edit</a>
           
                       	
                   </div>
                    
                </div>
            </div>
        </div>
        
        	<?php 
		  				endforeach;
		  		?>
            
      
        
    </div>
</div>

