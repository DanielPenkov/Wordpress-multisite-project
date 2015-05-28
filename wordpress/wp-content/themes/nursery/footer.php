<?php
/**
 * The template for displaying the footer.
 */
?>

<style>
li{
	list-style: none;
}
.widgettitle{
	display:none;

}
#documents-container{
	padding-bottom:20px !important; 
	width: 33%; 
	float:left; 
	padding: 0 15px;
}
#documents-container #secondary{
	padding: 14px 20px 6px;
	background-color: rgba(0,0,0,0.5);
	border-radius: 5px;
}
#documents-container a{
	color: #fff;
}
</style>

<?php 
global $table_prefix;
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

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div style="border-top: 2px dashed #fff; border-bottom: 2px dashed #fff; margin: 5px 0; overflow:hidden"> 
			<section style="width:1010px; margin:0 auto; padding: 0 15px;"> 
				 <article style="padding-bottom:20px !important; width: 33%; float:left; padding: 0 15px;">
				 	<h2 style="margin: 10px 0 5px; font-size: 24px">Schedule</h2>
					<?php 
						foreach($nursery['OpeningHours'] as $time){
							?>
							<strong><a style="width: 80px; display: inline-block; color: #fff;"><?php echo $time['Name'] ?>:</a></strong>
							<span>
								<span id="number"><?php echo $time['Hours'] ?></span>
								<span id="bg1"></span>
								<span id="bg2"></span>
							</span><br>
					<?php
						}
					?>
				</article>
				<article style="padding-bottom:20px !important; width: 33%; float:left; padding: 0 15px;">
				 	<h2 style="margin: 10px 0 5px; font-size: 24px">Contact</h2>
					<?php 
						echo $nursery['Address']['Town'].' '.$nursery['Address']['Street'].' '.$nursery['Address']['StreetNumber'];

						if($nursery['Phone1'] != ''){
						 echo "<p><strong>Phone 1:&nbsp;</strong>" . $nursery['Phone1'] . "</p>";
						}

						if($nursery['Phone2'] != ''){
						 echo "<p><strong>Phone 2:&nbsp;</strong>" . $nursery['Phone2'] . "</p>";
						}
					?>
				</article>
				<article id="documents-container">
				 	<h2 style="margin: 10px 0 5px; font-size: 24px">Documents</h2>
					<?php get_sidebar('documents'); ?>
				</article>
			</section>
		</div>
	</footer><!-- #colophon -->
	<div style="width: 100%; height: 80px; text-align: center; padding: 20px 0; background-color: #454e9d">
		<div style="  width: 178px; padding-left: 10px; padding-top: 10px; height: 52px; margin: 0 auto; background-color: #fff; overflow: hidden;">
			<?php get_sidebar('social'); ?>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
