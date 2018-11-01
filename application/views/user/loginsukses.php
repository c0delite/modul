<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login success!</h1>
			</div>
			<p>You are now logged in. <?= $this->session->flashdata('message_id');?></p>
			<?php
  				header('Refresh:3; url= '. base_url().'user/profile'); 
  				echo "You will be redirected in 3 seconds..."
			?>
		</div>
	</div><!-- .row -->
</div><!-- .container -->