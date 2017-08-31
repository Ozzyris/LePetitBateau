	<!-- NAVIGATION -->
	<?php $this->load->view('alfred_at_work/includes/navigation.php'); ?>

	<section id="content">
  
		<?php if( $gallery_datas != null ){ ?>

			<?php  foreach ($gallery_datas as $datas): ?>
				<article class="object <?php  if($datas->status == 0){ echo 'archive'; } ?>" id="artist_<?php  echo $datas->id; ?>">
					<div class="header" style="background-image: url(<?php echo base_url() . $datas->thumbnail_picture; ?>)">
						<div class="action">
							<a class="icon edit" href="<?php echo base_url(); ?>alfredatwork/gallery-details/<?php echo $datas->id; ?>">&#xf040;</a>
							<a class="icon cancel <?php if($datas->status == 1 ){ echo 'hidden'; }?>" onclick="alert_factory({ type: 'create', element_id: <?php  echo $datas->id; ?>, status: 'error', message: 'Are you sure you want to delete this product?' });">&#xf014;</a>
						</div>
					</div>
					<div class="body">
						<br>
						<h2><?php  echo $datas->name; ?></h2>
						<br>
						<div class="switch_container" action="#" >
							<span class="switch <?php if($datas->status == 1 ){ echo 'active'; }?>" onclick="switch_status( event, <?php  echo $datas->id; ?> );"></span>
						</div>
						<a href="<?php echo base_url(); ?>alfredatwork/artworks/<?php echo $datas->id; ?>" class="button blue">See Artworks</a>
					</div>
				</article>
			<?php  endforeach ?>

		<?php }else{ ?>

			<div class="noproduct">
				<img src="<?php echo base_url(); ?>assets/alfred_at_work/images/ELEM_noproduct.svg" alt="fire camp">
				<h2>You don't have any product in this category yet!</h2>
				<p>Add one with the "plus" button on the top!</p>
			</div>
		<?php } ?>

    	<a onclick="tooltype_factory( 'gallery' ); return false;" id="floatting_button">
    	  <span class="plus elem-1"></span>
    	  <span class="plus elem-2"></span>
    	</a>

	</section>

	<!-- Script -->
	<?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
    <script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/gallery.js"></script>
</body>
</html>