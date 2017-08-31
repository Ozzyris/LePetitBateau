<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

<section class="support_header">
	<div class="inner_container">
		<h3>Support Us</h3>
	</div>
</section>

<section class="support_main_team">
	<div class="inner_containter">
		<ul>
			<li>
				<div class="body">
					<div style="background-image: url('<?php echo base_url(); ?>assets/front_end/images/IMG_anso.jpg')" class="image_container"></div>
				</div>
				<div class="footer">
					<p>AnSo Ridelaire</p>
					<p>Art Director - sociologist</p>
				</div>
			</li>
			<li>
				<div class="body">
					<div style="background-image: url('<?php echo base_url(); ?>assets/front_end/images/IMG_gaetano.jpg')" class="image_container"></div>
				</div>
				<div class="footer">
					<p>Gaetano Russo</p>
					<p>Director & Designer</p>
				</div>
			</li>
		</ul>
	</div>
</section>

<section class="support_secondary_team">
	<div class="inner_containter">
		<ul>
			<li>
				<div class="body">
					<div style="background-image: url('<?php echo base_url(); ?>assets/front_end/images/IMG_julie.jpg')" class="image_container"></div>
				</div>
				<div class="footer">
					<p>Julie Lassabliere</p>
					<p>Marketing manager</p>
				</div>
			</li>
			<li>
				<div class="body">
					<div style="background-image: url('<?php echo base_url(); ?>assets/front_end/images/IMG_ezequiel.jpg')" class="image_container"></div>
				</div>
				<div class="footer">
					<p>Ezequiel Zaccardi</p>
					<p>Photogapher</p>
				</div>
			</li>
			<li>
				<div class="body">
					<div style="background-image: url('<?php echo base_url(); ?>assets/front_end/images/IMG_manuela.jpg')" class="image_container"></div>
				</div>
				<div class="footer">
					<p>Manuela Tommasone</p>
					<p>Graphic Designer</p>
				</div>
			</li>
		</ul>
	</div>
</section>

<section class="support_who_we_are">
	<div class="inner_container">
		<div class="header">
			<h3>Who are we?</h3>
		</div>
		<div class="body">
			<p>“Sharing our culture is the beginning of creativity“</p>
			<p>Le Petit Bateau (“the little boat”) is an art collective launched in May 2014. Everything started in a garage and backyard space at the rear of a residential building, kitted out by Anne-Sophie Ridelaire (AnSo), a curator from France, and her husband Gaetano Russo (Tano), an Italian boat designer.</p>
			<p>LPB prides itself on building a platform for many local and international creative’s, be it visual artists, performers, musicians, designers, architects, carpenters…basically any form of art! Together they work on this common goal to promote Art and Culture and make it accessible to everyone.</p>
			<p>Based in Sydney, France and Italy, the collective organize regularly, exhibitions, art installation, performances, documentary projection, festivals, movie premiere and private function. Each event is respecting the values and causes that LPB defends: Ecology, Art and Sharing.</p>
		</div>
	</div>
</section>

<section class="support_partner">
	<div class="inner_container">
		<div class="header">
			<h3>They support us</h3>
		</div>
		<div class="body">
			<ul>
				<li>
					<a href="#" class="image_container">
						<img src="#" alt="">
					</a>
				</li>
			</ul>
		</div>
		
	</div>
</section>

<section class="support_join">
	<div class="inner_container">
		<div class="header">
			<h3>Join the boat</h3>
		</div>
		<div class="body">
			<div class="input_container">
				<label for="join_email">Email Address*</label>
				<input type="text" id="join_email">
			</div>
			<div class="input_container">
				<label for="join_title">Email Title*</label>
				<input type="text" id="join_title">
			</div>
			<div class="input_container">
				<label for="join_message">The Message*</label>
				<textarea id="join_message"></textarea>
			</div>
		</div>
		<div class="footer">
			<a href="#" class="button join_submit">Submit</a>
		</div>
	</div>
</section>


<!-- NEWSLETTER -->
<?php $this->load->view('front_end/includes/newsletter.php'); ?>

<!-- FOOTER -->
<?php $this->load->view('front_end/includes/footer.php'); ?>

<!-- SCRIPTS -->
<?php $this->load->view('front_end/includes/scripts.php'); ?>