<nav>
	<a id="hamburger_icon" href="#" onclick="sidemenu()" title="Menu">
		<span class="line line-1"></span>
		<span class="line line-2"></span>
		<span class="line line-3"></span>
	</a>
	<div class="left_menu" id="left_menu">
		<ul class="<?php if($anchor == 'shop'){ echo 'pink';} ?>">
			<li class="<?php if($anchor == 'home'){ echo 'active';}?>">
				<a href="<?php echo base_url(); ?>home">Home</a>
			</li>
			<li class="<?php if($anchor == 'shop'){ echo 'active';}?>">
				<div class="dropdown">
					<a class="main_link" href="<?php echo base_url(); ?>shop">Shop</a>
					<div class="dropdown_container">
						<ul>
							<?php foreach ($highlight_artists as $datas): ?>
								<li>
									<a href="<?php echo base_url(). 'artists/' . $datas->id; ?>"><?php echo $datas->name; ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</li>
			<li class="<?php if($anchor == 'host_an_exhibition'){ echo 'active';}?>">
				<a href="<?php echo base_url(); ?>host-an-exhibition">Host an Exhibition</a>
			</li>
			<li class="<?php if($anchor == 'where_is_the_boat'){ echo 'active';}?>">
				<a href="<?php echo base_url(); ?>where-is-the-boat">Where is the boat?</a>
			</li>
			<li class="<?php if($anchor == 'services'){ echo 'active';}?>">
				<a href="<?php echo base_url(); ?>services">Services</a>
			</li>
			<li class="<?php if($anchor == 'support_us'){ echo 'active';}?>">
				<a href="<?php echo base_url(); ?>support-us">Support Us</a>
			</li>
		</ul>
	</div>
</nav>