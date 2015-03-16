<?php
/**
 * Template Name: Front
 */


get_header(); ?>

	<div id="slider"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h1><?php _e( 'Latest news', 'nursery' ); ?></h1>
			<!-- Display 3 latest news -->
			<div class="latest-news">

			  <?php $the_query = new WP_Query( 'showposts=3' ); ?>

			  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			  <div>
			  	<?php 
				  if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium');
					}?>
			  	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			  	<p>
			  		<?php echo substr(strip_tags($post->post_content), 0, 150);?>[...]<br>
			  		<a href="<?php echo get_permalink(); ?>">/Read More</a>
			  	</p>

		  	  </div>
			  <?php endwhile;?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
