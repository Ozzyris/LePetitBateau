	<!-- NAVIGATION -->
	<?php $this->load->view('alfred_at_work/includes/navigation.php'); ?>

	<nav class="breadcrumb">
		<p>
			<span>></span>
			<a href="<?php echo base_url(); ?>alfredatwork/events">Events</a>
			<span>></span>
			<a class="disabled" href="#"><?php echo (strlen($event_datas->name) > 25) ? substr($event_datas->name,0,25).'...' : $event_datas->name; ?></a>
		</p>
	</nav>

	<section id="content">

		<input type="hidden" id="input_id" value="<?php echo $event_datas->id; ?>">

		<article class="card half">
			<div class="header yellow">
				<h1>Event &#183; Name</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_name">Name</label>
					<input type="text" id="input_name" class="classic_input" value="<?php echo $event_datas->name; ?>">
				</div> 
				<a onclick="main_verification( 'name' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Event &#183; Date</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_date">Date (MM/DD/YYYY)</label>
					<input type="text" id="input_date" class="classic_input" value="<?php echo date('m/d/Y', $event_datas->date); ?>">
				</div> 
				<a onclick="main_verification( 'date' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card">
			<div class="header yellow">
				<h1>Event &#183; Description</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_description">Description</label>
					<textarea id="input_description" class="classic_input"><?php echo $event_datas->description; ?></textarea>
				</div> 
				<a onclick="main_verification( 'description' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Event &#183; Header (1280px x 600px)</h1>
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
				<h1>Event &#183; Thumbnail (300px x 300px)</h1>
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

		<article class="card">
			<div class="header yellow">
				<h1>Event &#183; Address</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_address">Address</label>
					<textarea id="input_address" class="classic_input"><?php echo $event_datas->address; ?></textarea>
				</div> 
				<a onclick="main_verification( 'address' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card">
			<div class="header yellow">
				<h1>Event &#183; Location</h1>
			</div>
			<div class="body">
				MAP
				<a onclick="main_verification( 'facebook_link' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Event &#183; Facebook Link</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_facebook">Link</label>
					<input type="text" id="input_facebook" class="classic_input" value="<?php echo $event_datas->facebook_link; ?>">
				</div> 
				<a onclick="main_verification( 'facebook' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

		<article class="card half">
			<div class="header yellow">
				<h1>Event &#183; Eventbrit Link</h1>
			</div>
			<div class="body">
				<div class="input_group">
					<label class="text_label" for="input_eventbrit">Link</label>
					<input type="text" id="input_eventbrit" class="classic_input" value="<?php echo $event_datas->eventbrit_link; ?>">
				</div> 
				<a onclick="main_verification( 'eventbrit' ); return false;" class="button blue">Save</a>
				<a onclick="location.reload();" class="button ghost_red">Cancel</a>
			</div>
		</article>

	</section>

	<!-- SCRIPTS -->
	<?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
	<script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/event_details.js"></script>
</body>
</html>