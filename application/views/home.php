<?php
function tglSql($tgl){
    $ex = explode("/",$tgl);
    return $ex[2].'-'.$ex[1].'-'.$ex[0];
    
}

 $id_member = $_SESSION['id'];

 
    
    
if(!empty($_POST)){
    
    
    $awal = tglSql($_POST['awal']);
    $akhir = tglSql($_POST['akhir']);
    
     $sql0="SELECT COUNT(id) jml FROM barcode_$id_member WHERE tanggal_scan >= '$awal' AND tanggal_scan <= '$akhir'";
     
     $sql1="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=0 AND tanggal_scan >= '$awal' AND tanggal_scan <= '$akhir'";
     
     $sql2="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=1 AND tanggal_packing >= '$awal' AND tanggal_packing <= '$akhir'";
     
     $sql3="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=2 AND tanggal_ekspedisi >= '$awal' AND tanggal_ekspedisi <= '$akhir'";
     
     $sql4="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=3 AND tanggal_retur >= '$awal' AND tanggal_retur <= '$akhir'";
     
     $sql5="select ekspedisi,count(nama) jumlah from barcode_$id_member WHERE tanggal_scan BETWEEN '$awal' AND '$akhir' GROUP by ekspedisi";
    
}else{
    $awal = tglSql(date('d/m/Y', strtotime('-7 days')));
    $akhir = tglSql(date('d/m/Y'));
    
    $sql0="SELECT COUNT(id) jml FROM barcode_$id_member WHERE tanggal_scan >= '$awal' AND tanggal_scan <= '$akhir'";
     
     $sql1="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=0 AND tanggal_scan >= '$awal' AND tanggal_scan <= '$akhir'";
     
     $sql2="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=1 AND tanggal_packing >= '$awal' AND tanggal_packing <= '$akhir'";
     
     $sql3="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=2 AND tanggal_ekspedisi >= '$awal' AND tanggal_ekspedisi <= '$akhir'";
     
     $sql4="SELECT COUNT(id) jml FROM barcode_$id_member WHERE status=3 AND tanggal_retur >= '$awal' AND tanggal_retur <= '$akhir'";
     
     $sql5="select ekspedisi,count(nama) jumlah from barcode_$id_member WHERE tanggal_scan BETWEEN '$awal' AND '$akhir' GROUP by ekspedisi";
}

$jml_all = $this->db->query($sql0)->row_object();
$jml_resi = $this->db->query($sql1)->row_object();
$jml_pack = $this->db->query($sql2)->row_object();
$jml_eks = $this->db->query($sql3)->row_object();

$jml_retur = $this->db->query($sql4)->row_object();
    
    
    $arrEks = array();
    $arrJml = array();
    $arrWarna = array();
foreach($this->db->query($sql5)->result() as $r){
    
    array_push($arrEks,$r->ekspedisi);
    array_push($arrJml,$r->jumlah);
    array_push($arrWarna,'#14B8A6');
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h3>Dashboard</h3>
        </div>
          <div class="col-sm-4">
            
            <form method="POST" id="dataForm">
                <div class="input-daterange row" id="datepicker">
                <input type="text" class=" p-inputtext p-component" name="awal" value="<?php echo !empty($_POST['awal'])?$_POST['awal']:date('d/m/Y', strtotime('-7 days')) ?>"  />
                <input type="text" class=" p-inputtext p-component" name="akhir" value="<?php echo !empty($_POST['akhir'])?$_POST['akhir']:date('d/m/Y') ?>" />
            </div>
            </form>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-sm-4">
            <div class="card flex flex-row align-items-center gap-3">
                <img src="<?php echo site_url('all.svg') ?>" />
                <div class="flex flex-column gap-2">
                    <div class="ng-star-inserted" style="font-size: 22px; font-weight: 800;"><?php echo number_format($jml_all->jml) ?></div>
                    <div class="text-500">All Scan</div>
                </div>
            </div>
        </div>
        
         <div class="col-sm-4">
            <div class="card flex flex-row align-items-center gap-3">
                <img src="<?php echo site_url('ready.svg') ?>" />
                <div class="flex flex-column gap-2">
                    <div class="ng-star-inserted" style="font-size: 22px; font-weight: 800;"><?php echo number_format($jml_resi->jml) ?></div>
                    <div class="text-500">Scan Resi</div>
                </div>
            </div>
        </div>
        
           <div class="col-sm-4">
            <div class="card flex flex-row align-items-center gap-3">
                <img src="<?php echo site_url('packing.svg') ?>" />
                <div class="flex flex-column gap-2">
                    <div class="ng-star-inserted" style="font-size: 22px; font-weight: 800;"><?php echo number_format($jml_pack->jml) ?></div>
                    <div class="text-500">Scan Packing</div>
                </div>
            </div>
        </div>
        

        
    </div>
    
    <div class="row mt-5">
     
        
         <div class="col-sm-4">
            <div class="card flex flex-row align-items-center gap-3">
                <img src="<?php echo site_url('shipping.svg') ?>" />
                <div class="flex flex-column gap-2">
                    <div class="ng-star-inserted" style="font-size: 22px; font-weight: 800;"><?php echo number_format($jml_eks->jml) ?></div>
                    <div class="text-500">Scan Ekspedisi</div>
                </div>
            </div>
        </div>
        
         <div class="col-sm-4">
            <div class="card flex flex-row align-items-center gap-3">
                <img src="<?php echo site_url('return.svg') ?>" />
                <div class="flex flex-column gap-2">
                    <div class="ng-star-inserted" style="font-size: 22px; font-weight: 800;"><?php echo number_format($jml_retur->jml) ?></div>
                    <div class="text-500">Scan Retur</div>
                </div>
            </div>
        </div>
        
    </div>
    
    
    <div class="row mt-5">
        <div class="col-sm-6">
            <div class="card">
              <div class="flex flex-column gap-2 align-items-center">
                   <h5 class="align-self-start">Order by Status</h5>
             
                   <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
              </div>
             
            </div>
        </div>
        
         <div class="col-sm-6">
            <div class="card">
                 <div class="flex flex-column gap-2 align-items-center">
                    <h5 class="text-left w-full">Order by Courier</h5>
                    <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                 </div>
            </div>
        </div>
        
 
        
    </div>
    
    
</div>


<script>
    $('.input-daterange').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
});

$('.input-daterange').on('changeDate', function (ev) {
   console.log(ev);
   $("#dataForm").submit();
});


const xValues = ["Scan Resi", "Scan Packing", "Scan Ekspedisi", "Scan Retur"];
const yValues = [
                
                    <?php echo $jml_resi->jml ?>,
                    <?php echo $jml_pack->jml ?>,
                    <?php echo $jml_eks->jml ?>,
                    <?php echo $jml_retur->jml ?>,
                ];
const barColors = ["#58A55D", "#F2BF41","#D85040","#85A8F1"];


const myChart = new Chart("myChart", {
  type: "pie",
  data: {
      labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
      legend: {
        position: "bottom",
        align: "center",
        labels: {
          usePointStyle: true,
          boxWidth: 10
        }
    },
    layout: {
        padding: 10
      },
     onHover: function (evt, elements) {
        if (elements && elements.length) {
          segment = elements[0];
          this.chart.update();
          selectedIndex = segment["_index"];
          segment._model.outerRadius += 5;
        } else {
          if (segment) {
            segment._model.outerRadius -= 5;
          }
          segment = null;
        }
      },
  }
});


const xValues2 = <?php echo json_encode($arrEks).';' ?>
const yValues2 = <?php echo json_encode($arrJml).';' ?>
const barColors2 = <?php echo json_encode($arrWarna).';' ?>




const myChart2 = new Chart("myChart2", {
  type: "horizontalBar",
  data: {
      labels: xValues2,
    datasets: [{
      backgroundColor: barColors2,
      data: yValues2
    }]
  },
  options: {
         indexAxis: 'y',
             responsive: true,
        legend:{
            display:false
        }
  }
});
</script>