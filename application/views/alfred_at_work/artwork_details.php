	<!-- NAVIGATION -->
	<?php $this->load->view('alfred_at_work/includes/navigation.php'); ?>

	<nav class="breadcrumb">
		<p>
			<span>></span>
			<a href="<?php echo base_url(); ?>alfredatwork/gallery">Gallery</a>
			<span>></span>
			<a href="<?php echo base_url(); ?>alfredatwork/artworks/<?php echo $artist_datas->id; ?>"><?php echo (strlen($artist_datas->name) > 15) ? substr($artist_datas->name,0,15).'...' : $artist_datas->name; ?></a>
			<span>></span>
			<a class="disabled" href="#"><?php echo (strlen($artwork_datas->name) > 25) ? substr($artwork_datas->name,0,25).'...' : $artwork_datas->name; ?></a>
		</p>
	</nav>

	<section id="content">

		<input type="hidden" id="input_id" value="<?php echo $artwork_datas->id; ?>">

		<article class="card half">
			<div class="header yellow">
				<h1>Artwork &#183; Name</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_name">Name</label>
					<input type="text" id="input_name" class="classic_input" value="<?php echo $artwork_datas->name; ?>">
				</div> 
				<a onclick="main_verification( 'name' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Artwork &#183; Year</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_year">Year</label>
					<input type="text" id="input_year" class="classic_input" value="<?php echo $artwork_datas->year; ?>">
				</div> 
				<a onclick="main_verification( 'year' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Artwork &#183; Medium</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_medium">Medium</label>
					<input type="text" id="input_medium" class="classic_input" value="<?php echo $artwork_datas->medium; ?>">
				</div> 
				<a onclick="main_verification( 'medium' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Artwork &#183; Price</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_price">Price</label>
					<input type="number" id="input_price" class="classic_input" value="<?php echo $artwork_datas->price; ?>">
				</div> 
				<a onclick="main_verification( 'price' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card">
			<div class="header yellow">
				<h1>Artwork &#183; Availability</h1>
			</div>
			<div class="body">
          		<div class="input_group" data-toggle="buttons" style="width: calc(100% - 60px);">
          		  <label class="checkbox_input" for="available_input">
          		    <input name="availability" id="available_input" <?php if($artwork_datas->availability == 'available'){ echo 'checked';} ?> type="radio">
          		    <i class="icon unchecked"></i>
          		    <i class="icon checked"></i>
          		    <span>Availbable</span>
          		  </label>
          		</div>
          		<div class="input_group" data-toggle="buttons" style="width: calc(100% - 60px);">
          		  <label class="checkbox_input" for="sold_input">
          		    <input name="availability" id="sold_input" type="radio" <?php if($artwork_datas->availability == 'sold'){ echo 'checked';} ?>>
          		    <i class="icon unchecked"></i>
          		    <i class="icon checked"></i>
          		    <span>Sold</span>
          		  </label>
          		</div>
          		<div class="input_group" data-toggle="buttons" style="width: calc(100% - 60px);">
          		  <label class="checkbox_input" for="contact_curator_input">
          		    <input name="availability" id="contact_curator_input" type="radio" <?php if($artwork_datas->availability == 'contact_curator'){ echo 'checked';} ?>>
          		    <i class="icon unchecked"></i>
          		    <i class="icon checked"></i>
          		    <span>Contact The Curator</span>
          		  </label>
          		</div>
        
				<a onclick="main_verification( 'availability' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card">
			<div class="header yellow">
				<h1>Artwork &#183; Description</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_description">Description</label>
					<textarea id="input_description" class="classic_input"><?php echo $artwork_datas->description; ?></textarea>
				</div> 
				<a onclick="main_verification( 'description' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Artwork &#183; Header (1280px x 600px)</h1>
			</div>
			<div class="body">
				<div class="upload_group">
					<label for="input_header" class="darg_and_drop" >
						<p>Drop a file or click to select one</p>
						<input id="input_header" class="file_input" type="file" multiple>
					</label>
				</div>
				<ul class="uploads_list">
					<?php if( $media_header_datas->name != ''){ ?>
						<li>
							<?php if( $media_header_datas->type == 'image/jpeg' ){ ?>
								<img src="<?php echo base_url(); ?>assets/alfred_at_work/images/icons/ICON_jpg.svg" alt="icon format">
							<?php }else{ ?>
								<img src="<?php echo base_url(); ?>assets/alfred_at_work/images/icons/ICON_png.svg" alt="icon format">
							<?php } ?>
							<div class="text">
								<p class="title"><?php echo (strlen($media_header_datas->name) > 25) ? substr($media_header_datas->name,0,25).'...' : $media_header_datas->name; ?></p>
								<p class="date">Last update: <?php echo date('d/m/Y @ H:i', $media_header_datas->timestamp); ?></p>	
							</div>
							<a href="<?php echo base_url() . $media_header_datas->url; ?>" target="_blank" class="preview">Preview</a>
						</li>
					<?php } ?>
				</ul>
				<a href="#" onclick="main_verification( 'header_picture' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Artwork &#183; Thumbnail (300px x 300px)</h1>
			</div>
			<div class="body">
				<div class="upload_group">
					<label for="input_thumbnail" class="darg_and_drop" >
						<p>Drop a file or click to select one</p>
						<input id="input_thumbnail" class="file_input" type="file" multiple>
					</label>
				</div>
				<ul class="uploads_list">
					<?php if( $media_thumbnail_datas->name != ''){ ?>
						<li>
							<?php if( $media_thumbnail_datas->type == 'image/jpeg' ){ ?>
								<img src="<?php echo base_url(); ?>assets/alfred_at_work/images/icons/ICON_jpg.svg" alt="icon format">
							<?php }else{ ?>
								<img src="<?php echo base_url(); ?>assets/alfred_at_work/images/icons/ICON_png.svg" alt="icon format">
							<?php } ?>
							<div class="text">
								<p class="title"><?php echo (strlen($media_thumbnail_datas->name) > 25) ? substr($media_thumbnail_datas->name,0,25).'...' : $media_thumbnail_datas->name; ?></p>
								<p class="date">Last update: <?php echo date('d/m/Y @ H:i', $media_thumbnail_datas->timestamp); ?></p>	
							</div>
							<a href="<?php echo base_url() . $media_thumbnail_datas->url; ?>" target="_blank" class="preview">Preview</a>
						</li>
					<?php } ?>
				</ul>
				<a href="#" onclick="main_verification( 'thumbnail_picture' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

	</section>

	<!-- SCRIPTS -->
	<?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
	<script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/artwork_details.js"></script>
</body>
</html>