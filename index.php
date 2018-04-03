<?php
/*
Plugin Name: Car register
Description: Car register for users
Author: <a href="mailto:---@gmail.com">Volmarg Reiso</a>
Version: 1.0
*/

#Plugin hook to admin Panel
if(is_admin()){ #checks if thats admin panel
  include_once 'backend/index.php';

  #include scripts
  wp_enqueue_script('ajaxBack', plugin_dir_url(__FILE__) . 'backend/js/ajax.js','','',true); #true moves to footer
  wp_enqueue_script('interfaceBack', plugin_dir_url(__FILE__) . 'backend/js/interface.js','','',true); #true moves to footer

  #include styles
  wp_enqueue_style( 'panelsBack', plugin_dir_url(__FILE__) . 'backend/css/panels.css', '', '', 'all' );
}#include styles and sripts if it's front end
else{
  wp_enqueue_script('ajaxFront', plugin_dir_url(__FILE__) . 'frontend/js/ajax.js','','',true); #true moves to footer
  wp_enqueue_script('interfaceFront', plugin_dir_url(__FILE__) . 'frontend/js/userInterface.js','','',true); #true moves to footer
  wp_enqueue_script('carManageFront', plugin_dir_url(__FILE__) . 'frontend/js/car-types-tabs.js','','',true); #true moves to footer
  wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'common/jq.3.3.1.js','','');
  wp_enqueue_style( 'registerForm', plugin_dir_url(__FILE__) . 'frontend/css/car-register-form.css', '', '', 'all' );
}

add_action('admin_menu', 'hook_plugin_in_panel'); #add admin menu option

function hook_plugin_in_panel(){
        add_menu_page( 'Cars register', 'Cars register', 'manage_options', 'crud-plugin', 'load_plugin_backend' ); #settings for menu acces
}




?>
