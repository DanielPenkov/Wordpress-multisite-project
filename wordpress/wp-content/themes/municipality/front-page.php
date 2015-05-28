<?php
/**
 * Template Name: Front
 */


get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<?php

			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			// End the loop.
			endwhile;
			?>

			<ul class="blog-links">
			<?php
			// get all blogs
			$blogs = get_blog_list( 0, 'all' );

			if ( 0 < count( $blogs ) ) :
			    foreach( $blogs as $blog ) : 
			        switch_to_blog( $blog[ 'blog_id' ] );

			        if ( get_theme_mod( 'show_in_home', 'on' ) !== 'on' ) {
			            continue;
			        }

			        $description  = get_bloginfo( 'description' );
			        $blog_details = get_blog_details( $blog[ 'blog_id' ] );
			        ?>
			        <li>
			            <h2 class="blog-itle">
			                <a href="<?php echo $blog_details->path ?>">
			                    <?php echo  $blog_details->blogname; ?>
			                </a>
			            </h2>

			            <div class="blog-description">
			                <?php echo $description; ?>
			            </div>			            
			        </li>
			<?php endforeach;
			endif; ?>
			</ul>

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

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
