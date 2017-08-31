	<!-- NAVIGATION -->
	<?php $this->load->view('alfred_at_work/includes/navigation.php'); ?>

    <section id="content">

        <article id="card_update" class="card">
            <div class="header blue">
                <h1>Update</h1>
            </div>
            <ul class="body">
                <?php  foreach ($system_datas as $datas): ?>
                    <li <?php  if($datas->status != 1){ echo 'class="archive"'; } ?>>
                        <span class="date"><?php  $timeconvert = strtotime( $datas->timestamp ); echo date('Y/m/d', $timeconvert); ?></span>
                        <span class="message"><?php  echo $datas->message; ?></span>
                        <span onclick="archive_system_data( event, <?php  echo $datas->id; ?> )" class="archive">X</span>
                    </li>
                <?php  endforeach ?>
            </ul>
        </article>

        <article id="card_newsletter" class="card">
            <div class="header yellow">
                <h1>Last Email from the Newsletter</h1>
            </div>
            <table class="body">
                <tbody>
                    <?php foreach ($mailchimp_data as $datas): ?>
                        <tr>
                            <td class="<?php  echo $datas['status']; ?>"> <?php  echo $datas['status']; ?> </td>
                            <td><?php $timeconvert = strtotime( $datas['timestamp_opt'] ); echo date('d/m/Y', $timeconvert);; ?></td>
                            <td><?php echo $datas['email_address']; ?></td>
                            <td><a onclick="archivemailchimp( event, '<?php  echo $datas['email_address']; ?>' );" class="archive">X</a></td>
                        </tr>
                    <?php endforeach ?>          
                </tbody>
            </table>
        </article>
  
  	</section>

	<!-- SCRIPTS -->
	<?php $this->load->view('alfred_at_work/includes/scripts.php'); ?>
    <script src="<?php echo base_url(); ?>assets/alfred_at_work/scripts/dashboard.js"></script>
</body>
</html>