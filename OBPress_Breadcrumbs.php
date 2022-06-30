<?php
/*
  Plugin name: OBPress Breadcrumbs by Zyrgon
  Plugin uri: www.zyrgon.net
  Text Domain: OBPress_Breadcrumbs
  Description: Widgets to OBPress
  Version: 0.0.2
  Author: Zyrgon
  Author uri: www.zyrgon.net
  License: GPlv2 or Later
*/

//Show Elementor plugins only if api token and chain/hotel are set in the admin
if(get_option('obpress_api_set') == true){
    require_once('elementor/init.php');
}

add_action( 'init', 'obpress_breadcrumbs_load_textdomain' );
 
function obpress_breadcrumbs_load_textdomain() {
    load_plugin_textdomain( 'OBPress_Breadcrumbs', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

// TODO, MAKE GIT BRANCH, CONNECT WITH UPDATE CHECKER

require_once(WP_PLUGIN_DIR . '/OBPress_Breadcrumbs/plugin-update-checker-4.11/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/LukaZyrgon/obpress_breadcrumbs',
    __FILE__,
    'OBPress_Breadcrumbs'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');
