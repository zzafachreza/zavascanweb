
<?php
error_reporting(0);

$id_member = $_SESSION['id'];

if(isset($_SESSION['id'])){
    $cek_expired = $this->db->query("SELECT expired FROM member WHERE id='$id_member'")->row_object();

     $now = date('Y-m-d');
    
    if($now >= $cek_expired->expired){
        
        redirect('expired');
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<base href="">
	<meta charset="utf-8" />
	<title>Zavascan</title>
	<meta name="description" content="Aplikasi Scan Resi Tanpa Ribet">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- area css -->
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
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/css/zavascan.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    

      <script type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/dataTables.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/notify.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/pagePreloaders.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/popper.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/selectize.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/bootstrap-datepicker.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/moment.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/chart.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/app.js"></script>
    

    <link rel="manifest" href="<?php echo site_url() ?>manifest.json">

    <!-- area icon -->

  <link rel="shortcut icon" href="<?php echo site_url() ?>favicon.ico" />
  
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap')
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
        background-color:#00A896;
        color:#FFF;
        border-radius:0px;
        
    }
    
    .text-utama{
        color:#00A896;
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
  	font-family: 'Nunito';
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


  </style>
</head>
<body style="font-family:zvl-Regular">
<div id="loader">
 <div class="lds-ripple"><div></div><div></div></div>
 
</div>

<div id="flash-message-error">
  test
</div>
<div id="flash-message-success">
  test
</div>

<style>
    #loader{
  display: none;
  position: absolute;
  justify-content: center;
  align-items: center;
  align-content: center;
  z-index: 99;
  width: 100%;
  height: 100%;
  padding-left: 46%;
  padding-top: 20%;
  background-color:white;
  opacity: 0.9;
}

/*loader automatic*/
.lds-ripple,
.lds-ripple div {
  box-sizing: border-box;
}
.lds-ripple {
  display: inline-block;
  position: relative;
  width: 300px;
  height: 300px;
}
.lds-ripple div {
  position: absolute;
  border:7px solid #14B8A6;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 8px;
    height: 8px;
    opacity: 0;
  }
  4.9% {
    top: 36px;
    left: 36px;
    width: 8px;
    height: 8px;
    opacity: 0;
  }
  5% {
    top: 36px;
    left: 36px;
    width: 8px;
    height: 8px;
    opacity: 1;
  }
  100% {
    top: 0;
    left: 0;
    width: 80px;
    height: 80px;
    opacity: 0;
  }
}



 
    .nav-item{
        padding-left:5%;
        /*border:1px solid black;*/
        margin-top:20px;
        border-radius:2px;
        font-size:large;
        font-weight:500;
        
    }
</style>

<?php
    if(isset($_SESSION['email'])){
        
        $akun = $this->db->query("SELECT * FROM member WHERE email='".$_SESSION['email']."'")->row_object();

 


 $nav = explode("/", $_SERVER['REQUEST_URI']);

$menu = $nav[1];

?>
  <body style="font-family: 'PT Sans', sans-serif;">
    <div class="container-fluid">
    <div class="row">
    <div class="col col-sm-2 bg-white" style="padding:20px;box-shadow: rgba(0, 0, 0, 0.35) 10px 0 10px -10px;">
    
            <div style="padding-top:5%">
                <center>
              <img src="<?php echo site_url('rectangle.svg') ?>" width="100%" class="d-inline-block align-top" alt="">
                </center>
            </div>

 <ul class="navbar-nav">
    
      <li class="nav-item" <?php echo $menu=="" ? "style='background-color:#00A896;color:#030229;border-radius:5px'":"" ?>>
        <a class="nav-link" href="<?php echo site_url() ?>" <?php echo $menu=="" ? "style='background-color:#00A896;color:white;border-radius:5px'":"" ?>><i class="flaticon-dashboard"></i>&nbsp; Dashboard</a>
      </li>
   
   
    <?php
    
    if($_SESSION['email']=="zavalabsofficial@gmail.com"){
        
        
        ?>
        
       <li class="nav-item <?php echo $menu=="customer" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('customer') ?>" <?php echo $menu=="customer" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-users"></i> Member Zavascan</a>
      </li>
      
       <li class="nav-item <?php echo $menu=="bulanan" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('bulanan') ?>" <?php echo $menu=="bulanan" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-list"></i> Invoce Zavascan</a>
      </li>
      
        <li class="nav-item <?php echo $menu=="slider" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('slider') ?>" <?php echo $menu=="slider" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-web"></i> Data Slider</a>
      </li>
      
      
      
             <li class="nav-item <?php echo $menu=="client" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('client') ?>" <?php echo $menu=="client" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-users"></i> Client Jasa</a>
      </li>
      

      
        <?php
    }
    
    ?>
    
    
    <?php
    
    if($_SESSION['email']=="zavalabsofficial@gmail.com" || $_SESSION['email']=="cs.teamhmm@gmail.com" || $_SESSION['email']=="bong.jordan@hotmail.com"){
        
        
        ?>
        
           <li class="nav-item <?php echo $menu=="kurir" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('kurir') ?>" <?php echo $menu=="kurir" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-truck"></i> Data Kurir</a>
      </li>
      
          
           <li class="nav-item <?php echo $menu=="formulir" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('formulir') ?>" <?php echo $menu=="formulir" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-app"></i> Data Formulir Calon Customer</a>
      </li>
      
              <li class="nav-item <?php echo $menu=="artikel" ? "active":"" ?>"  >
        <a class="nav-link" href="<?php echo site_url('artikel') ?>" <?php echo $menu=="artikel" ? "style='background-color:#FCBC0F;color:#000;font-size:12px'":"style='color:#FFF;font-size:12px'" ?>> <i class="flaticon-folder-1"></i> Data Artikel</a>
      </li>
      
        <?php
    }
    
    ?>
    
  
      
    
    
   
       
       <?php
    
    if($_SESSION['email']!="zavalabsofficial@gmail.com"  ){
        
        ?>
        
        
      
            
          <div class="dropdown-divider"></div>
      <li class="nav-item" <?php echo $menu=="scan2" ? "style='background-color:#00A896;color:#030229;border-radius:5px'":"" ?>>
        <a class="nav-link" href="<?php echo site_url("scan2") ?>" <?php echo $menu=="scan2" ? "style='background-color:#00A896;color:white;border-radius:5px'":"" ?>><i class="flaticon-search"></i>&nbsp; Scan Resi</a>
      </li>
      
       <li class="nav-item" <?php echo $menu=="cekpacking" ? "style='background-color:#00A896;color:#030229;border-radius:5px'":"" ?>>
        <a class="nav-link" href="<?php echo site_url("cekpacking") ?>" <?php echo $menu=="cekpacking" ? "style='background-color:#00A896;color:white;border-radius:5px'":"" ?>><i class="flaticon-search"></i>&nbsp; Scan Packing</a>
      </li>
      
      
         <li class="nav-item" <?php echo $menu=="cekserahterima" ? "style='background-color:#00A896;color:#030229;border-radius:5px'":"" ?>>
        <a class="nav-link" href="<?php echo site_url("cekserahterima") ?>" <?php echo $menu=="cekserahterima" ? "style='background-color:#00A896;color:white;border-radius:5px'":"" ?>><i class="flaticon-search"></i>&nbsp; Scan Ekspedisi</a>
      </li>
  

     
        <li class="nav-item" <?php echo $menu=="retur" ? "style='background-color:#00A896;color:#030229;border-radius:5px'":"" ?>>
        <a class="nav-link" href="<?php echo site_url("retur") ?>" <?php echo $menu=="retur" ? "style='background-color:#00A896;color:white;border-radius:5px'":"" ?>><i class="flaticon2-refresh-1"></i>&nbsp; Scan Retur</a>
      </li>
      
      
      
      <li class="nav-item" <?php echo $menu=="laporan" ? "style='background-color:#00A896;color:#030229;border-radius:5px'":"" ?>>
        <a class="nav-link" onClick="bukaLaporan()" href="#" <?php echo $menu=="laporan" ? "style='background-color:#00A896;color:white;border-radius:5px'":"" ?>><i class="flaticon-folder-1"></i>&nbsp; Laporan</a>
      </li>
  

      

      
      



       
      
      
      
     <?php
    }
    
    ?>
    
   
      
      
    
      
 
    
    
  

  
    </ul>    
 <div class="dropdown-divider"></div>
   <center>
       
       <!--<div></div>-->
       <!--       <a href="https://api.whatsapp.com/send/?phone=6281312924040&text=Halo+kak%2C%0D%0A%0D%0ASaya+ingin+tanya">-->
       <!--           <img src="<?php echo site_url('adminzvs.png') ?>" width="100%" class="d-inline-block align-top" alt=""></a>-->
       <!--         </center>-->
       
       <div class="flex align-items-end justify-content-center p-3" style="background: url('https://zavascan.com/assets/images/sidebar/ask-bg.png') no-repeat center; height: 195px;">
           <p-button onClick="window.location.href='https://api.whatsapp.com/send/?phone=6281312924040&text=Halo+kak%2C%0D%0A%0D%0ASaya+ingin+tanya'" label="Chat Admin" class="p-element"><button pripple="" class="p-ripple p-element p-button p-component" type="button" style="width: 138px;"><!----><!----><!----><!----><!----><!----><span class="p-button-label ng-star-inserted">Chat Admin</span><!----><!----><span class="p-ink"></span></button></p-button></div>
       
    <ul class="navbar-nav ml-auto">
     
    <li class="nav-item dropdown" >
      <a style='color:#030229;font-size:12px' class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hallo,<strong> <?php echo $_SESSION['nama_lengkap'] ?></strong></a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
     
          
          <a class="dropdown-item" href="#" onClick="bukaHapus()" >Hapus Data Resi</a>
          
        <a class="dropdown-item" href="<?php echo site_url('login/logout') ?>">Logout</a>
      </div>
    </li>
  </ul>
  






    </div>
    <div class="col col-sm-10" style="background-color:#FAFAFB">
<!--   <nav class="navbar navbar-expand-lg navbar-light">-->
<!--  <button class="navbar-toggler" type="button" data-toggle="collapse">-->
<!--    <span class="navbar-toggler-icon"></span>-->
<!--  </button>-->
<!--  <div class="collapse navbar-collapse" id="navbarNav">-->
<!--    <ul class="navbar-nav" style="padding-left:1%">-->
    
<!--        <h1><?php echo $comp[0]->nama ?></h1>-->
    
<!--  asssd-->

  
<!--    </ul>-->
<!--    <ul class="navbar-nav ml-auto">-->

<!--    <li class="nav-item dropdown">-->
<!--      <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hallo Selamat datang,<strong> <?php echo $_SESSION['nama_lengkap'] ?></strong></a>-->
<!--      <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--        <a class="dropdown-item" href="<?php echo site_url('login/logout') ?>">Logout</a>-->
<!--      </div>-->
<!--    </li>-->
<!--  </ul>-->
<!--  </div>-->
<!--</nav>-->

<?php
  }
  
  function Indonesia3Tgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal ="$tgl ".$namaBln[$bln]." $thn";
  return $tanggal;
}

function IndonesiaBulan($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal = $namaBln[$bln];
  return $tanggal;
}

function IndonesiaTahun($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal = $thn;
  return $tanggal;
}

function angkaTerbilang($x){
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return angkaTerbilang($x - 10) . " belas";
  elseif ($x < 100)
    return angkaTerbilang($x / 10) . " puluh" . angkaTerbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . angkaTerbilang($x - 100);
  elseif ($x < 1000)
    return angkaTerbilang($x / 100) . " ratus" . angkaTerbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . angkaTerbilang($x - 1000);
  elseif ($x < 1000000)
    return angkaTerbilang($x / 1000) . " ribu" . angkaTerbilang($x % 1000);
  elseif ($x < 1000000000)
    return angkaTerbilang($x / 1000000) . " juta" . angkaTerbilang($x % 1000000);
}


?>
<script>
    function bukaLaporan(){
        if('<?php echo $_SESSION['email'] ?>'=='osmanfootwear@gmail.com'){
            
                $('#laporan').modal('show');
                setTimeout(function(){
                    $("#akses").focus();
                    $("#menu").val("laporan");
                },500);
                
                $("#dataAkses").submit(function(e){
                    e.preventDefault();
                    var akses = $("#akses").val();
                    var jenis = $("#jenis").val();
                    
                    if(akses=='sosm123' && jenis=='SEMUA'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                         window.location.href='https://zavascan.zavalabs.com/laporan?jenis=SEMUA';
                    }else if(akses=='rosm765' && jenis=='SUDAH SCAN'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                         window.location.href='https://zavascan.zavalabs.com/laporan?jenis=SCAN';
                    }else if(akses=='posm567' && jenis=='SUDAH PACKING'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                         window.location.href='https://zavascan.zavalabs.com/laporan?jenis=PACKING';
                    }else if(akses=='osms321' && jenis=='SERAH'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                         window.location.href='https://zavascan.zavalabs.com/laporan?jenis=TERIMA';
                    }else if(akses=='osmr01' && jenis=='RETUR'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                         window.location.href='https://zavascan.zavalabs.com/laporan3';
                    }else{
                       $("#inforerror").show();
                    }
                   
                })
  
           
             
        }else{
            window.location.href='https://zavascan.zavalabs.com/laporan';
            // alert('test12312')
        }
    }
    
     function bukaPacking(){
        if('<?php echo $_SESSION['email'] ?>'=='osmanfootwear@gmail.com'){
            
            $('#laporan').modal('show');
                setTimeout(function(){
                    $("#akses").focus();
                    $("#menu").val("laporan");
                },500);
                
                $("#dataAkses").submit(function(e){
                    e.preventDefault();
                    var akses = $("#akses").val();
                    
                    if(akses=='posm567'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                          window.location.href='https://zavascan.zavalabs.com/laporan2';
                    }else{
                       $("#inforerror").show();
                    }
                   
                })
   
        }else{
            window.location.href='https://zavascan.zavalabs.com/laporan2';
            // alert('test12312')
        }
    }
    
     function bukaRetur(){
        if('<?php echo $_SESSION['email'] ?>'=='osmanfootwear@gmail.com'){
            
             $('#laporan').modal('show');
                setTimeout(function(){
                    $("#akses").focus();
                    $("#menu").val("laporan");
                },500);
                
                $("#dataAkses").submit(function(e){
                    e.preventDefault();
                    var akses = $("#akses").val();
                    
                    if(akses=='osmr01'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                            window.location.href='https://zavascan.zavalabs.com/laporan3';
                    }else{
                       $("#inforerror").show();
                    }
                   
                })
   
        }else{
            window.location.href='https://zavascan.zavalabs.com/laporan3';
            // alert('test12312')
        }
    }
    
    
    
    function bukaHapus(){
        
         if('<?php echo $_SESSION['email'] ?>'=='osmanfootwear@gmail.com'){
            
   
                   
                   
                   $('#laporan').modal('show');
                setTimeout(function(){
                    $("#akses").focus();
                    $("#menu").val("laporan");
                },500);
                
                $("#dataAkses").submit(function(e){
                    e.preventDefault();
                    var akses = $("#akses").val();
                    
                    if(akses=='osmr01'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                            window.location.href='https://zavascan.zavalabs.com/scan2/hapus_resi';
                    }else{
                       $("#inforerror").show();
                    }
                   
                })
   
        }else{
            window.location.href='https://zavascan.zavalabs.com/scan2/hapus_resi';
            // alert('test12312')
        }
        
        
        
    }
    
    
    function bukaHapus2(){
        
         if('<?php echo $_SESSION['email'] ?>'=='osmanfootwear@gmail.com'){
      
                   $('#laporan').modal('show');
                setTimeout(function(){
                    $("#akses").focus();
                    $("#menu").val("laporan");
                },500);
                
                $("#dataAkses").submit(function(e){
                    e.preventDefault();
                    var akses = $("#akses").val();
                    
                    if(akses=='osmr01'){
                        console.log('oke');
                        $('#laporan').modal('hide');
                        $("#akses").val("");
                        $("#inforerror").hide();
                            window.location.href='https://zavascan.zavalabs.com/posting/reset';
                    }else{
                       $("#inforerror").show();
                    }
                   
                })
   
        }else{
            window.location.href='https://zavascan.zavalabs.com/posting/reset';
            // alert('test12312')
        }
        
        
        
    }
</script>


