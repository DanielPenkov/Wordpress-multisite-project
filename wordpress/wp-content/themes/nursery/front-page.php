<?php
/**
 * Template Name: Front
 */


get_header(); ?>

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
	<div id="slider">
		<div id="slideroverlay">
			<div class="content-area">
				<table>
					<tr>
						<th>
							<h1>Keep your kids in school!<br>The right choice for your children.</h1>
							<a class="btn big yellow" href="">Find out more</a>
						</th>
						<th>
							<div id="opening-hours" class="headlineFont">
							<?php 
								foreach($nursery['OpeningHours'] as $time){
									?>
									<a><?php echo $time['Name'] ?></a>
									<span>
										<span id="number"><?php echo $time['Hours'] ?></span>
										<span id="bg1"></span>
										<span id="bg2"></span>
									</span><br>
									<?php
								}
							?>
								
							</div>
						</th>
					</tr>
				</table>	
			</div>
		</div>
	</div>
	<div id="primary">
		<main id="main" class="site-main" role="main">
			<section>
				<h1><?php _e( 'Latest news', 'nursery' ); ?></h1>
				<!-- Display 3 latest news -->
				<div class="latest-news content-area">
				  <?php $the_query = new WP_Query( 'showposts=3' ); ?>

				  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				  <div>
				  	<a href="<?php the_permalink() ?>">
				  	<?php 
					  if ( has_post_thumbnail() ) {
							the_post_thumbnail('medium');
						} else{
							echo '<img src="' . get_template_directory_uri() . '/img/default-thumbnail.jpg' . '" alt="" />';
					  }?>
					</a>
					<div class="post-text">
					  	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					  	<p>
					  		<?php echo substr(strip_tags($post->post_content), 0, 150);?>[...]<br>
					  		<a href="<?php echo get_permalink(); ?>" class="read-more">/Read More</a>
					  	</p>
				  	</div><!-- /post-text -->

			  	  </div>
				  <?php endwhile;?>
				</div>
			</section>

			<section id="minicipalitynews">
				<h1><?php _e( 'Municipality news', 'nursery' ); ?></h1>
				<!-- Display Municipality latest news -->
				<div class="latest-news content-area">
						<?php
						switch_to_blog(1);
							$the_query = new WP_Query( 'showposts=3' );

							  while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
								  <div>
								  	<a href="<?php the_permalink() ?>">
								  	<?php 
									  if ( has_post_thumbnail() ) {
											the_post_thumbnail('medium');
										}?>
									</a>
									
								  	<div class="post-text">
									  	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
									  	<p>
									  		<?php echo substr(strip_tags($post->post_content), 0, 150);?>[...]<br>
									  		<a href="<?php echo get_permalink(); ?>" class="read-more">/Read More</a>
									  	</p>
								  	</div><!-- /post-text -->

							  	  </div>
							  <?php endwhile;
						restore_current_blog();
					?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
