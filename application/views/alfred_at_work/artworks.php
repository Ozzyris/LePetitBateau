	<!-- NAVIGATION -->
	<?php $this->load->view('alfred_at_work/includes/navigation.php'); ?>

	<nav class="breadcrumb">
		<p><span>></span><span><a href="<?php echo base_url(); ?>alfredatwork/gallery">Gallery</a><span>></span><a class="disabled" href="#"><?php echo $artist_name; ?></a></p>
	</nav>

	<section id="content">
  
		<?php if( $artworks_datas != null ){ ?>

			<?php  foreach ($artworks_datas as $datas): ?>
				<article class="object <?php  if($datas->status == 0){ echo 'archive'; } ?>" id="art_<?php  echo $datas->id; ?>">
					<div class="header" style="background-image: url(<?php echo base_url() . $datas->thumbnail_picture; ?>)">
						<div class="action">
							<a class="icon edit" href="<?php echo base_url(); ?>alfredatwork/artwork-details/<?php echo $datas->id; ?>">&#xf040;</a>
							<a class="icon cancel <?php if($datas->status == 1 ){ echo 'hidden'; }?>" onclick="alert_factory({ type: 'create', element_id: <?php  echo $datas->id; ?>, status: 'error', message: 'Are you sure you want to delete this product?' });">&#xf014;</a>
						</div>
					</div>
					<div class="body">
						<br>
						<h2><?php  echo $datas->name; if( $datas->year != '' ){ echo ', ' . $datas->year;} ?></h2>
						<br>
						<div class="switch_container" action="#" >
							<span class="switch <?php if($datas->status == 1 ){ echo 'active'; }?>" onclick="switch_status( event, <?php  echo $datas->id; ?> );"></span>
						</div>
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

    	<a onclick="tooltype_factory( 'artworks' ); return false;" id="floatting_button">
    	  <span class="plus elem-1"></span>
    	  <span class="plus elem-2"></span>
    	</a>

	</section>

	<!-- Script -->
	<?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
    <script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/artworks.js"></script>
</body>
</html>