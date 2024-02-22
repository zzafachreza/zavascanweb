<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Curva S</li>
	  </ol>
</nav>

	<?php
	error_reporting(0);
	
	
	$id_bidang=$bidang['id'];
	
	?>
	
    <div class="card">
    	  <div class="card-header">
    	  		
    
    
    	    <a onClick="window.history.back();"  class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
    	    
    	</div>
    	<div class="card-body">
    	     <h2 class="bg-utama" style="border-bottom:5px solid #FCBC0F"><i class="flaticon2-chart"></i> BIDANG <?php echo $bidang['nama'] ?> BERDASARKAN INPUT SPJ</h2>
            <div id="containerChart"></div>
             <h2 class="bg-utama" style="border-bottom:5px solid #FCBC0F"><i class="flaticon2-chart"></i> BIDANG <?php echo $bidang['nama'] ?> BERDASARKAN SPJ VALID</h2>
            <div id="containerChart2"></div>
    	</div>
    	
    	
    </div>

   


<script>
    Highcharts.chart('containerChart', {
  chart: {
    type: 'areaspline'
  },
  title: {
    text: '',
  },
  legend: {
    layout: 'vertical',
    align: 'left',
    verticalAlign: 'top',
    x: 150,
    y: 100,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
  },
  xAxis: {
    categories: [
       <?php
       $sqlAnggaran="SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'";
       foreach($this->db->query($sqlAnggaran)->result() as $row){
         
         echo "'".$row->bulan."',";    
       }
       
       ?>
                  
    ],
    plotBands: [{ // visualize the weekend
    //   from: 4.5,
    //   to: 6.5,
    //   color: 'red'
    }]
  },
  yAxis: {
    title: {
      text: 'Anggaran VS Realisasi'
    }
  },
  tooltip: {
    shared: true,
    valueSuffix: ' units'
  },
  credits: {
    enabled: false
  },
  plotOptions: {
    areaspline: {
      fillOpacity: 0.5,
      
    }
  },
  series: [{
    

 
    name: 'Anggaran',
    data: [
              <?php
              $anggaran=0;
           $sqlAnggaran="SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'";
           foreach($this->db->query($sqlAnggaran)->result() as $row){
             $anggaran +=$row->anggaran;
             echo $anggaran.",";    
           }
           
           ?>
        ]
  }, {
    name: 'Realisasi',
    data: [
              <?php
              $dataRealisasi=0;
       $sqlAnggaran="SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'";
  
       foreach($this->db->query($sqlAnggaran)->result() as $row){
           $bulan = $row->bulan;
           $tahun = $row->tahun;
           $sql="SELECT id_bidang,bulan,tahun,sum((select sum(masuk) from data_kegiatan_detail WHERE kode=data_kegiatan.kode)) as penerimaan, sum((select sum(keluar) from data_kegiatan_detail WHERE kode=data_kegiatan.kode)) as pengeluaran ,(sum((select sum(keluar) from data_kegiatan_detail WHERE kode=data_kegiatan.kode)) - sum((select sum(masuk) from data_kegiatan_detail WHERE kode=data_kegiatan.kode))) as realisasi FROM data_kegiatan WHERE id_bidang='$id_bidang' AND bulan='$bulan' AND tahun='$tahun' GROUP by bulan,tahun,id_bidang";
         $realisasi = $this->db->query($sql)->row_object();
         $dataRealisasi+= $realisasi->realisasi;
         
          echo $dataRealisasi.",";  
       }

       
       ?>
        ]
  }]
});

  Highcharts.chart('containerChart2', {
  chart: {
    type: 'areaspline'
  },
  title: {
    text: '',
  },
  legend: {
    layout: 'vertical',
    align: 'left',
    verticalAlign: 'top',
    x: 150,
    y: 100,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
  },
  xAxis: {
    categories: [
       <?php
       $sqlAnggaran="SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'";
       foreach($this->db->query($sqlAnggaran)->result() as $row){
         
         echo "'".$row->bulan."',";    
       }
       
       ?>
                  
    ],
    plotBands: [{ // visualize the weekend
    //   from: 4.5,
    //   to: 6.5,
    //   color: 'red'
    }]
  },
  yAxis: {
    title: {
      text: 'Anggaran VS Realisasi'
    }
  },
  tooltip: {
    shared: true,
    valueSuffix: ' units'
  },
  credits: {
    enabled: false
  },
  plotOptions: {
    areaspline: {
      fillOpacity: 0.5,
      
    }
  },
  series: [{
    

 
    name: 'Anggaran',
    data: [
              <?php
              $anggaran=0;
           $sqlAnggaran="SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'";
           foreach($this->db->query($sqlAnggaran)->result() as $row){
             $anggaran +=$row->anggaran;
             echo $anggaran.",";    
           }
           
           ?>
        ]
  }, {
    name: 'Realisasi',
    data: [
              <?php
              $dataRealisasi=0;
       $sqlAnggaran="SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'";
  
       foreach($this->db->query($sqlAnggaran)->result() as $row){
           $bulan = $row->bulan;
           $tahun = $row->tahun;
           $sql="SELECT id_bidang,bulan,tahun,sum((select sum(masuk) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode)) as penerimaan, sum((select sum(keluar) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode)) as pengeluaran ,(sum((select sum(keluar) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode)) - sum((select sum(masuk) from data_kegiatan_detail WHERE status='LENGKAP' AND kode=data_kegiatan.kode))) as realisasi FROM data_kegiatan WHERE id_bidang='$id_bidang' AND bulan='$bulan' AND tahun='$tahun' GROUP by bulan,tahun,id_bidang";
         $realisasi = $this->db->query($sql)->row_object();
         $dataRealisasi+= $realisasi->realisasi;
          echo $dataRealisasi.",";  
       }
       
       ?>
        ]
  }]
});


</script>