<?php 

add_action( 'wp_footer', 'wcetb_footer' );

function wcetb_footer() {
	?>
	<script>

		(function($) {

			// GET THE TITLE

			function swpGetPostTitle(id, callback) {
				var title = '';
				$.ajax({
					type: 'post',
					dataType: 'json',
					url: '<?php echo admin_url("admin-ajax.php"); ?>',
					data: {
						action: 'swp_get_title_from_id',
						swp_post_id: id
					},
					success: function(response) {
						callback(response.title);
					}
				});

			}

			// ENABLE TRACKING

			<?php if (get_field('swp_cf7_use_plugins_tracking_id', 'options') == 'yes') { ?>

				<?php if ($track_id = get_field('swp_cf7_tracking_id', 'options')) { ?>

					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

					<?php $objectName = 'ga'; ?>

					<?php echo $objectName; ?>('create', '<?php echo $track_id; ?>', 'auto');				

					<?php if (get_field('swp_cf7_ip_anonymization', 'options') == 'yes') { ?>

					// IP ANNON
					
					<?php echo $objectName; ?>('set', 'anonymizeIp', true);

					<?php 
				} ?>

				<?php if (get_field('track_standard_page_views', 'options') == 'yes') { ?>

					<?php echo $objectName; ?>('send', 'pageview');

					<?php 
				} ?>
				<?php 

			} else {

				$objectName = get_field('swp_cf7_tracking_object_name', 'options');

			} ?>

			<?php $objectType = 'event'; ?>

				// CONTACT FORM 7

				<?php if (get_field('swp_cf7_track_successful_submissions', 'options') == 'yes') { ?>
					document.addEventListener( 'wpcf7mailsent', function( event ) {
						swpGetPostTitle(event.detail.contactFormId, swp_gaf_track_successful_cf7_submissions);
					}, false );
					function swp_gaf_track_successful_cf7_submissions(title) {
						<?php echo $objectName; ?>( 'send', '<?php echo $objectType; ?>', 'Contact Form 7', 'Successful', title);
					}
					<?php 
				} ?>

				<?php if (get_field('swp_cf7_track_failed_submissions', 'options') == 'yes') { ?>
					document.addEventListener( 'wpcf7mailfailed', function( event ) {
						swpGetPostTitle(event.detail.contactFormId, swp_gaf_track_failed_cf7_submissions);
					}, false );
					function swp_gaf_track_failed_cf7_submissions(title) {
						<?php echo $objectName; ?>( 'send', '<?php echo $objectType; ?>', 'Contact Form 7', 'Failed', title );
					}
					<?php 
				} ?>

				<?php if (get_field('swp_cf7_track_invalid_submissions', 'options') == 'yes') { ?>
					document.addEventListener( 'wpcf7invalid', function( event ) {
						swpGetPostTitle(event.detail.contactFormId, swp_gaf_track_invalid_cf7_submissions);
					}, false );
					function swp_gaf_track_invalid_cf7_submissions(title) {
						<?php echo $objectName; ?>( 'send', '<?php echo $objectType; ?>', 'Contact Form 7', 'Invalid', title );
					}
					<?php 
				} ?>

				<?php if (get_field('swp_cf7_track_spam_submissions', 'options') == 'yes') { ?>
					document.addEventListener( 'wpcf7spam', function( event ) {
						swpGetPostTitle(event.detail.contactFormId, swp_gaf_track_spam_cf7_submissions);
					}, false );
					function swp_gaf_track_spam_cf7_submissions(title) {
						<?php echo $objectName; ?>( 'send', '<?php echo $objectType; ?>', 'Contact Form 7', 'Spam', title );
					}
					<?php 
				} ?>

				<?php if (get_field('swp_cf7_track_all_submissions', 'options') == 'yes') { ?>
					document.addEventListener( 'wpcf7submit', function( event ) {
						swpGetPostTitle(event.detail.contactFormId, swp_gaf_track_all_cf7_submissions);
					}, false );
					function swp_gaf_track_all_cf7_submissions(title) {
						<?php echo $objectName; ?>( 'send', '<?php echo $objectType; ?>', 'Contact Form 7', 'Submit', title );
					}
					<?php 
				} ?>

				<?php 
			} ?>

		})(jQuery);		

	</script>
	<?php
}