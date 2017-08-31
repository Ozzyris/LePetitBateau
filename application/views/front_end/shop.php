<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

	<section class="shop_header">
		<div class="inner_container">
			<h3>Shop</h3>
		</div>
	</section>
	
	<section class="shop_last_discovery artwork_cards">
		<div class="inner_container">
			<div class="header">
				<h3>Our last Discovery</h3>
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
		</div>
	</section>

	<section class="shop_all_collections artwork_cards">
		<div class="inner_container">
			<div class="header">
				<h3>All the Collections</h3>
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
		</div>
	</section>

	<section class="display_more">
		<div class="inner_container">
			<a href="#" class="button ghost">Display More</a>
		</div>
	</section>

<!-- NEWSLETTER -->
<?php $this->load->view('front_end/includes/newsletter.php'); ?>

<!-- FOOTER -->
<?php $this->load->view('front_end/includes/footer.php'); ?>

<!-- SCRIPTS -->
<?php $this->load->view('front_end/includes/scripts.php'); ?>