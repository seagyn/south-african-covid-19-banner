<?php
/**
 * Adding settings page HTML.
 *
 * @package SouthAfricaCovid19Banner
 */

?>

<div class="wrap">

	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form action="options.php" method="post">
		<?php
		settings_fields( 'south-african-covid-19-banner' );
		do_settings_sections( 'south-african-covid-19-banner' );
		submit_button( 'Save Settings' );
		?>
	</form>

</div>
