<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>The Official Elias Badges Page</h2>
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">

				<?php  if ( !isset( $wp_username ) || $wp_username == '') : ?>
					
					<div class="postbox">
					
						<h3><span>Get started</span></h3>
						<div class="inside">

							<form action="" method="post" name="wp_username_form">

							<input type="hidden" name="wp_form_submitted" value="Y">

								<table class="form-table">
									<tr>
										<td>
											<label for="wp_username">Enter Username</label>
										</td>
										<td>
											<input name="wp_username" id="wp_username" type="text" value="" class="regular-text" />
										</td>
									</tr>
								</table>
								<p><input class="button-primary" type="submit" name="username_submit" value="Save" /></p>
							</form>

						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
					<?php else : ?>
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
					
					<div class="postbox">
					
						<h3><span><?php echo $teamtreehouse_profile->{'name'} ?></span></h3>
						<div class="inside">
							<p><img src="<?php echo $teamtreehouse_profile->{'gravatar_url'} ?>" width="100%" class="gravatar"></p>
							<ul class="badges-and-points">
								<li>Badges: <strong><?php echo count($teamtreehouse_profile->{'badges'}) ?></strong></li>
								<li>Points: <strong><?php echo $teamtreehouse_profile->{'points'}->{'total'} ?></strong></li>
							</ul>

							<form action="" method="post" name="wp_username_form">

								<input type="hidden" name="wp_form_submitted" value="Y">

								<p><label for="wp_username">Username</label></p>

								<p><input name="wp_username" id="wp_username" type="text" value="<?php echo $wp_username; ?>" />

								<input class="button-primary" type="submit" name="username_submit" value="Update" /></p>

							</form>

						</div> <!-- .inside -->
						
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables -->
				
			</div> <!-- #postbox-container-1 .postbox-container -->

			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">
					
					<div class="postbox">
					
						<h3><span>Recent Badges</span></h3>
						<div class="inside">
							<p>Below are your 20 most recent badges</p>

							<ul class="wpelias-badges">

								<?php 
								$total_badges = count( $teamtreehouse_profile->{'badges'} );

								for( $i = $total_badges - 1; $i >= $total_badges - 20; $i-- ):
		 						?>

								<li>
									<ul>
										<li>
											<img src="<?php echo $teamtreehouse_profile->{'badges'}[$i]->{'icon_url'};?>" width="120px";>
										</li>

										<?php if ( $teamtreehouse_profile->{'badges'}[$i]->{'url'} != $teamtreehouse_profile->{'profile_url'} ) : ?>

										<li class="badge-name">
											<a href="<?php echo $teamtreehouse_profile->{'badges'}[$i]->{'url'}; ?>">
											<?php echo $teamtreehouse_profile->{'badges'}[$i]->{'name'}; ?></a>
										</li>
										<!-- <li class="badge-project-name">
											<a href="#"><?php echo $teamtreehouse_profile->{'badges'}[$i]->{'courses'}[1]->{'title'}; ?></a>
										</li> -->

									<?php  else: ?>

										<li class="badge-name">
											<?php echo $teamtreehouse_profile->{'badges'}[$i]->{'name'}; ?>
										</li>

									<?php endif; ?>

									</ul>
								</li>

								<?php  endfor; ?>

							</ul>
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
					<?php if( $display_json == true ) : ?>

					<div class="postbox">
						<h3><span>JSON Data</span></h3>
						<div class="inside">
							<p><?php echo $teamtreehouse_profile->{'name'} ?></p>
						<pre><code>
							<?php var_dump($teamtreehouse_profile); ?>
						</code></pre>
						</div>
					</div>

					<?php endif; ?>
				<?php endif; ?>
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
			

			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->