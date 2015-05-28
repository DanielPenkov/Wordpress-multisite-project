<?php
/**
 * The template for displaying all pages.
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div id="posts">
				<?php $the_query = new WP_Query( 'showposts=10' );

				if ( $the_query -> have_posts() ) :
				 while ($the_query -> have_posts()) : $the_query -> the_post(); 
				?>
					<div>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('large');?>
						</a>
						<div class="post-text">
						  	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
						  	<p>
						  		<?php echo substr(strip_tags($post->post_content), 0, 550);?>[...]<br>
						  		<a href="<?php echo get_permalink(); ?>" class="read-more">/Read More</a>
						  	</p>
						</div><!-- /post-text -->

				  	</div>
				<?php 
				endwhile;
				else :
					echo '<h1>Sorry, no posts were found</h1>';
				endif;
				?>
			</div>

			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
