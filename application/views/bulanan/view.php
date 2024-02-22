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
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
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

$id_bulanan = $this->uri->segment(3);
$r = $this->db->query("SELECT a.*,nama_lengkap,tlp,alamat,jumlah_device FROM data_bulanan a JOIN member b ON a.fid_member = b.id WHERE a.id_bulanan='$id_bulanan'")->row_object();

$jml_device = $r->jumlah_device;

$harga_device = 0;

if($jml_device > 0 && $jml_device <=10){
    $harga_device = 50000;
}elseif($jml_device > 10 && $jml_device <=20){
    $harga_device = 45000;
}elseif($jml_device > 20 && $jml_device <=100){
    $harga_device = 40000;
}elseif($jml_device > 100){
    $harga_device = 25000;
}


$run = $r->id_bulanan;
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
        <p style="font-size:16.5px"><strong>PT. ZAVALABS TEKNOLOGI INDONESIA</strong></p>
        <p style="font-size:14px">Jl. Banda No.30 Graha POS Indonesia Lantai 6 - Citarum Kota Bandung</p>
        
        <h1 style="text-align:right">INVOICE</h1>
        <p style="text-align:right;line-height:0px">No. ZVS<?php echo $run ?></p>
        
        <p style="font-size:14px">Kepada Yth:</p>
        <table cellpadding="3" style="font-size:14px">
            <tr>
                <td>Nama  / Perusahaan</td>
                <td>:</td>
                <td ><strong><?php echo $r->nama_lengkap ?></strong></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><strong><?php echo $r->tlp ?></strong></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><strong><?php echo $r->alamat ?></strong></td>
            </tr>
            
              <tr>
                <td>Tanggal Bayar</td>
                <td>:</td>
                <td><strong><?php echo Indonesia3Tgl($r->tanggal_bulanan) ?> [ <?php echo $r->status ?> ] </strong></td>
            </tr>
            
             <tr>
                <td>Pembayaran Selanjutnya</td>
                <td>:</td>
                <td><strong><?php echo Indonesia3Tgl($r->jatuh_tempo) ?></strong></td>
            </tr>
            
            
            
          
            
        </table>
        
  <table style="border-collapse: collapse;text-align:center;margin-top:3%;margin-bottom:3%" cellspacing="3" cellpadding="3" width="100%" border="1">
         <tr>
             <th>No</th>
             <th>Deskripsi</th>
             <th width="20%"> Jumlah</th>
             <th width="30%">Biaya</th>
         </tr>
         <tr>
             <td>1</td>
             <td style="height:50px">
                 APLIKASI ZAVASCAN <br/>
                 <span style="font-size:x-small">Hosting + domain + SSL</span>
                 
             </td>
               <td>
                1
             </td>
             <td>
                 <?php echo number_format($r->biaya) ?>
             </td>
         </tr>
         <tr>
             <td>2</td>
             <td style="height:50px">
                 DEVICE @Rp. <?php echo number_format($harga_device) ?>
                 
             </td>
               <td>
               <?php echo number_format($jml_device) ?>
             </td>
             <td>
                 <?php echo number_format($jml_device*$harga_device) ?>
             </td>
         </tr>
         <tr>
             <th colspan="3">Total Biaya</th>
             <th style="font-size:x-large"><?php 
             $total_biaya = $r->biaya+($jml_device*$harga_device);
             
             echo number_format($total_biaya) ?></th>
         </tr>
        </table>

                <!--<span style="font-size:12px;">Notes : Untuk pembayaran selanjutnya akan dihitung berdasarkan jumlah rata-rata perhari dari bulan sebelumnya.</span>-->
        
        <p>Make all check payable to ZAVALABS</p>
        <p>If you have any questions concerning this invoice, use the following contact information to +62813-1945-6595</p>
      
        <p>Payment Transfer to :</p>
         <table cellpadding="5">
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
        <?php if($r->status=="LUNAS"){ ?>
          <img style="position:absolute;right:10%" src="https://zavalabs.com/lunas.png" width="300"/>
          <?php } ?>
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
                     <td width="70%"><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%">ZVS<?php echo $run ?></p></td>
                </tr>
                <tr>
                    <td><p style="font-size:12px;text-align:left;">Sudah diterima dari</p></td>
                    <td>:</td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%"><?php echo $r->nama_lengkap ?> / <?php echo $r->tlp ?></p></td>
                </tr>
                <tr>
                    <td><p style="font-size:12px;text-align:left;">Banyaknya uang</p></td>
                    <td>:</td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%"><?php echo angkaTerbilang($total_biaya) ?> Rupiah</p></td>
                </tr>
                <tr>
                    <td><p style="font-size:12px;text-align:left;">Untuk Pembayaran</p></td>
                    <td>:</td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%">Aplikasi Zavascan termasuk (Hosting + domain + SSL)</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><p style="font-size:12px;text-align:left;border-bottom:1px dashed black;width:100%">Dengan jumlah device <?php echo $jml_device ?> ( <?php echo strtolower(angkaTerbilang($jml_device)) ?> )</p></td>
                </tr>
            </table>
             <table width="100%" style="border-collapse: collapse;text-align:center;margin-top:3%;margin-bottom:3%">
                
                <tr>
                    <td width="35%"><p style="font-size:30px;text-align:center;margin-top:0%;padding-left:5%;font-weight:bold;border:1px solid black;border-radius:10px">Rp. <?php echo number_format($total_biaya) ?></p></td>
                    <td></td>
                     <td width="30%">
                         <p style="font-size:12px;text-align:right;width:100%">Bandung, <?php echo Indonesia3Tgl($r->tanggal_bulanan) ?></p>
   
             
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