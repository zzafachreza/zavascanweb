<style>
    .p-inputtext {
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol;
    font-size: 1rem;
    color: #495057;
    background: #ffffff;
    padding: .75rem;
    border: 1px solid #ced4da;
    transition: background-color .2s,color .2s,border-color .2s,box-shadow .2s;
    appearance: none;
    border-radius: 6px
}

.p-inputtext:enabled:hover {
    border-color: #14b8a6
}

.p-inputtext:enabled:focus {
    outline: 0 none;
    outline-offset: 0;
    box-shadow: 0 0 0 .2rem #99f6e4;
    border-color: #14b8a6
}

.p-inputtext.ng-dirty.ng-invalid {
    border-color: #e24c4c
}

.p-inputtext.p-inputtext-sm {
    font-size: .875rem;
    padding: .65625rem
}

.p-inputtext.p-inputtext-lg {
    font-size: 1.25rem;
    padding: .9375rem
}
</style>
  

 
<div class="flex align-items-stretch justify-content-center min-h-screen min-w-screen">
    <div class="flex flex-row w-full">
        <div class="flex-1 bg-no-repeat bg-center" style="background: url('art.png'); background-size: 40vw;"></div>
        <div class="flex-initial bg-white py-5" style="width: 448px;">
            <div class="flex flex-column align-items-center justify-content-center h-full gap-5"><div>
                <img src="<?php echo site_url('round.svg') ?>" alt="logo"></div>
                <div class="flex flex-column align-items-center justify-content-center pb-5" style="color: #000; font-size: 25px; font-weight: 700;">
                    <div>Welcome To</div>
                    <div class="text-primary">Zavascan</div>
                </div>
                
                <form id="dataFormLogin" class="flex flex-column w-full p-fluid gap-4 ng-untouched ng-pristine ng-invalid" style="padding: 0 50px;">
                   <div class="field p-input-filled">
                         <label htmlfor="email">Email</label>
                          <input required="required" type="email" name="email" class="p-inputtext p-component p-element ng-untouched ng-pristine ng-invalid">
                    </div>
                    
                    <div class="field p-input-filled">
                         <label htmlfor="password">Password</label>
                          <input required="required" type="password" name="password"  class="p-inputtext p-component p-element ng-untouched ng-pristine ng-invalid">
                    </div>
             
               
              
          <button pripple="" class="p-ripple p-element p-button p-component" type="submit"><!----><!----><!----><!----><!----><!----><span class="p-button-label ng-star-inserted">Log in</span><!----><!----><span class="p-ink" style="height: 281px; width: 281px; top: -130.5px; left: 108.5px;"></span></button>
          
           <button pripple="" onClick="window.location.href='https://wa.me/6281312924040?text=Hallo%20admin%20mau%20coba%20demo%20aplikasi%20*ZAVASCAN*%20dong...'" class="p-ripple p-element p-button p-component" type="submit"><!----><!----><!----><!----><!----><!----><span class="p-button-label ng-star-inserted">Hubungi Admin untuk login</span><!----><!----><span class="p-ink" style="height: 281px; width: 281px; top: -130.5px; left: 108.5px;"></span></button>
            </form> 
                
                                                                

                                        
                                        
                                        
                                    
                                    
                                    
                                    
  
 
  
<script>
    $("#dataFormLogin").submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url:'./login/validasi',
			type:'POST',
			data:data,
			beforeSend:function(){
 				$("#loader").fadeIn('slow');
			},
			success:function(data){

				setTimeout(function(){
				  $("#loader").fadeOut('fast');
				   if (data==200) {
					location.href = './';
					}else{

						 alert("Maaf username atau password Anda salah !","error");
		
						
					}
				},1500)
			}
		})
	})
</script>