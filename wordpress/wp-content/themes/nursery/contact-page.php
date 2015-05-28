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

			<script src="https://maps.googleapis.com/maps/api/js"></script>
			<script>
				var geocoder;
				var map;
				  function initialize() {
				    geocoder = new google.maps.Geocoder();
				    var mapOptions = {
				      zoom: 16,
				    }
				    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);


						  function codeAddress() {

						    var address = document.getElementById("address").value;
						    
						    geocoder.geocode( { 'address': address}, function(results, status) {
						      if (status == google.maps.GeocoderStatus.OK) {
						        map.setCenter(results[0].geometry.location);
						        var marker = new google.maps.Marker({
						            map: map,
						            position: results[0].geometry.location
						        });
						      } else {
						        alert("Geocode was not successful for the following reason: " + status);
						      }
						    });
						 }
						 codeAddress();
				}



		      google.maps.event.addDomListener(window, 'load', initialize);
			</script>

			<div id="map-canvas" style="width: 100%;height: 400px;"></div>
			<input id="address" type="textbox" value="<?php echo $nursery['Address']['Town'].','. $nursery['Address']['Street'].','. $nursery['Address']['StreetNumber'] ?>">

			<div class="contact-details">
				<?php 
					if($nursery['Phone1'] != ''){
					 echo "<p><strong>Phone 1:&nbsp;</strong>" . $nursery['Phone1'] . "</p>";
					}
				?>

				<?php 
					if($nursery['Phone2'] != ''){
					 echo "<p><strong>Phone 2:&nbsp;</strong>" . $nursery['Phone2'] . "</p>";
					}
				?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
