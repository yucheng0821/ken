<?php
/**
 * Plugin Name: Avelpress 設備管理系統
 * Description: 以 Laravel 風格（OOP + MVC）打造的 WordPress 設備管理系統 Plugin。
 * Version: 0.1.0
 * Author: Your Name
 * Text Domain: avelpress-device-manager
 */

// 防止直接存取
if (!defined('ABSPATH')) {
    exit;
}

// 自動載入（Composer 或自定 PSR-4）
$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
}

use Avelpress\DeviceManager\Core\Bootstrap;

// 啟用/停用 Hook
register_activation_hook(__FILE__, [Bootstrap::class, 'activate']);
register_deactivation_hook(__FILE__, [Bootstrap::class, 'deactivate']);

// 啟動外掛
add_action('plugins_loaded', function () {
    // 建立 Bootstrap 實例，執行路由與服務綁定
    Bootstrap::init(__FILE__);
});
