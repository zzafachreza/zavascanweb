<?php



if(!empty($_POST['key'])){
    
    $key = $_POST['key'];
    $sql="SELECT * FROM data_tokopedia LEFT JOIN barcode ON barcode.nama = data_tokopedia.kolom_35 WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_35 like '%$key%' OR kolom_9 like '%$key%' limit 50";
    $jml = $this->db->query("SELECT * FROM data_tokopedia WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_5 like '%$key%' OR kolom_13 like '%$key%'")->num_rows();
}else{
     $sql="SELECT * FROM data_tokopedia LEFT JOIN barcode ON barcode.nama = data_tokopedia.kolom_35 WHERE fid_member='".$_SESSION['id']."' limit 50";
      $jml = $this->db->query("SELECT * FROM data_tokopedia WHERE fid_member='".$_SESSION['id']."'")->num_rows();
}

?>



<div style="padding-bottom:1%;padding-top:1%">
    Total Data tokopedia : <strong><?php echo number_format($jml)  ?></strong>
</div>
<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead  style="color:white;background:#42B549">
	  			<tr>
    	  			<th>No</th>
    	  			<th>Status</th>
    	  		        <th>Nomor</th>
                        <th>Nomor Invoice</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status Terakhir</th>
                        <th>Tanggal Pesanan Selesai</th>
                        <th>Waktu Pesanan Selesai</th>
                        <th>Tanggal Pesanan Dibatalkan</th>
                        <th>Waktu Pesanan Dibatalkan</th>
                        <th>Nama Produk</th>
                        <th>Tipe Produk</th>
                        <th>Nomor SKU</th>
                        <th>Catatan Produk Pembeli</th>
                        <th>Catatan Produk Penjual</th>
                        <th>Jumlah Produk Dibeli</th>
                        <th>Harga Awal (IDR)</th>
                        <th>Diskon Produk (IDR)</th>
                        <th>Harga Jual (IDR)</th>
                        <th>Jumlah Subsidi Tokopedia (IDR)</th>
                        <th>Nilai Voucher Toko Terpakai (IDR)</th>
                        <th>Jenis Voucher Toko Terpakai</th>
                        <th>Kode Voucher Toko Yang Digunakan</th>
                        <th>Biaya Pengiriman Tunai (IDR)</th>
                        <th>Biaya Asuransi Pengiriman (IDR)</th>
                        <th>Total Biaya Pengiriman (IDR)</th>
                        <th>Total Penjualan (IDR)</th>
                        <th>Nama Pembeli</th>
                        <th>No Telp Pembeli</th>
                        <th>Nama Penerima</th>
                        <th>No Telp Penerima</th>
                        <th>Alamat Pengiriman</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Nama Kurir</th>
                        <th>Tipe Pengiriman (regular, same day, etc)</th>
                        <th>No Resi / Kode Booking</th>
                        <th>Tanggal Pengiriman Barang</th>
                        <th>Waktu Pengiriman Barang</th>
                        <th>Nama Campaign</th>
                        <th>Bebas Ongkir</th>
                        <th>COD</th>
    	  			<th>Action</th>
    	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				if(strlen($row->nama) > 3 ){
	  				    $icon = '<i class="flaticon2-correct" style="font-size:x-large;color:green"></i>';
	  				    $txt = 'DONE';

	  				}else{
	  				      $icon = '<i class="flaticon2-cross" style="font-size:large;color:red"></i>';
	  				       $txt = '';
	  				}
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  					<td> <?php echo $icon ?> <?php echo $txt ?></td>
		  				<td><?php echo $row->kolom_1 ?></td>
		  			
                        <td><?php echo $row->kolom_2 ?></td>
                        <td><?php echo $row->kolom_3 ?></td>
                        <td><?php echo $row->kolom_4 ?></td>
                        <td><?php echo $row->kolom_5 ?></td>
                        <td><?php echo $row->kolom_6 ?></td>
                        <td><?php echo $row->kolom_7 ?></td>
                        <td><?php echo $row->kolom_8 ?></td>
                        <td><?php echo $row->kolom_9 ?></td>
                        <td><?php echo $row->kolom_10 ?></td>
                        <td><?php echo $row->kolom_11 ?></td>
                        <td><?php echo $row->kolom_12 ?></td>
                        <td><?php echo $row->kolom_13 ?></td>
                        <td><?php echo $row->kolom_14 ?></td>
                        <td><?php echo $row->kolom_15 ?></td>
                        <td><?php echo $row->kolom_16 ?></td>
                        <td><?php echo $row->kolom_17 ?></td>
                        <td><?php echo $row->kolom_18 ?></td>
                        <td><?php echo $row->kolom_19 ?></td>
                        <td><?php echo $row->kolom_20 ?></td>
                        <td><?php echo $row->kolom_21 ?></td>
                        <td><?php echo $row->kolom_22 ?></td>
                        <td><?php echo $row->kolom_23 ?></td>
                        <td><?php echo $row->kolom_24 ?></td>
                        <td><?php echo $row->kolom_25 ?></td>
                        <td><?php echo $row->kolom_26 ?></td>
                        <td><?php echo $row->kolom_27 ?></td>
                        <td><?php echo $row->kolom_28 ?></td>
                        <td><?php echo $row->kolom_29 ?></td>
                        <td><?php echo $row->kolom_30 ?></td>
                        <td><?php echo $row->kolom_31 ?></td>
                        <td><?php echo $row->kolom_32 ?></td>
                        <td><?php echo $row->kolom_33 ?></td>
                        <td><?php echo $row->kolom_34 ?></td>
                        <td><?php echo $row->kolom_35 ?></td>
                        <td><?php echo $row->kolom_36 ?></td>
                        <td><?php echo $row->kolom_37 ?></td>
                        <td><?php echo $row->kolom_38 ?></td>
                        <td><?php echo $row->kolom_39 ?></td>
                        <td><?php echo $row->kolom_40 ?></td>

		  				<td>
		  				
		  	

		  					<a href="<?php echo site_url('marketplace/tokopedia_delete/'.$row->id_tokopedia) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>
	  	
	  	<script>
	$(document).ready(function() {
    $('.tabza2').DataTable( {
        "scrollX": true,
        'searching':false,
        'paging':false
    } );
    
} );
	  	</script>