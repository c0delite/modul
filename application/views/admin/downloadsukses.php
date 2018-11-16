<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Sedang mengunduh</h1>
			</div>
			<?php
  				header('Refresh:3; url= '. base_url().'admin'); 
  				echo "You will be redirected in 3 seconds..."
			?>
		</div>
	</div><!-- .row -->
</div><!-- .container -->