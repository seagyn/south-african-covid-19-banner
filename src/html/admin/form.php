<?php
/**
 * Displays the admin form.
 *
 * @package SouthAfricaCovid19Banner
 */

$options = get_option( 'sac19b_options' );

?>

<select id="<?php echo esc_attr( $args['label_for'] ); ?>"
		data-custom="<?php echo esc_attr( $args['sac19b_custom_data'] ); ?>"
		name="sac19b_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
>
	<option value="" <?php echo( 'banner-top-scroll' === $options['position'] ? 'selected' : '' ); ?> >
		<?php esc_html_e( 'None', 'south-african-covid-19-banner' ); ?>
	</option>
	<option
		value='banner-top-scroll' <?php echo( 'banner-top-scroll' === $options['position'] ? 'selected' : '' ); ?> >
		<?php esc_html_e( 'Top & scroll', 'south-african-covid-19-banner' ); ?>
	</option>
	<option value='banner-top-fixed' <?php echo( 'banner-top-fixed' === $options['position'] ? 'selected' : '' ); ?> >
		<?php esc_html_e( 'Top & fixed', 'south-african-covid-19-banner' ); ?>
	</option>
	<option
		value='banner-bottom-scroll' <?php echo( 'banner-bottom-scroll' === $options['position'] ? 'selected' : '' ); ?> >
		<?php esc_html_e( 'Bottom & scroll', 'south-african-covid-19-banner' ); ?>
	</option>
	<option
		value='banner-bottom-fixed' <?php echo( 'banner-bottom-fixed' === $options['position'] ? 'selected' : '' ); ?> >
		<?php esc_html_e( 'Bottom & fixed', 'south-african-covid-19-banner' ); ?>
	</option>
</select>

<p class="description">
	<?php esc_html_e( 'Selected your preferred banner position.', 'south-african-covid-19-banner' ); ?>
</p>

<ul>
	<li><strong>Top & scroll : </strong>Displays at the top of the site and scrolls with the page.</li>
	<li><strong>Top & fixed : </strong>Displays fixed at the top of the screen and the site scrolls behind it.</li>
	<li><strong>Bottom & scroll : </strong>Displays at the bottom of the site and is only viewed once scrolled to
		the bottom of the site.
	</li>
	<li><strong>Bottom & fixed : </strong>Displays fixed at the bottom of the screen and the site scrolls behind it.
	</li>
</ul>
