<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<!-- <h2><?php _e( 'Shortcode Freezer Help Page', 'dxsf' ); ?></h2> -->

	<div class="dx-help-page">
		<div class="content alignleft">
			<h2 class='page-welcome'>Welcome to <span>Shortcode Freezer!</span></h2>

			<div id="dx-help-content">

				<h2 class='content-title'>Using the plugin</h2>
				<?php 
				$admin_submit_url = admin_url('admin.php?page=dx-shortcode-freezer&generate=go');
				
				// if the link is clicked, generate what needs to be generated
				if(isset($_GET['generate']) && $_GET['generate'] == 'go') {
					dx_freeze_shortcodes_now();	
				
					echo "<p>Data has been regenerated. Check the consistence of your site. </p>";
				} else { ?>
			
				<div style="text-align: center;">
					<h4><strong>WARNING! THIS COULD BREAK YOUR OVERALL DATABASE STYLING OR FUNCTIONALITY, USE AT YOUR OWN RISK AND CREATE A DATABASE BACKUP BEFORE YOU CLICK THE GENERATE BUTTON!!!</strong></h4>
					
					<h2> Initiate the shortcode regeneration: </h2>
						
					&gt;&gt;&gt; <a href="<?php echo $admin_submit_url; ?>">Freeze Shortcodes!</a> &lt;&lt;&lt; 
				</div>
				<?php } ?>
			
			</div>

			<footer class='dx-footer'>
				<a href="http://devrix.com/sign-up/" target="_blank"><img class='footer-banner' src="http://devrix.com/media/help-banner.png" alt="WordPress help"></a>
			</footer>

		</div>
		<div class="sidebar alignright">
			<h2>About the plugin</h2>
			<p>This plugin is built by <a href="http://devrix.com/" target="_blank">DevriX</a>, a High-end WordPress Agency. We love WordPress and contribute back whenever possible!</p>
			<p>Find us on <a href="https://twitter.com/wpdevrix" target="_blank">Twitter</a> and <a href="https://www.facebook.com/DevriXLtd" target="_blank">Facebook</a></p>
		</div>
	</div>
	
</div>