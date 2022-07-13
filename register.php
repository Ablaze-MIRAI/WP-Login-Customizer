<?php
if(!defined("ABSPATH")) exit;

register_activation_hook( __FILE__, function(){
    if(!get_option("wp_login_cz_logo_url")) update_option("wp_login_cz_logo_url", "none");
    if(!get_option("wp_login_cz_bg_url")) update_option("wp_login_cz_bg_url", "none");
});

register_uninstall_hook(__FILE__, function(){
    delete_option("wp_login_cz_logo_url");
    delete_option("wp_login_cz_bg_url");
});