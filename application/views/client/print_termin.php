<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&family=Poppins:wght@300;400;600&display=swap');
  a,h1,h3,i,p,span,td,th{
     font-family: 'Poppins', sans-serif;
 }
    body {
  background: rgb(204,204,204); 
}

page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
 p{
      font-size:14px;
  }

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
  
  p{
      font-size:14px;
  }
}

</style>
<?php 

$nomor_invoice = $this->uri->segment(3);
$r = $this->db->query("SELECT * FROM data_invoice a JOIN data_client b ON a.fid_client = b.id_client WHERE nomor_invoice='$nomor_invoice'")->row_object();


$harga_device = 0;


  function Indonesia3Tgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal ="$tgl ".$namaBln[$bln]." $thn";
  return $tanggal;
}
?>



<page size="A4">
    <div style="padding:5%">
        <img src="https://zavalabs.com/zz.jpg" width="300"/>
        <p style="font-size:16.5px;line-height:4px"><strong>PT. ZAVALABS TEKNOLOGI INDONESIA</strong></p>
        <p style="font-size:small;line-height:0px">Jl. Banda No.30 Graha POS Indonesia Lantai 6 - Citarum Kota Bandung</p>
        
        <p style="text-align:right;font-size:x-large;font-weight:bold;line-height:0px">INVOICE</<p>
        <p style="text-align:right;line-height:2px"><?php echo $nomor_invoice ?></p>
        
        <p style="font-size:14px;line-height:2px">Kepada Yth:</p>
        <table cellpadding="1" style="font-size:small">
            <tr>
                <td>Nama  / Perusahaan</td>
                <td>:</td>
                <td ><strong><?php echo $r->nama_client ?></strong></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><strong><?php echo $r->telepon_client ?></strong></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><strong><?php echo $r->alamat_client ?></strong></td>
            </tr>
             <tr>
                <td>Tanggal Pelunasan</td>
                <td>:</td>
                <td><strong><?php echo Indonesia3Tgl($r->tanggal_2) ?></strong></td>
            </tr>
            
            
    
            
            
            
          
            
        </table>
        
  <table style="border-collapse: collapse;;margin-top:3%;margin-bottom:3%" cellspacing="3" cellpadding="3" width="100%" border="1">
         <tr>
      
             <th>Deskripsi</th>
             <th width="30%">Biaya</th>
         </tr>
         <tr>
     
             <td style="height:50px;font-size:small">
                <?php echo urldecode( $r->keterangan) ?>
               
                 
             </td>

             <td style="text-align:center">
                 <?php echo number_format($r->harga) ?>
             </td>
         </tr>
       
         <tr>
             <td style="font-size:small">Diskon</td>
             <td style="font-size:small;text-align:right"><?php echo number_format($r->diskon) ?></td>
         </tr>
           <tr>
             <td style="font-size:small">Total Project</td>
             <th style="font-size:large;text-align:right"><?php echo number_format($r->harga_total) ?></th>
         </tr>
           <tr>
             <td  style="font-size:small">Down Payment ( <?php echo Indonesia3Tgl($r->tanggal_1) ?> )</td>
             <td style="font-size:small;text-align:left"><?php echo number_format($r->bayar_1) ?></td>
         </tr>
           <tr>
             <td  style="font-size:small">Termin / Pembayaran kedua ( <?php echo Indonesia3Tgl($r->tanggal_2) ?> )</td>
             <th style="font-size:large;text-align:center"><?php echo number_format($r->bayar_2) ?></th>
         </tr>
              <tr>
             <td  style="font-size:small">Sisa Pembayaran</td>
             <td style="font-size:small;text-align:right"><?php echo number_format($r->sisa) ?></td>
         </tr>
          
        </table>

                <!--<span style="font-size:12px;">Notes : Untuk pembayaran selanjutnya akan dihitung berdasarkan jumlah rata-rata perhari dari bulan sebelumnya.</span>-->
        
        <p  style="font-size:small">Make all check payable to ZAVALABS</p>
        <p  style="font-size:small">If you have any questions concerning this invoice, use the following contact information to +62813-1945-6595 Payment Transfer to :</p>
         <table  style="font-size:small">
            <tr>
                <td>Bank</td>
                <td>:</td>
                <td><strong>BCA (BANK CENTRAL ASIA)</strong></td>
            </tr>
            <tr>
                <td>No. Acc</td>
                <td>:</td>
                <td><strong>008 4011 777</strong></td>
            </tr>
            
              <tr>
                <td>Acc. Name</td>
                <td>:</td>
                <td><strong>PT. ZAVALABS TEKNOLOGI INDONESIA</strong></td>
            </tr>
            
        </table>
 
          <h3>THANK YOU  FOR YOUR BUSINESS</h3>
      
    </div>
</page>
<?php

function angkaTerbilang($x){
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return angkaTerbilang($x - 10) . " Belas";
  elseif ($x < 100)
    return angkaTerbilang($x / 10) . " Puluh" . angkaTerbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . angkaTerbilang($x - 100);
  elseif ($x < 1000)
    return angkaTerbilang($x / 100) . " Ratus" . angkaTerbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . angkaTerbilang($x - 1000);
  elseif ($x < 1000000)
    return angkaTerbilang($x / 1000) . " Ribu" . angkaTerbilang($x % 1000);
  elseif ($x < 1000000000)
    return angkaTerbilang($x / 1000000) . " Juta" . angkaTerbilang($x % 1000000);
}

?>
<page size="A4">
    <div style="padding:5%;">
        <div style="border:1px solid black;padding-left:2%;padding-right:2%">
            <table width="100%" style="border-collapse: collapse;text-align:center;margin-top:3%;margin-bottom:3%">
                <tr>
                    <td  align="left">
                         <img src="https://zavalabs.com/zz.jpg" width="150"/>
                         <p style="font-size:12.5px;text-align:left;line-height:5px"><strong>PT. ZAVALABS TEKNOLOGI INDONESIA</strong></p>
                         <p style="font-size:12px;text-align:left;line-height:5px">Jl. Banda No.30 Graha POS Indonesia Lantai 6 - Citarum Kota Bandung</p>
                    </td>
                     <td colspan="2" align="right">
                     
                         <p style="font-size:25px;line-height:5px"><strong>KWITANSI</strong></p>
                         
                    </td>
               
                </tr>
               
            </table>
             <table width="100%" style="border-collapse: collapse;text-align:center;margin-top:3%;margin-bottom:3%">
                
                <tr>
                    <td width="20%"><p style="font-size:12px;text-align:left;margin-top:5%">Nomor</p></td>
                    <td>:</td>
                     <td width="70%"><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%"><?php echo $nomor_invoice ?></p></td>
                </tr>
                <tr>
                    <td><p style="font-size:12px;text-align:left;">Sudah diterima dari</p></td>
                    <td>:</td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%"><?php echo $r->nama_client ?> / <?php echo $r->telepon_client ?></p></td>
                </tr>
                <tr>
                    <td><p style="font-size:12px;text-align:left;">Banyaknya uang</p></td>
                    <td>:</td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%"><?php echo angkaTerbilang($r->bayar_2) ?> Rupiah</p></td>
                </tr>
                <tr>
                    <td><p style="font-size:12px;text-align:left;">Untuk Pembayaran</p></td>
                    <td>:</td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%">Pembayaran Termin Aplikasi <?php echo $r->nama_aplikasi ?></p></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%">&nbsp;</p></td>
                </tr>
            </table>
             <table width="100%" style="border-collapse: collapse;text-align:center;margin-top:3%;margin-bottom:3%">
                
                <tr>
                    <td width="35%"><p style="font-size:30px;text-align:center;margin-top:0%;padding-left:5%;font-weight:bold;border:1px solid black;border-radius:10px">Rp. <?php echo number_format($r->bayar_2) ?></p></td>
                    <td></td>
                     <td width="30%">
                         <p style="font-size:12px;text-align:right;width:100%">Bandung, <?php echo Indonesia3Tgl($r->tanggal_2) ?></p>
             
                         <img src="https://zavalabs.com/ttd.png" style="width:60px;padding-left:26%" />
                          <p style="font-size:12px;width:100%;margin-top:0%;padding-left:16%">Febi Nurul F</p>
                         
                    </td>
                </tr>
                    
              
            </table>
        </div>
    </div> 
</page>
<script>
    window.print();
</script>