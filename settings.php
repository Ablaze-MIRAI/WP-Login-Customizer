<?php

if(!defined("ABSPATH")) exit;

add_action("admin_enqueue_scripts", function(){
    wp_enqueue_media();
    wp_enqueue_script("wp-media-api", plugin_dir_url(__FILE__)."wp-media-api.js");
});

function plugin_settings_page(){
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["clear"]) && $_POST["clear"] === "clear"){
            update_option("wp_login_cz_logo_url", "none");
            update_option("wp_login_cz_bg_url", "none");
            notice_banner("データをクリアしました", "updated");
        }else{
            if(isset($_POST["logo_url"]) && !empty($_POST["logo_url"])){
                update_option("wp_login_cz_logo_url", $_POST["logo_url"]);
            }

            if(isset($_POST["bg_url"]) && !empty($_POST["bg_url"])){
                update_option("wp_login_cz_bg_url", $_POST["bg_url"]);
            }

            notice_banner("更新しました", "updated");
        }
    }

    $logo_url = get_option("wp_login_cz_logo_url");
    $bg_url = get_option("wp_login_cz_bg_url");
    
    ?>
    <main>
        <div>
            <h1>WP Login Customizer</h1>
            <p>ログイン画面のロゴと背景画像を変更することができます</p>
        </div>
        <div>
            <form action="" method="post">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label>ロゴURL</label></th>
                        <td><img src="<?=$logo_url==="none"?"none":$logo_url?>" alt="logo" style="width: 200px" onerror="this.style.display='none'" id="media_logo_img"></td>
                        <td><button id="media_upload_btn_logo" class="button" type="button" style="margin-bottom: 5px">メディアライブラリを開く</button><input name="logo_url" type="text" id="media_logo_url" value="<?=$logo_url==="none"?"none":$logo_url?>" class="regular-text"/></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>背景画像URL</label></th>
                        <td><img src="<?=$bg_url==="none"?"none":$bg_url?>" alt="background" style="width: 200px" onerror="this.style.display='none'" id="media_bg_img"></td>
                        <td><button id="media_upload_btn_bg" class="button" type="button" style="margin-bottom: 5px">メディアライブラリを開く</button><input name="bg_url" type="text" id="media_bg_url" value="<?=$bg_url==="none"?"none":$bg_url?>" class="regular-text"/></td>
                    </tr>
                </table>
                <?=submit_button()?>
            </form>
            <form action="" method="post">
                <input type="hidden" name="clear" value="clear">
                <input type="submit" value="設定のクリア" class="button">
            </form>
        </div>
    </main>
    <?php
}