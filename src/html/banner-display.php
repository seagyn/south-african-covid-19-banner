<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */



namespace SeagynDavis\SouthAfricaCovid19Banner\BannerDisplay;

add_filter( 'body_class', function( $classes ) {

  $options = get_option( 'rbd_options' );

  return array_merge( $classes, array( $options[ 'rbd_position' ] ) );

} );

function rbd_header_banner(){

  $options = get_option( 'rbd_options' );

  if ( epmty( $options[ 'rbd_position' ] ) ){
    return;
  }

  rbd_banner( $options[ 'rbd_position' ] );

}

function rbd_banner( $bannerClass ){

  \wp_enqueue_style( 'south-african-covid-19-page-banner', SOUTH_AFRICA_COVID_19_BANNER_URL . 'resources/css/south-african-covid-19-page-banner.min.css', null, SOUTH_AFRICA_COVID_19_BANNER_VERSION, false );

  echo '<div id="coronaBanner" class="coronaBanner '. $bannerClass .'">'.
    '<div class="coronaBanner__content">'.
      '<a class="coronaBanner__websiteLink" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za">'.
        '<img class="coronaBanner__websiteLinkImg" src="'. plugins_url('../../resources/images/corona.jpg', __FILE__ ) .'" alt="SAcoronavirus.co.za" width="364" height="60" border="0" />'.
      '</a>'.
      '<div class="numbers">'.
        '<a class="coronaBanner__hotlineLink" href="tel:+27800029999">'.
          'Emergency Hotline: 0800 029 999'.
        '</a>'.
        '<a class="coronaBanner__whatsappLink" href="https://wa.me/27600123456?text=Hi" rel="noopener nofollow">'.
          'WhatsApp Support Line: 0600-123456'.
        '</a>'.
      '</div>'.
    '</div>'.
  '</div>';

}

 ?>
