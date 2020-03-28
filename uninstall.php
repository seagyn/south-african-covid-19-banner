<?php

// die when the file is called directly
if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}

//define a vairbale and store an option name as the value.
$option_name = 'rbd_options';

//call delete option and use the vairable inside the quotations
delete_option( $option_name );

// for site options in Multisite
delete_site_option( $option_name );

?>
