<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

	<section class="shop_header">
		<div class="inner_container">
			<h3>Your Informations</h3>
		</div>
		<span class="waves"></span>
	</section>

	<section class="breadcrumb">
		<p>
			<a class="active" >Address</a>  >  <a>Verification & Payment</a>  >  <a>Confirmation</a>
		</p>
	</section>

	<section class="payment_user_information">
		<div class="header"></div>
		<div class="body">
			<form class="form_payment_adress">
				<input id="input_artworkId" type="hidden" value="1"/>

				<div class="input_container">
					<div class="input_group text">
						<label>First Name</label>
						<input id="input_firstName" name="input_name" type="text" value="Alexandre" />
						<p></p>
					</div>
					<div class="input_group text">
						<label>Last Name</label>
						<input id="input_lastName" name="input_surname" type="text" value="Nicol"/>
						<p></p>
					</div>
				</div>
				<div class="input_container">
					<div class="input_group text">
						<label>Email</label>
						<input id="input_email" name="input_email" type="email" value="nemokervi@yahoo.fr" />
						<p></p>
					</div>
				</div>
				<div class="input_container">
					<div class="input_group text">
						<label>Address</label>
						<input id="input_address" name="input_adress" type="text" value="Kervehennec" />
						<p></p>
					</div>
				</div>
				<div class="input_container">
					<div class="input_group text">
						<label>Post Code</label>
						<input id="input_postalcode" name="input_postalcode" type="text" value="56700" />
						<p></p>
					</div>
					<div class="input_group select">
						<label>Region</label>
						<div class="selectwrapper">
							<select name="input_region" id="input_region">
								<option value="" disabled selected>Select a region</option>
								<option value="ACT">Australian Capital Territory</option>
								<option value="NSW" selected>New South Wales</option>
								<option value="NT">Northern Territory</option>
								<option value="QLD">Queensland</option>
								<option value="SA">South Australia</option>
								<option value="TAS">Tasmania</option>
								<option value="VIC">Victoria</option>
								<option value="WA">Western Australia</option>
							</select>
						</div>
						<p></p>
					</div>
				</div>
				<div class="input_container">
					<div class="input_group text">
						<label>City</label>
						<input id="input_city" name="input_city" type="text" value="Kervignac" />
						<p></p>
					</div>
				</div>
				<div class="input_container">
					<div class="input_group select">
						<label>Country</label>
						<div class="selectwrapper">
							<select name="input_country" id="input_country">
								<option value="" disabled selected>Select a country</option>
								<option value="Australia" selected>Australia</option>
							</select>
						</div>
						<p></p>
					</div>
				</div>
				<!-- <input type="hidden" name="product_id" value="<?php echo $id; ?>" /> -->
				<!-- <input type="hidden" id="country_code_id" name="country_code" value="" /> -->
			</form>
		</div>
		<div class="footer">
			<a onclick="verification_payment_adress();" class="button blue">Next Step</a>
		</div>
	</section>

<!-- NEWSLETTER -->
<?php $this->load->view('front_end/includes/newsletter.php'); ?>

<!-- FOOTER -->
<?php $this->load->view('front_end/includes/footer.php'); ?>

<!-- SCRIPTS -->
<?php $this->load->view('front_end/includes/scripts.php'); ?>
<script src="<?php echo base_url(); ?>assets/front_end/scripts/payment_address.js"></script>
