</body>

	<!-- area javascript -->
<!--<footer>-->
<!--	<div class="footer">-->
<!--		Copyright	&copy; 2020 by <a href="https://bikinaplikasimurah.com">https://bikinaplikasimurah.com</a>-->
<!--	</div>-->
<!--</footer>-->
</html>
 <script src="https://zavalabs.com/simple.money.format.js"></script>
 <script>
  <?php if($this->session->flashdata('update')){ ?>
	Swal.fire(
	  {
	  	 position: "top-end",
	  icon: "success",
	  title: '<?php echo $this->session->flashdata('update'); ?>',
	  showConfirmButton: false,
	  timer: 800
	  }
    )
<?php } ?>
      $('.uang').simpleMoneyFormat();
 </script>