  <section id="forgot_password">
    <div id="from_container">
      <div class="input_group">
        <label for="input_email">Email</label>
        <input id="revovery_email" type="text" onKeyPress="if(event.keyCode == 13) send_recovery_email();" />
        <a href="<?php echo base_url() . 'alfredatwork/login'; ?>" class="link">remember password ?</a>
      </div>
      <a onclick="send_recovery_email()" class="input_button blue">Send recovery email</a>
      <a href="<?php echo base_url(); ?>alfredatwork/forgot-password" class="input_button red">Cancel</a>
    </div>
    <img id="background_img"  src="<?php echo base_url(); ?>assets/alfred_at_work/images/BG_forgotpassword.svg"> 
  </section>
 
    <!-- SCRIPTS -->
  <?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
    <script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/forgot_password.js"></script>
  </body>
</html>