<?php



if(!empty($_POST['key'])){
    
    $key = $_POST['key'];
    $sql="SELECT * FROM data_lazada  LEFT JOIN barcode ON barcode.nama = data_lazada.kolom_59 WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_59 like '%$key%' OR kolom_13 like '%$key%' limit 50";
    $jml = $this->db->query("SELECT * FROM data_lazada LEFT JOIN barcode ON barcode.nama = data_lazada.kolom_59  WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_59 like '%$key%' OR kolom_13 like '%$key%'")->num_rows();
}else{
     $sql="SELECT * FROM data_lazada LEFT JOIN barcode ON barcode.nama = data_lazada.kolom_59  WHERE fid_member='".$_SESSION['id']."' limit 50";
      $jml = $this->db->query("SELECT * FROM data_lazada LEFT JOIN barcode ON barcode.nama = data_lazada.kolom_59  WHERE fid_member='".$_SESSION['id']."'")->num_rows();
}

?>



<div style="padding-bottom:1%;padding-top:1%">
    Total Data lazada : <strong><?php echo number_format($jml)  ?></strong>
</div>
<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead  style="color:white;background:#006AFF">
	  			<tr>
    	  			<th>No</th>
    	  		        <th>orderItemId</th>
    	  		        <th>Status Scan</th>
                        <th>orderType</th>
                        <th>Guarantee</th>
                        <th>deliveryType</th>
                        <th>lazadaId</th>
                        <th>sellerSku</th>
                        <th>lazadaSku</th>
                        <th>wareHouse</th>
                        <th>createTime</th>
                        <th>updateTime</th>
                        <th>rtsSla</th>
                        <th>ttsSla</th>
                        <th>orderNumber</th>
                        <th>invoiceRequired</th>
                        <th>invoiceNumber</th>
                        <th>deliveredDate</th>
                        <th>customerName</th>
                        <th>customerEmail</th>
                        <th>nationalRegistrationNumber</th>
                        <th>shippingName</th>
                        <th>shippingAddress</th>
                        <th>shippingAddress2</th>
                        <th>shippingAddress3</th>
                        <th>shippingAddress4</th>
                        <th>shippingAddress5</th>
                        <th>shippingPhone</th>
                        <th>shippingPhone2</th>
                        <th>shippingCity</th>
                        <th>shippingPostCode</th>
                        <th>shippingCountry</th>
                        <th>shippingRegion</th>
                        <th>billingName</th>
                        <th>billingAddr</th>
                        <th>billingAddr2</th>
                        <th>billingAddr3</th>
                        <th>billingAddr4</th>
                        <th>billingAddr5</th>
                        <th>billingPhone</th>
                        <th>billingPhone2</th>
                        <th>billingCity</th>
                        <th>billingPostCode</th>
                        <th>billingCountry</th>
                        <th>taxCode</th>
                        <th>branchNumber</th>
                        <th>taxInvoiceRequested</th>
                        <th>payMethod</th>
                        <th>paidPrice</th>
                        <th>unitPrice</th>
                        <th>sellerDiscountTotal</th>
                        <th>shippingFee</th>
                        <th>walletCredit</th>
                        <th>itemName</th>
                        <th>variation</th>
                        <th>cdShippingProvider</th>
                        <th>shippingProvider</th>
                        <th>shipmentTypeName</th>
                        <th>shippingProviderType</th>
                        <th>cdTrackingCode</th>
                        <th>trackingCode</th>
                        <th>trackingUrl</th>
                        <th>shippingProviderFM</th>
                        <th>trackingCodeFM</th>
                        <th>trackingUrlFM</th>
                        <th>promisedShippingTime</th>
                        <th>premium</th>
                        <th>status</th>
                        <th>buyerFailedDeliveryReturnInitiator</th>
                        <th>buyerFailedDeliveryReason</th>
                        <th>buyerFailedDeliveryDetail</th>
                        <th>buyerFailedDeliveryUserName</th>
                        <th>bundleId</th>
                        <th>bundleDiscount</th>
                        <th>refundAmount</th>

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
		  				
		  				
		  				<td><?php echo $row->kolom_1 ?></td>
		  					<td> <?php echo $icon ?> <?php echo $txt ?></td>
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
                        <td><?php echo $row->kolom_41 ?></td>
                        <td><?php echo $row->kolom_42 ?></td>
                        <td><?php echo $row->kolom_43 ?></td>
                        <td><?php echo $row->kolom_44 ?></td>
                        <td><?php echo $row->kolom_45 ?></td>
                        <td><?php echo $row->kolom_46 ?></td>
                        <td><?php echo $row->kolom_47 ?></td>
                        <td><?php echo $row->kolom_48 ?></td>
                        <td><?php echo $row->kolom_49 ?></td>
                        <td><?php echo $row->kolom_50 ?></td>
                        <td><?php echo $row->kolom_51 ?></td>
                        <td><?php echo $row->kolom_52 ?></td>
                        <td><?php echo $row->kolom_53 ?></td>
                        <td><?php echo $row->kolom_54 ?></td>
                        <td><?php echo $row->kolom_55 ?></td>
                        <td><?php echo $row->kolom_56 ?></td>
                        <td><?php echo $row->kolom_57 ?></td>
                        <td><?php echo $row->kolom_58 ?></td>
                        <td><?php echo $row->kolom_59 ?></td>
                        <td><?php echo $row->kolom_60 ?></td>
                        <td><?php echo $row->kolom_61 ?></td>
                        <td><?php echo $row->kolom_62 ?></td>
                        <td><?php echo $row->kolom_63 ?></td>
                        <td><?php echo $row->kolom_64 ?></td>
                        <td><?php echo $row->kolom_65 ?></td>
                        <td><?php echo $row->kolom_66 ?></td>
                        <td><?php echo $row->kolom_67 ?></td>
                        <td><?php echo $row->kolom_68 ?></td>
                        <td><?php echo $row->kolom_69 ?></td>
                        <td><?php echo $row->kolom_70 ?></td>
                        <td><?php echo $row->kolom_71 ?></td>
                        <td><?php echo $row->kolom_72 ?></td>
                        <td><?php echo $row->kolom_73 ?></td>


		  				

		  				
                	  			
                	  		
                	  			
		  			
		  				<td>
		  				
		  	

		  					<a href="<?php echo site_url('marketplace/lazada_delete/'.$row->id_lazada) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


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