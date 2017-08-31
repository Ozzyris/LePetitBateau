<section id="toolbar">
    <a id="hamburger_icon" onclick="switch_menu(); return false;" href="#" title="Menu">
      <span class="line line-1"></span>
      <span class="line line-2"></span>
      <span class="line line-3"></span>
    </a>
     <p>Hello <?php echo $first_name; ?>, How are you today ?</p>
</section>

<nav id="left_navigation">
  <div class="introduction">
    <img id="alfred_logo" src="<?php echo base_url(); ?>assets/alfred_at_work/images/LOGO_alfred.svg" />
    <h1>Alfred @ Work</h1>
  </div>
  <ul class="menu">
    <li><a <?php if($anchor == 'dashboard'){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>alfredatwork/dashboard" >Dashboard</a></li>
    <li><a <?php if($anchor == 'home'){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>alfredatwork/home" >Pages Content</a></li>
    <li><a <?php if($anchor == 'gallery'){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>alfredatwork/gallery" >Gallery</a></li>
    <li><a <?php if($anchor == 'events'){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>alfredatwork/events" >Events</a></li>
    <li><a <?php if($anchor == 'festivals'){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>alfredatwork/festivals" >Festivals</a></li>
    <li><a <?php if($anchor == 'team'){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>alfredatwork/Team">Team</a></li>
    <li><a <?php if($anchor == 'profile'){ echo 'class="active"'; } ?> id="btnAccount" href="<?php echo base_url(); ?>alfredatwork/profile">Profile</a></li>
    <li id="btn_logout" ><a href="<?php echo base_url(); ?>alfredatwork/logout">Logout</a></li>
  </ul>
</nav>