	  		
	<?php
	
	
	$id_client = $this->uri->segment(3);
	
	$sql="SELECT * FROM data_client WHERE id_client='$id_client'";
	
	$c = $this->db->query($sql)->row_object();
	

	?>
<!DOCTYPE html>
<html>
<head>
	<base href="">
	<meta charset="utf-8" />
	<title><?php echo $c->nama_client ?> - <?php echo $c->nama_aplikasi ?></title>
	<meta name="description" content="<?php echo $c->nama_aplikasi ?>">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo site_url() ?>assets/css/pagePreloaders.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/selectize.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/app.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/chart.css" rel="stylesheet" type="text/css" />  
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/notify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/pagePreloaders.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/selectize.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/moment.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/chart.js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/app.js"></script>
 <link rel="manifest" href="<?php echo site_url() ?>manifest.json">
  <link rel="shortcut icon" href="<?php echo site_url() ?>assets/images/z.png" />
  <style>
      @font-face {
      font-family: zvl-SemiBold;
      src: url('<?php echo site_url()?>/assets/Poppins-SemiBold.ttf');
    }
    
        @font-face {
      font-family: zvl-Regular;
      src: url('<?php echo site_url()?>/assets/Poppins-Regular.ttf');
    }
    
    
    .text-zvl-SemiBold{
        font-family:zvl-SemiBold;
    }
    
     .text-zvl-Regular{
         font-family:zvl-Regular;
         
    }
    
    a,p,th,td{
        font-size:12px
    }
    
    .bg-utama{
        background-color:#044CC2;
        color:#FFF;
        border-radius:0px;
        
    }
    
    .text-utama{
        color:#044CC2;
    }
    .bg-utama:hover{
       box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
       color:#FFF;
    }
    
        .bg-kedua{
        background-color:#FCBC0F;
        color:#FFF;
        border-radius:0px;
 
    }
    
    .text-kedua{
        color:#FCBC0F;
    }
    .bg-kedua:hover{
       box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    
    
    @media print{
        .hilang{
            display:none
        }
    }
    
    
    
  .AppInput{
  	display: block;
  	height: 40px;
  	width: 100%;
  	border-width: 0;
  	color: #6e6969;
    padding-left: 5%;
  	font-family: NunitoRegular;
    background-color:#FFF;
  
    color: #000;

    border-bottom:1px solid black;
  }

  .AppInput:focus{
      outline: none; 
  	 color: #000;
     border-bottom:1px solid #044CC2;
  }


  .AppInput:focus .AppLabel{
    color: #044CC2;
  }



  .AppLabel{
  color: #1B2755;


  }


  .iconInput{
    position: absolute;top: 50%;left: 3%;color:#1B2755;
  }




  a{
    color:#1B2755; 
  }


.mytgl{
    width:40%;font-size:small;background-color:white;text-align:center;padding-top:13px
}

.myorder{
    position:relative;width:60%;font-size:medium;background-color:white;padding-left:10px;border-left:2px solid black;padding-top:10px
}


.myorder-belum{
    position:relative;width:60%;font-size:medium;background-color:white;padding-left:10px;border-left:2px solid black;padding-top:10px;color:#CDCDCD;
}

.bulat{
    width:16px;height:16px;border-radius:15px;background-color:#28a745;left:-9px;position:absolute;bottom:10px
}

.bulat-sudah{
    width:16px;height:16px;border-radius:15px;background-color:#007bff;left:-9px;position:absolute;bottom:10px
}

.bulat-belum{
    width:16px;height:16px;border-radius:15px;background-color:#6c757d;left:-9px;position:absolute;bottom:10px;
}
  </style>
</head>


<?php
  
  
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


<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo site_url('client') ?>" style="font-size:medium">
    <img src="<?php echo site_url().'/'.$c->foto_client ?>" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php echo $c->nama_client ?>
  </a>
</nav>

<?php

 if(!empty($_SESSION['email'])){
     
     ?>
     
     <a style="margin:2%" href="<?php echo site_url('client') ?>" class="btn btn-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a> 
     <a style="margin:2%" href="<?php echo site_url('client/add_kontrak/'.$id_client) ?>" class="btn btn-primary"><i class="flaticon2-add"></i> Tambah Requirement</a>
     <span class="badge badge-danger">Rp. <?php echo number_format($c->harga_client) ?></span>
     
     
     <?php } ?>


<div class="container-fluid" style="padding-top:2%">
<center>
    <p style="font-weight:bold;font-size:meduim">TRACKING PROGRESS APLIKASI <?php echo strtoupper($c->nama_aplikasi) ?></p>
    
</center>



<?php

if(!empty($_GET['status']) && !empty($_GET['jenis'])){
   if($_GET['jenis']=='ON'){
         $sql="UPDATE data_tracking SET tanggal='".date('Y-m-d')."', jenis='".$_GET['jenis']."' WHERE status='".$_GET['status']."' AND fid_client='$id_client'";
   }else{
       
     
         $sql="UPDATE data_tracking SET jenis='".$_GET['jenis']."' WHERE status='".$_GET['status']."' AND fid_client='$id_client'";
   }
    $this->db->query($sql);
    redirect('https://member.zavalabs.com/client/tracking/');
}


  if($c->harga_client >= 5000000){
           $sql="SELECT  * FROM data_tracking WHERE fid_client='$id_client'";
       }else{
           $sql="SELECT  * FROM data_tracking WHERE  status !='Revisi 3'  AND fid_client='$id_client'";
       }


foreach($this->db->query($sql)->result() as $r){
    
    
    $update='';
    
    if(!empty($_SESSION['email'])){
             if($r->jenis=='ON'){
    
    $update='
    
    <a class="badge badge-primary" href="'.site_url('client/tracking/'.$id_client).'?status='.$r->status.'&jenis=SUDAH">SUDAH</a>
    
    ';
            
            
     }elseif($r->jenis=='BELUM'){
         $update='<a class="badge badge-success" href="'.site_url('client/tracking/'.$id_client).'?status='.$r->status.'&jenis=ON">ON</a>';
     }

    }
          
    
    
    if($r->jenis=='ON'){
        $jenis='bulat';
        $order = 'myorder';
    }elseif($r->jenis=='SUDAH'){
        $jenis='bulat-sudah';
         $order = 'myorder';
    }elseif($r->jenis=='BELUM'){
        $jenis='bulat-belum';
         $order = 'myorder-belum';
         
         
    }
    
    if($r->status=='Order Masuk'){
        $tanggal = $c->tanggal_daftar;
    }else{
        $tanggal= $r->tanggal;
    }

?>
<div class="row" style="height:40px"><div class="mytgl"><?php echo $tanggal ?></div><div class="<?php echo $order ?>"> <?php echo $r->status ?> <?php echo $update ?>  <div class="<?php echo $jenis ?>"> </div></div></div>


<?php } ?>



</div>


<div style="padding-top:2%;margin:2%">
<center>
    <p style="font-weight:bold;font-size:meduim">REQUIREMENT APLIKASI <?php echo strtoupper($c->nama_aplikasi) ?></p>
    
</center>
<table border="1" style="font-size:small;border-collapse:collapse;width:100%" cellpadding="2">
    <tr>
        <th align="center">Menu</th>
        <th align="center">Keterangan</th>
        <th align="center" width="2%">Status</th>
    </tr>
    <?php
    $sqlR = "SELECT * FROM data_kontrak WHERE fid_client='$id_client' ORDER BY menu";
    
    foreach($this->db->query($sqlR)->result() as $k){
        
        if($k->status==0){
            $icon='<i class="flaticon2-hourglass-1" style="color:gray;font-size:15pt"></i>';
        }else{
            $icon='<i class="flaticon2-correct" style="color:green;font-size:15pt"></i>';
        }  
        
          if($k->fitur=='AWAL'){
            $iconF='<i class="flaticon-lock" style="color:gray;font-size:10pt"></i>';
        }else{
            $iconF='<span class="badge badge-warning">baru</span>';
        }  
        
    ?>
    
    <tr>
        <td><?php echo $k->menu ?> <?php echo $iconF ?></td>
        <td><?php echo $k->keterangan ?></td>
        <td align="center"><?php echo $icon ?></td>
        <?php
        if(!empty($_SESSION['email'])){
            
            ?>
        <td>
            <?php
            if($k->status==0){
            ?>
            
             <a class="badge badge-success" href="<?php echo site_url('client/done_kontrak/'.$id_client.'/'.$k->id_kontrak) ?>">Selesai</a>
            
            <?php } ?>
            <a class="badge badge-primary" href="<?php echo site_url('client/kontrak_edit/'.$id_client.'/'.$k->id_kontrak) ?>">edit</a>
            <a onClick='return confirm("Apakah kamu akan hapus ini ?")' class="badge badge-danger" href="<?php echo site_url('client/delete_kontrak/'.$id_client.'/'.$k->id_kontrak) ?>">hapus</a>
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
<p>*Reqirement tersebut sudah di sepakati bersama, apabila ada fitur diluar kesepakatan maka akan dibuat kesepakatan baru. </p>
</div>



