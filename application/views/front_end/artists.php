<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

	<section class="shop_header">
		<div class="inner_container">
			<h3><?php echo $artist_datas->name; ?></h3>
		</div>
	</section>
	
	<section class="artists_description">
		<div class="inner_container">
			<p><?php echo html_entity_decode(mb_convert_encoding(stripslashes($artist_datas->description), "HTML-ENTITIES", 'UTF-8')); ?></p>
		</div>
	</section>

	<section class="artists_all_artworks artwork_cards">
		<div class="inner_container">
			<div class="header">
				<h3>All the Artworks</h3>
			</div>
			<div class="body">
				<ul>
					<?php foreach ($artworks_datas as $datas): ?>
						<li>
							<span class="border"></span>
							<div class="artwork_container">
								<div class="imgage_container" style="background-image: url('<?php echo base_url() . $datas->thumbnail_picture; ?>');"></div>
								<h4><?php echo $datas->name; ?></h4>
								<a href="<?php echo base_url() . 'artworks/' . $datas->id; ?>" class="link blue">Learn More</a>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</section>

<!-- NEWSLETTER -->
<?php $this->load->view('front_end/includes/newsletter.php'); ?>

<!-- FOOTER -->
<?php $this->load->view('front_end/includes/footer.php'); ?>

<!-- SCRIPTS -->
<?php $this->load->view('front_end/includes/scripts.php'); ?>