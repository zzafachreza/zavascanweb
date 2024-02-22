<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
	  </ol>
</nav>
<div class="container-fluid">
    
     	    <?php
	  	    $bidangHD = $this->db->query("SELECT * FROM data_bidang WHERE id='$id_bidang'")->row_array();
	  	   
	  	     $sqlKegiatan ="SELECT * FROM data_kegiatan WHERE id_bidang='$id_bidang' AND id='$id'";
	  	    
	  	    
	  	    $kegiatan = $this->db->query($sqlKegiatan)->row_array();
	  	    
	  	    ?>
	  	    

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('bidang/update2') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('bidang/detail/') ?><?php echo $bidangHD['id'] ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  		<a href="<?php echo site_url('bidang/add3/') ?><?php echo $bidangHD['id'] ?>/<?php echo $kegiatan['id'] ?>/<?php echo $kegiatan['kode'] ?>" class="btn bg-utama" ><i class="flaticon2-add"></i> Tambah Uraian Baru</a>
  		<a href="<?php echo site_url('bidang/cetak_uraian/') ?><?php echo $kegiatan['id'] ?>/<?php echo $bidangHD['id'] ?>" class="btn btn-secondary" style="border-radius:0px" ><i class="flaticon2-print"></i> Cetak Uraian</a>
  		<a href="<?php echo site_url('bidang/cetak_pajak/') ?><?php echo $kegiatan['id'] ?>/<?php echo $bidangHD['id'] ?>" class="btn btn-danger" style="border-radius:0px" ><i class="flaticon2-print"></i> Cetak Uraian Pajak</a>
	  </div>
	  	<div class="card-body">
	  	    
	 
	  	 
	
	  		 <div class="row">
	  		     <div class="col col-sm-6">
	  		         	  <table class="table table-hover table-bordered ">
        	  		        <tr class="bg-utama" style="border-bottom:5px solid #FCBC0F"><th>Nama Bidang</th>
        	  		                <td><?php echo $bidangHD['nama'] ?></td></tr>
                                    <tr><th>Anggaran</th><td><?php echo number_format($bidangHD['anggaran']) ?></td></tr>
                                    <tr><th>Realisasi</th><td><?php echo number_format($bidangHD['perubahan']) ?></td></tr>
        	  		    </table>
	  		     </div>
	  		      <div class="col col-sm-6">
	  		         	  <table class="table table-hover table-bordered ">
        	  		        <tr class="bg-utama" style="border-bottom:5px solid #FCBC0F"><th>Nama Kegiatan</th>
        	  		         <td><?php echo $kegiatan['nama_kegiatan'] ?></td></tr>
                            <tr><th>Bulan</th><td><?php echo $kegiatan['bulan'] ?></td></tr>
                             <tr><th>Tahun</th><td><?php echo $kegiatan['tahun'] ?></td></tr>
        	  		    </table>
	  		     </div>
	  		 </div>
	  	    
	  	    <table class="table table-bordered" style="font-size:medium">
	  	        <tr class="bg-utama" style="border-bottom:5px solid #FCBC0F">
	  	            <td>No</td>
	  	            <td>Tanggal</td>
	  	            <td>Uraian</td>
	  	            <td>Kodering</td>
	  	            <td>Penerimaan</td>
	  	            <td>Pengeluaran</td>
	  	            <td>Dokumentasi</td>
	  	            <td>Verifikasi</td>
	  	            <td></td>
	  	        </tr>
	  	        <?php
	  	        $kode = $kegiatan['kode'];
	  	            $no=0;
	  	            $sqlUraian = "SELECT data_kegiatan_detail.id id,status,keterangan,data_kegiatan_detail.foto foto,tanggal_uraian,uraian,data_kegiatan_detail.masuk,data_kegiatan_detail.keluar,data_rekening.kode kode_rekening,data_rekening.nama nama_rekening,masuk,keluar FROM data_kegiatan_detail join data_rekening on data_rekening.id = data_kegiatan_detail.id_rekening WHERE data_kegiatan_detail.kode='$kode'";
	  	            foreach($this->db->query($sqlUraian)->result() as $row){
	  	                $no++;
	  	        ?>
	  	        
	  	            <tr>
	  	                 <td><?php echo $no ?></td>
    	  	            <td><?php echo Indonesia3Tgl($row->tanggal_uraian) ?></td>
    	  	            <td><?php echo $row->uraian ?></td>
    	  	             <td><?php echo $row->kode_rekening ?></td>
    	  	            <td><?php echo number_format($row->masuk) ?></td>
    	  	            <td><?php echo number_format($row->keluar) ?></td>
    	  	            <td><?php
    	  	                    
    	  	                    if(!empty($row->foto)){
    	  	                        ?>
    	  	                        <a href="<?php echo site_url().$row->foto ?>" class="btn bg-utama"><i class="flaticon-attachment"></i> Dokumentasi</a>
    	  	                        <?php
    	  	                    }else{
    	  	                        ?>
    	  	                        Tidak Ada
    	  	                        <?php
    	  	                    }
    	  	            ?>
    	  	         
    	  	            </td>
    	  	            <td>   
    	  	            
    	  	            <?php if($row->status=="LENGKAP"){ ?>
    	  	                 <span style="color:green;padding:2%"><i class="flaticon2-correct"></i> <?php echo $row->status ?></span>
    	  	            <?php }else { ?>
    	  	                 <textarea style="display:none"  id="ket<?php echo $row->id ?>"><?php echo $row->keterangan ?></textarea>
    	  	                 <span onClick=bukaModal('<?php echo $row->id ?>') style="color:red;padding:2%;cursor:pointer"><i class="flaticon2-cancel-music"></i> <?php echo $row->status ?></span>
    	  	            <?php } ?>
    	  	            
    	  	            
    	  	            </td>
    	  	            <td>
    	  	                 <a href="<?php echo site_url('bidang/edit3/'.$row->id.'/'.$bidangHD['id'].'/'.$kegiatan['id'].'/'.$kegiatan['kode']) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('bidang/delete3/'.$row->id.'/'.$bidangHD['id'].'/'.$kegiatan['id'].'/'.$kegiatan['kode'].'/'.$row->masuk.'/'.$row->keluar) ?>"  class="btn btn-danger" style="border-radius:0px"><i class="flaticon-delete"></i></a>	
    	  	            </td>
	  	            </tr>
	  	        <?php } ?>
	  	    </table>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Keterangan Verifikasi ( TIDAK LENGKAP )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-utama" data-dismiss="modal">Close</button>
      </div>
    </div>
    
    <script>
       function bukaModal(x){
            console.log(x);
            var dt = $("#ket"+x).val();
            $(".modal-body").html(dt);
            $("#myModal").modal();
        }
    </script>
  </div>
</div>