<div class="container-fluid">
    <form method="POST" action="tokopedia_excel">
        <input value="<?php echo $_SESSION['id'] ?>" name="id_member" type="hidden" />
 <div class="bg-white row" style="margin-top:2%;margin-bottom:2%">
     <div class="col col-sm-2">
         <a href="<?php echo site_url() ?>" class="btn bg-white text-black col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Back</a>
     </div>
      
        <div class="form-group col col-lg-4">
     			  
			    <input autocomplete="off" required="required" type="text" name="awal" class="tgl form-control" value="<?php echo date('d/m/Y') ?>">
			    <small class="form-text text-muted"><i class="flaticon2-calendar-9"></i> Dari Tanggal</small>
	
      </div>
        <div class="form-group col col-lg-4">
     
		
			    <input autocomplete="off" required="required" type="text" name="akhir" class="tgl form-control" value="<?php echo date('d/m/Y') ?>">
			    <small class="form-text text-muted" ><i class="flaticon2-calendar-9"></i> Sampai Tanggal</small>
	
      </div>
      <div class="col col-lg-2">
          <button type="submit" class="btn bg-utama col-sm-12"><i class="flaticon-download"></i> Download</button>
      </div>
</form>
     
      
 </div>
 
 

<div class="row">
    <div class="col col-sm-2">
        <a class="btn bg-utama col-sm-12 text-white" style="color:white;background:#42B549" href="<?php echo site_url() ?>/import_tokopedia?ref_member=<?php echo $_SESSION['id'] ?>">Fitur Import tokopedia</a>
     </div>
    <div class="col col-sm-6" style="padding-bottom:1%">
        <input class="form-control" placeholder="masukan kata kunci" id="key" autocomplete="off" />
    </div>
    <div class="col col-sm-2" style="padding-bottom:1%">
        <button class="btn bg-utama col-sm-12" id="cari">Search</button>
    </div>
    <div class="col col-sm-2" style="padding-bottom:1%">
        <a onClick="return confirm('Sebelum di clear pastikan data sudah di doenload terlebih dahulu ya..')" href="<?php echo site_url() ?>/marketplace/tokopedia_clear/<?php echo $_SESSION['id'] ?>" class="btn bg-danger col-sm-12 text-white" style="border-radius:0px">Clear Data Marketpalce</a>
    </div>
</div>
	  	<div id="data">
	  	    
	  	</div>



</div>

<script type="text/javascript">
$("#csv").change(function(){
   
   $("#dataForm").submit();
    
});

    $("#cari").click(function(){
        var kunci = $("#key").val();
        getData(kunci);
    })
    
        $("#key").change(function(){
        var kunci = $("#key").val();
        getData(kunci);
    })



getData();

	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).text()).select();
	  document.execCommand("copy");
	  $temp.remove();
	}

    function getData(x=''){
        $.ajax({
            url:'tokopedia_get',
            type:'POST',
            data:{
                key:x,
            },success:function(data){
                console.log(data);
                $("#data").html(data);
            }
        })
        
    }

	$(".alink").click(function(e){
		e.preventDefault();
		var link = $(this).attr('data-id');
		$("#p1").text(link);
		copyToClipboard("#p1");
		$(this).removeClass('btn-success');
		$(this).addClass('btn-secondary');

		$(this).text('Copied');
	})
	
	$(document).ready(function() {
    $('.tabza2').DataTable( {
        "scrollX": true
    } );
} );
</script>



