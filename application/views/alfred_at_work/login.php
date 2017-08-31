	<section id="login">
		<div id="from_container">
			<div class="input_group">
				<label for="input_email">Email</label>
				<input id="input_email" type="text"/>
			</div>
			<div class="input_group">
				<label for="input_password">Password</label>
				<input id="input_password" onKeyPress="if(event.keyCode == 13) login();" type="password" />
				<a href="<?php echo base_url() . 'alfredatwork/forgot-password'; ?>" class="link">forgot password ?</a>

			</div>

			<a onclick="login()" class="input_button blue">Login</a>
			<a href="<?php echo base_url(); ?>alfredatwork/login" class="input_button red">Cancel</a>
			</div>
    	</div>
		<img id="background_img"  src="<?php echo base_url(); ?>assets/alfred_at_work/images/BG_background.svg">	
	</section>
 
    <!-- SCRIPTS -->
	<?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
    <script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/login.js"></script>
  </body>
</html>