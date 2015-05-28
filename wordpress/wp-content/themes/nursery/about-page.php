<?php
/*
Template Name: About page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" style="overflow: hidden; padding-bottom: 50px">
			<?php //while ( have_posts() ) : the_post(); ?>
			<?php //get_template_part( 'content', 'page' ); ?>
			<?php //endwhile; // end of the loop. ?>
			<div style="padding: 15px 0;">
				<?php 
				$table_name = $table_prefix.'options';
				$nurseryId = $wpdb->get_var( "SELECT option_value FROM {$table_name} WHERE option_name = 'nurseryId'");
				$str = file_get_contents('cache/cache.json');
				$json = json_decode($str, true);
				foreach($json as $json_a){
					if($json_a['Id'] == $nurseryId){
						$nursery = $json_a; 
						break;
					}
				}
				?>
				<h1 style="font-size: 36px"><?php echo $nursery['Name'] ?></h1>
				<div style="width: 33%; float: left;">
					<h3 style="font-size: 24px; margin-top: 25px; color: #ABABAB">Time table</h3>
					<table style="width: 100%">
						<tbody>
						<?php 
						foreach($nursery['OpeningHours'] as $time){
							?>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo $time['Name'] ?></strong>
								</td>
								<td>
									<?php echo $time['Hours'] ?>
								</td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
				</div>
				<div style="width: 33%; float: left;">
					<h3 style="font-size: 24px; margin-top: 25px; margin-left: 60px; color: #ABABAB">Address</h3>
					<table style="width: 100%">
						<tbody>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Street' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Address']['Street'] ?>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Street number' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Address']['StreetNumber'] ?>
								</td>
							</tr>	
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Town' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Address']['Town'] ?>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'ZipCode' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Address']['ZipCode'] ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="width: 33%; float: left;">
					<h3 style="font-size: 24px; margin-top: 25px; margin-left: 100px; color: #ABABAB">Info</h3>
					<table style="width: 100%">
						<tbody>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Phone 1' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Phone1'] ?>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Phone 2' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Phone2'] ?>
								</td>
							</tr>	
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Documents' ?></strong>
								</td>
								<td>
									<?php echo $nursery['Documents'] ?>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; padding-right: 20px;">
									<strong><?php echo 'Messages' ?></strong>
								</td>
								<td>
									<?php 
									foreach($nursery['Messages'] as $message){
										echo $message['message'];
									} 
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<hr style="width: 100%; float:left; margin: 45px auto; ">
			<div style="width: 100%; float: left;">
				<h3 style="font-size: 24px; margin-top: 25px; color: #ABABAB">Employees</h3>
				<table style="width: 100%">
					<thead>
						<tr style="padding: 15px 0">
							<th style="text-align: left; padding-left: 20px; width: 33%">
								<strong>Name</strong>
							</th>
							<th style="text-align: left; padding-left: 20px; width: 33%">
								<strong>Description</strong>
							</th>
							<th style="text-align: left; padding-left: 20px; width: 33%">
								<strong>ProfileImageUrl</strong>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach($nursery['Employees'] as $employee){
						?>
						<tr style="padding: 15px 0">
							<td style="padding: 0 20px; width: 33%">
								<?php echo $employee['Name'] ?>
							</td>
							<td style="padding: 0 20px; width: 33%">
								<?php echo $employee['Description'] ?>
							</td>
							<td style="padding: 0 20px; width: 33%">
								<img src="<?php echo $employee['ProfileImageUrl'] ?>" /> 
							</td>
						</tr>
						<?php
					}
					?>
					</tbody>
				</table>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
