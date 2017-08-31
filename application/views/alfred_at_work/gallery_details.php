	<!-- NAVIGATION -->
	<?php $this->load->view('alfred_at_work/includes/navigation.php'); ?>

	<nav class="breadcrumb">
		<p><span>></span><span><a href="<?php echo base_url(); ?>alfredatwork/gallery">Gallery</a><span>></span><a class="disabled" href="#"><?php echo $gallery_datas->name; ?></a></p>
	</nav>

	<section id="content">

		<input type="hidden" id="input_id" value="<?php echo $gallery_datas->id; ?>">

		<article class="card">
			<div class="header yellow">
				<h1>Gallery &#183; Highlight</h1>
			</div>
			<div class="body">
				<p style="width:100%; text-align:center; color:#303030; font-size:1.6rem; font-weight:200;">If the collection is highlighted, it will apprear on the dropdown menu.<br><br> A maximum of 10 collections are authorized.</p>
				<div class="switch_container" action="#" >
					<span class="switch <?php if($gallery_datas->highlight == 1 ){ echo 'active'; }?>" onclick="main_verification( 'highlight' ); return false;"></span>
				</div>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Gallery &#183; Real Name</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_real_name">Real Name</label>
					<input type="text" id="input_real_name" class="classic_input" value="<?php echo $gallery_datas->name; ?>">
				</div> 
				<a onclick="main_verification( 'real_name' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Gallery &#183; Artist Name</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_artist_name">Artist Name</label>
					<input type="text" id="input_artist_name" class="classic_input" value="<?php echo $gallery_datas->artist_name; ?>">
				</div> 
				<a onclick="main_verification( 'artist_name' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Gallery &#183; Website</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_website">Website</label>
					<input type="text" id="input_website" class="classic_input" value="<?php echo $gallery_datas->website; ?>">
				</div> 
				<a onclick="main_verification( 'website' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Gallery &#183; Phone</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_phone">Phone</label>
					<input type="text" id="input_phone" class="classic_input" value="<?php echo $gallery_datas->phone; ?>">
				</div> 
				<a onclick="main_verification( 'phone' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card">
			<div class="header yellow">
				<h1>Gallery &#183; Description</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_description">Description</label>
					<textarea id="input_description" class="classic_input"><?php echo $gallery_datas->description; ?></textarea>
				</div> 
				<a onclick="main_verification( 'description' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Gallery &#183; Header (1280px x 600px)</h1>
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
				<h1>Gallery &#183; Thumbnail (300px x 300px)</h1>
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
	<script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/gallery_details.js"></script>
</body>
</html>