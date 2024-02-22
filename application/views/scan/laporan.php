<?php

error_reporting(0);

          $this->load->library('session');
          
        function tglSql($tgl){
    $ex = explode("/",$tgl);
    return $ex[2].'-'.$ex[1].'-'.$ex[0];
    
}

$id_member = $_SESSION['id'];
                                    
                                    
                                    if(!empty($_GET)){
                                        $status = $_GET['status'];
                                        $awal = tglSql($_GET['awal']);
                                        $akhir = tglSql($_GET['akhir']);
                                        $ekspedisi = $_GET['ekspedisi'];
                                        if($status !=='all'){
                                                
                                            if($status==0){
                                                $tipe='scan';
                                            }elseif($status==1){
                                                $tipe='packing';
                                            }elseif($status==2){
                                                $tipe='ekspedisi';
                                            }elseif($status==3){
                                                $tipe='retur';
                                            }
                                            
                                            if($ekspedisi =='all'){
                                                 $sql="SELECT * FROM barcode_$id_member WHERE status='$status' AND tanggal_$tipe BETWEEN '$awal' AND '$akhir'";
                                            }else{
                                                 
                                                 $sql="SELECT * FROM barcode_$id_member WHERE status='$status' AND ekspedisi='$ekspedisi' AND tanggal_$tipe BETWEEN '$awal' AND '$akhir'";
                                            }
                                            
                                           
                                        }else{
                                            
                                             if($ekspedisi =='all'){
                                                  $sql="SELECT * FROM barcode_$id_member WHERE tanggal_scan BETWEEN '$awal' AND '$akhir'";
                                            }else{
                                                 
                                                 $sql="SELECT * FROM barcode_$id_member WHERE ekspedisi='$ekspedisi' AND tanggal_scan BETWEEN '$awal' AND '$akhir'";
                                            }
                                            
                                            
                                          
                                        }
                                    }else{
                                        $sql="SELECT * FROM barcode_$id_member limit 0";
                                    }





?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            <h3>Laporan</h3>
        </div>
        <div class="col-sm-2">
            <a href="<?php echo site_url('laporan/excel?').str_replace("/laporan?","",$_SERVER['REQUEST_URI']) ?>" class="btn btn-primary col-sm-12"><i class="flaticon-download"></i> Download Excel</a>
        </div>
    </div>
    <div class="card">
        <form>
            <div class="row">
             <input id="id_member" value="<?php echo $_SESSION['id'] ?>" type="hidden" />
             <div class="col-sm-3">
                <div class="flex flex-column">
                    <div class="field p-input-filled">
                        <label>Courir</label>
                         <select id="filterStatus" name="ekspedisi" class="p-inputtext p-component p-element w-full ng-pristine ng-valid ng-touched">
                        <option value="all" <?php echo $_GET['ekspedisi']=='all'?'selected':'' ?> >Show All</option>
                        <?php
                            foreach($this->db->query("SELECT DISTINCT nama_kurir FROM data_kurir")->result() as $r){
                        ?>
                            <option <?php echo $_GET['ekspedisi']==$r->nama_kurir?'selected':'' ?> ><?php echo $r->nama_kurir ?></option>
                        
                        <?php } ?>
                       
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="flex flex-column">
                    <div class="field p-input-filled">
                        <label>Status</label>
                         <select id="filterStatus" name="status" class="p-inputtext p-component p-element w-full ng-pristine ng-valid ng-touched">
                        <option value="all" <?php echo $_GET['status']=='all'?'selected':'' ?> >Show All</option>
                        <option value="0" <?php echo $_GET['status']=='0'?'selected':'' ?>>Scan Resi</option>
                        <option value="1" <?php echo $_GET['status']=='1'?'selected':'' ?>>Scan Packing</option>
                        <option value="2" <?php echo $_GET['status']=='2'?'selected':'' ?>>Scan Ekspedisi</option>
                        <option value="3" <?php echo $_GET['status']=='3'?'selected':'' ?>>Scan Retur</option>
                      </select>
                    </div>
                </div>
            </div>
             <div class="col-sm-5">
                <div class="flex flex-column">
                    <div class="field p-input-filled">
                        <label>Periode</label>
                         <div class="input-daterange row" id="datepicker">
                            <input type="text" class=" p-inputtext p-component" name="awal" value="<?php echo !empty($_GET['awal'])?$_GET['awal']:date('d/m/Y') ?>"  />
                            <input type="text" class=" p-inputtext p-component" name="akhir" value="<?php echo !empty($_GET['akhir'])?$_GET['akhir']:date('d/m/Y') ?>" />
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-sm-2">
                   <div class="flex flex-column">
                    <div class="field p-input-filled">
                           <label>&nbsp;</label>
                        <button class="btn btn-primary col-sm-12" style="padding:0.75rem"><i class="flaticon-search"></i> Proses</button>
                </div>
                </div>
                
              </div>
        </div>
        </form>
    </div>
    

     <div class="card">
         <?php
         

  
                                    
                                 
          
          ?>
         <div id="dataScan">
                <div class="category-filter">
                     
                    </div>



	<table class="table tabza p-datatable-table ng-star-inserted table-responsive nowrap">
	  		<thead class="p-datatable-thead bg-light">
                                    <tr class="table-success">
                                        	<tr>
                                        	    
                                	  			<th>Courir</th>
                                	  			<th>Waybill</th>
                                                <th>Tanggal Scan</th>
                                                <th>Scanned By</th>
                                	            <th>Tanggal Packing</th>
                                	            <th>Packing By</th>
                                	            <th>Tanggal Ekspedisi</th>
                                	            <th>Ekspedisi By</th>
                                	            <th>Tanggal Retur</th>
                                	            <th>Retur By</th>
                                	            <th width="10%">Status</th>
                                	            <th width="10%">Action</th>
                                             </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                    
                                  
                                    
                                    foreach($this->db->query($sql)->result() as $r){
                                        
                                        if($r->status==0){
                                        $warna='#58A55D';
                                        $status='Scan Resi';
                                    }elseif($r->status==1){
                                        $warna='#F2BF41';
                                        $status='Scan Packing';
                                    }elseif($r->status==2){
                                        $warna='#D85040';
                                        $status='Scan Ekspedisi';
                                    }elseif($r->status==3){
                                        $warna='#85A8F1';
                                        $status='Scan Retur';
                                        
                                    }
                                    
                                    $showstatus = '<span style="color:'.$warna.';padding:5px;border-radius:10px;border:1px solid '.$warna.'">'.$status.'</span>';
                                    
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $r->ekspedisi ?></td>
                                        <td><?php echo $r->nama ?></td>
                                        <td><?php echo $r->tanggal_scan ?></td>
                                        <td><?php echo $r->by_scan ?></td>
                                         <td><?php echo $r->tanggal_packing ?></td>
                                          <td><?php echo $r->by_packing ?></td>
                                         <td><?php echo $r->tanggal_ekspedisi ?></td>
                                          <td><?php echo $r->by_ekspedisi ?></td>
                                         <td><?php echo $r->tanggal_retur ?></td>
                                          <td><?php echo $r->by_retur ?></td>
                                         <td><?php echo $showstatus?></td>
                                        <td><a onClick="deleteData(<?php echo $r->id ?>)" href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="flaticon-delete"></i> </a></td>
                                    </tr>
                                    
                                    <?php } ?>
                                </tbody>
                    </table>
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

});



            // var table =  $('.laporan').dataTable({
            //       "searching": true,
            //         "processing": true,
            //          "scrollX": true,
            //         "serverSide": true,
            //         "order": [],
            //         "ajax": {
            //             "url": 'laporan/ajax_list',
            //             "type": "POST",
                       
            //         },
            //     });
                
                
            //     $("#filterStatus").change(function(){
                    
            //         var key = $(this).val();
                    
            //          var table =  $('.laporan').dataTable({
            //               "searching": true,
            //                 "processing": true,
            //                  "scrollX": true,
            //                 "serverSide": true,
            //                 "order": [],
            //                 "ajax": {
            //                     "url": 'laporan/ajax_2',
            //                     "type": "POST",
            //                     "data":{
            //                         "status":key
            //                     }
            //                 },
            //             });
            //     })
                
                function deleteData(x){
                   Swal.fire({
                      title: "Are you sure?",
                      text: "You won't be able to revert this!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                      if (result.isConfirmed) {
                            window.location.href='<?php echo site_url('laporan/delete/') ?>'+x
                      }
                    });
                }
                
               
                
                
            
</script>