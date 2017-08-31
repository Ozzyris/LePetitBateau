    <section id="set_password">
        <div id="from_container">
            <div class="input_group">
                <label for="input_password">Password</label>
                <input id="input_password" type="password" />
                <input type="hidden" id="token" value="<?php echo $token;?>">
            </div>
            <div class="input_group">
                <label for="input_password_confirmation">Password Confirmation</label>
                <input id="input_password_confirmation" type="password" onKeyPress="if(event.keyCode == 13) set_password();" /><br />
            </div>

            <a onclick="set_password()" class="input_button blue">Set Password</a>
            <a href="<?php echo base_url(); ?>alfredatwork/set-password" class="input_button red">Cancel</a>
        </div>
        <img id="background_img"  src="<?php echo base_url(); ?>assets/alfred_at_work/images/BG_forgotpassword.svg"> 
    </section>
 
    <!-- SCRIPTS -->
    <?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
    <script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/set_password.js"></script>
</body>
</html>