<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

	<header class="home_header">
		<img src="<?php echo base_url(); ?>assets/front_end/images/LOGO_lpb.jpg" alt="Le Petit Bateau">
	</header>

	<section class="home_collections artwork_cards">
		<div class="inner_container">
			<div class="header">
				<h3>The Collections</h3>
			</div>
			<div class="body">
				<ul>
					<?php foreach ($artists_datas as $datas): ?>
						<li>
							<span class="border"></span>
							<div class="artwork_container">
								<div class="imgage_container" style="background-image: url('<?php echo base_url() . $datas->thumbnail_picture; ?>');"></div>
								<h4><?php echo $datas->name; ?></h4>
								<a href="<?php echo base_url() . 'artists/' . $datas->id; ?>" class="link blue">Learn More</a>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="footer">
				<a href="<?php echo base_url(); ?>shop" class="link blue">See all collections</a>
			</div>
		</div>
	</section>

	<section class="home_discover artwork_cards">
		<div class="inner_container">
			<div class="header">
				<h3>Our last Discovers</h3>
			</div>
			<div class="body">
				<ul>
					<?php foreach ($artworks_datas as $datas): ?>
					<li>
						<span class="border"></span>
						<div class="artwork_container">
							<div class="imgage_container" style="background-image: url('<?php echo base_url() . $datas->thumbnail_picture; ?>');"></div>
							<h4><?php echo $datas->name; ?></h4>
							<a href="<?php echo base_url() . 'artwork/' . $datas->id; ?>" class="link blue">Learn More</a>
						</div>
					</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="footer">
				<a href="<?php echo base_url(); ?>shop" class="link blue">See all collections</a>
			</div>
		</div>
	</section>

	<section class="home_who_we_are" style="background-image: url('<?php echo base_url(); ?>assets/front_end/images/BG_introduction.png')">
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

	<section class="find_the_boat">
		<div class="inner_container">
			<div class="left_container">
				<img src="<?php echo base_url(); ?>assets/front_end/images/ILLUSTRATION_where_is_the_boat.png" alt="Where is the boeat illustration">
			</div>
			<div class="right_container">
				<div>
					<h3>Find the boat and join us to celebrate art in 360 degrees !</h3>
					<a href="https://www.facebook.com/lepetitbateaubondi/" target="_blank" class="button ghost">Start looking</a>			
				</div>
			</div>
		</div>
	</section>

	<section class="home_event event_cards">
		<div class="inner_container">
			<div class="left_container">
				<h3>New Event to come</h3>
				<div class="card_event">
					<span class="border"></span>
					<div class="event_container">
						<div class="image_container" style="background-image: url('<?php echo base_url(); ?>assets/uploads/artists/thumbnail_picture/gallery_thumbnail_picture_2.jpg')"></div>
						<h4>Vivid Sydney 2017</h4>
						<a href="#" class="link blue">Learn More</a>
					</div>
				</div>
			</div>
			<div class="right_container">
				<h3>Our Previous Event</h3>
				<div class="card_event">
					<span class="border"></span>
					<div class="event_container">
						<div class="image_container" style="background-image: url('<?php echo base_url(); ?>assets/uploads/artists/thumbnail_picture/gallery_thumbnail_picture_2.jpg')"></div>
						<h4>Open exhibition Zuzu Gralova</h4>
						<a href="#" class="link blue">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- NEWSLETTER -->
<?php $this->load->view('front_end/includes/newsletter.php'); ?>

<!-- FOOTER -->
<?php $this->load->view('front_end/includes/footer.php'); ?>

<!-- SCRIPTS -->
<?php $this->load->view('front_end/includes/scripts.php'); ?>
