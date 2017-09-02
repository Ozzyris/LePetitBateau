<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

	<section class="shop_header">
		<div class="inner_container">
			<h3>Your Summary</h3>
		</div>
		<span class="waves"></span>
	</section>

	<section class="breadcrumb">
		<p>
			<a class="active" >Address</a>  >  <a>Verification & Payment</a>  >  <a>Confirmation</a>
		</p>
	</section>

	<section id="recapitulatif">
		<div id="address">
		  <p>Nicol Alexandre</p>
		  <p>nemokervi@yahoo.fr</p>
		  <p>Kervehennec</p>
		  <p>56700</p>
		  <p>NSW</p>
		  <p>Kervignac</p>
		  <p>Australia</p>
		</div>
		<div id="product">
			<div>
				<p>Name: Artwork 1</p>
				<p>Artist: Artist 1</p>
				<p>Price: 500 $AUD</p>
				<p>Delivery fee: 20 $AUD</p>
			</div>
		</div>

		<form action="processing/payment_recapitulatif_process.php" method="post">
<!-- 			<script
				src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				data-key="pk_test_XuHd0qhNgOgHw9GIUIfNwScc"
				data-amount="<?php echo $total_price; ?>"
				data-name="<?php echo $name; ?>"
				data-description="1 canvas from <?php echo $artist; ?>"
				data-image="//lepetitbateau.com.au/img/uploads/<?php echo $thumb_pict; ?>"
				data-locale="auto">
			</script> -->
			<input type="hidden" name="product_id" value="1" /> 
			<input type="hidden" name="customer_id" value="alex" /> 
		</form>
	</section>

	

<!-- NEWSLETTER -->
<?php $this->load->view('front_end/includes/newsletter.php'); ?>

<!-- FOOTER -->
<?php $this->load->view('front_end/includes/footer.php'); ?>

<!-- SCRIPTS -->
<?php $this->load->view('front_end/includes/scripts.php'); ?>
<script src="<?php echo base_url(); ?>assets/front_end/scripts/payment_address.js"></script>
