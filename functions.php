<?php

// Utils
function notice_banner($value, $type){
    ?><div id="setting-error-settings_updated" class="<?=$type?> notice is-dismissible">
        <p><strong><?=$value?></strong></p>
    </div><?php
};

// Hooks
add_action("admin_menu", function(){
    add_theme_page("ログイン画面の編集", "ログイン画面", "edit_themes", "wp-login-customizer", "plugin_settings_page");
});

add_action("login_head", function(){
    $logo_url = get_option("wp_login_cz_logo_url");
    $bg_url = get_option("wp_login_cz_bg_url");
    if($logo_url !== "none"){
        add_filter("login_headerurl", function(){
            return get_bloginfo( 'url' );
        });
        ?>
        <style>
            #login h1 a {
                display: block;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url("<?=$logo_url?>");
                width: 100%;
                padding: 3px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        </style>
        <?php
    }

    if($bg_url !== "none"){
        ?>
        <style>
            body{
                background-image: url(<?=$bg_url?>);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }

            #loginform{
                border-radius: 10px;
            }

            #language-switcher-locales{
                border-radius: 7px;
            }

            input .button{
                border-radius: 7px;
            }

            #nav a{
                background-color: #ffffff;
                padding: 5px;
                border-radius: 5px;
            }

            #backtoblog a{
                background-color: #ffffff;
                padding: 5px;
                border-radius: 5px;
            }
        </style>
        <?php
    }
});