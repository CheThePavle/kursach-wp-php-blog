<?php
/*
Plugin Name: QRPage
Description: Выводит QRcode на текущую страницу (обращение через шорткод - [qrcode])
Author: Чикуров П. А., гр. ИС-18
*/

add_action('wp_enqueue_scripts','registerQrcodeAssets');
function registerQrcodeAssets() {
    $pluginDir=plugin_dir_url(__FILE__);
    wp_enqueue_script('qrcode',$pluginDir.'/js/qrcode.min.js');
    wp_enqueue_script('qrcode-script',$pluginDir.'/js/script.js');
}

add_shortcode('qrcode','renderQRcode');
function renderQRcode() { ?>
    <div class="qr-el"></div>
<?php }?>