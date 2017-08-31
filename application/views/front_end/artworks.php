<!-- NAVIGATION -->
<?php $this->load->view('front_end/includes/navigation.php'); ?>

<section class="artworks_header">
	<div class="inner_container"></div>
</section>

<section class="artworks_description">
	<div class="inner_container">
		<div class="header_image_container" style="background-image: url('<?php echo base_url() . $artworks_datas->header_picture; ?>');" ></div>
		<div class="breadcrumb">
			<a href="<?php echo base_url() . 'artists/' . $artworks_datas->artist_id?>" class="link blue">< Go Back to the the Collection</a>
		</div>
		<div class="title_container">
			<div class="inner_container_container">
				<h3><?php echo $artworks_datas->name; ?></h3>
				<h3><?php echo $artworks_datas->year; ?></h3><br>
				<div class="text">
					<p>Composition;</p>
					<p><?php echo $artworks_datas->medium; ?></p>
				</div>
			</div>
		</div>
		<div class="description_container">
			<div class="inner_container_container">
				<h3>description</h3>
				<p><?php echo $artworks_datas->description; ?></p>
			</div>
		</div>
		<div class="price_container">
			<div class="inner_container_container">
				<?php if( $artworks_datas->availability == 'available'){?>
					<h2 class="blue"><?php echo $artworks_datas->price; ?> dollars</h2>
					<a href="<?php echo base_url() . 'payment-your-address'; ?>" class="button blue">Buy the item</a>
				<?php }else if( $artworks_datas->availability == 'contact_curator'){ ?>
					<h2 class="grey">Contact the curator</h2>
					<a href="support-us" class="button blue">Contact the curator</a>
				<?php }else if( $artworks_datas->availability == 'sold'){ ?>
					<h2 class="grey"><?php echo $artworks_datas->price; ?></h2>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="artworks_same_collection artwork_cards">
	<div class="inner_container">
		<div class="header">
			<h3>In the Same Collection</h3>
		</div>
		<div class="body">
			<ul>
				<li>
					<span class="border"></span>
					<div class="artwork_container">
						<div class="imgage_container" style="background-image: url('<?php echo base_url(); ?>assets/uploads/artists/thumbnail_picture/gallery_thumbnail_picture_2.jpg');"></div>
						<h4>Zuzu Gavola</h4>
						<a href="#" class="link blue">Learn More</a>
					</div>
				</li>
				<li>
					<span class="border"></span>
					<div class="artwork_container">
						<div class="imgage_container" style="background-image: url('<?php echo base_url(); ?>assets/uploads/artists/thumbnail_picture/gallery_thumbnail_picture_2.jpg');"></div>
						<h4>Zuzu Gavola</h4>
						<a href="#" class="link blue">Learn More</a>
					</div>
				</li>
				<li>
					<span class="border"></span>
					<div class="artwork_container">
						<div class="imgage_container" style="background-image: url('<?php echo base_url(); ?>assets/uploads/artists/thumbnail_picture/gallery_thumbnail_picture_2.jpg');"></div>
						<h4>Zuzu Gavola</h4>
						<a href="#" class="link blue">Learn More</a>
					</div>
				</li>
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