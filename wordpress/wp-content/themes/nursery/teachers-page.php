<?php
/*
Template Name: About page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" style="overflow: hidden; padding-bottom: 50px">
		
			<h1><?php echo get_the_title(); ?></h1>

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

			<?php 
			foreach($nursery['Employees'] as $employee){
			?>
				<div class="teacher">
					

					<?php if ( $employee['ProfileImageUrl'] == null ) {
							echo '<img src="' . get_template_directory_uri() . '/img/avatar-man.png' . '" alt="" />';
						} else{
						 	echo '<img src="' . $employee['ProfileImageUrl'] . '" />'; 
					  }?>

					<h2><?php echo $employee['Name'] ?></h2>
					<p><?php echo $employee['Description'] ?></p>
				</div>
			<?php
			}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
