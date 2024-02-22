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
        <p style="text-align:center;font-size:40px;font-weight:bold;color:#04a15a">Aplikasi <?php echo $r->nama_aplikasi ?></p>
        <center>
            <img src="https://zavalabs.com/zvlp1.png" width="70%" style="margin-bottom:15%;margin-top:15%"/>
        </center>
        <p style="text-align:left;font-size:medium;font-weight:bold;color:#f7543d"><?php echo Indonesia3Tgl($r->tanggal_invoice) ?></p>
          <p style="line-height:10px;text-align:left;font-size:large;font-weight:bold;color:#04a15a">Zavalabs ( Web & Mobile Development)</p>
      <p style="font-size:x-large;line-height:10px;font-weight:bold"><strong>PT. ZAVALABS TEKNOLOGI INDONESIA</strong></p>
        <p style="font-size:medium;line-height:10px">Jl. Banda No.30 Graha POS Indonesia Lantai 6 - Citarum Kota Bandung</p>
        <p style="font-size:large;line-height:10px;font-weight:bold"><strong>+62813-1945-6595</strong></p>
        <p style="font-size:medium;line-height:10px;font-weight:bold;color:blue"><strong>https://www.zavalabs.com</strong></p>
    </div>
</page>


<page size="A4">
    <div style="padding:5%">

        <p style="line-height:10px;text-align:left;font-size:large;font-weight:bold;color:#04a15a">Ringkasan</p>
                   <center>
                       <img src="<?php echo site_url() ?>/<?php echo $r->foto_client ?>" width="80%" style="margin-bottom:2%" />
                   </center>
        <?php echo str_replace("font-family: zvl-Regular;","font-weight:normal",str_replace('<table','<table style="border-collapse: collapse;;margin-top:3%;margin-bottom:0%" cellspacing="3" cellpadding="3" width="100%" border="1"',urldecode($r->ringkasan))) ?>
        
                    </center>


                <!--<span style="font-size:12px;">Notes : Untuk pembayaran selanjutnya akan dihitung berdasarkan jumlah rata-rata perhari dari bulan sebelumnya.</span>-->
        
      
    </div>
</page>

<page size="A4">
    <div style="padding:5%">
     
        <p style="line-height:10px;text-align:left;font-size:large;font-weight:bold;color:#04a15a">Spesifikasi Fitur dan Estimasi Biaya</p>
        <p style="line-height:10px;text-align:left;font-size:medium;font-weight:normal;color:#000">Adapun fitur secara garis besar yang akan dibangun adalah sebagai berikut</p>
  
   <?php echo urldecode( $r->keterangan) ?>
        
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

<page size="A4">
    <div style="padding:5%">
          <p style="line-height:10px;text-align:left;font-size:xx-large;font-weight:bold;color:#04a15a">Cara pembayaran</p>
         <p style="line-height:10px;text-align:left;font-size:medium;font-weight:normal;color:#000">Adapun cara pebayaran bisa dilakukan dengan 2 cara sebagai berikut:</p>
         
          <p style="line-height:20px;text-align:left;font-size:x-large;font-weight:bold;color:#04a15a">1. Down Payment</p>
         <p style="line-height:20px;text-align:left;font-size:medium;font-weight:normal;color:#000">Pembayaran Uang muka / DP sebesar 30% dari total biaya proyek, maka proyek langsung masuk jadwal dan mulai pengerjaan</p>
       
        <p style="line-height:20px;text-align:left;font-size:x-large;font-weight:bold;color:#04a15a">2. Termin 1</p>
         <p style="line-height:20px;text-align:left;font-size:medium;font-weight:normal;color:#000">Pembayaran Termin 1 sebesar 40% lagi dari total proyek dapat dibayarkan pada saat aplikasi rampung 70% dari progress.</p>
       
        
         <p style="line-height:20px;text-align:left;font-size:x-large;font-weight:bold;color:#04a15a">3. Pelunasan</p>
         <p style="line-height:20px;text-align:left;font-size:medium;font-weight:normal;color:#000">Pembayaran pelunasan sebesar 30% lagi dari total proyek dapat dibayarkan pada saat aplikasi sudah selesai dan aplikasi sudah Go - Live</p>


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
<script>
    window.print();
</script>