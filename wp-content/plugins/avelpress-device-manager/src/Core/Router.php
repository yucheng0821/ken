<?php
namespace Avelpress\DeviceManager\Core;

use Avelpress\DeviceManager\App\Controllers\Admin\DeviceController as AdminDeviceController;
use Avelpress\DeviceManager\App\Controllers\Frontend\DeviceController as FrontendDeviceController;

/**
 * 路由註冊：負責後台選單、前台短碼、REST API 與頁面路由
 */
class Router
{
    /**
     * 註冊所有路由與掛勾
     */
    public static function register(): void
    {
        // 後台選單
        add_action('admin_menu', [self::class, 'registerAdminMenu']);

        // 前台短碼（登入後可用）
        add_shortcode('ap_device_form', [self::class, 'renderFrontendForm']);
        add_shortcode('ap_device_list', [self::class, 'renderFrontendList']);

        // REST API 路由
        add_action('rest_api_init', [self::class, 'registerRestRoutes']);
    }

    /**
     * 後台選單註冊
     */
    public static function registerAdminMenu(): void
    {
        add_menu_page(
            '設備管理', '設備管理', 'manage_options', 'ap-device-manager',
            [AdminDeviceController::class, 'index'], 'dashicons-desktop', 56
        );

        add_submenu_page('ap-device-manager', '新增設備', '新增設備', 'manage_options', 'ap-device-create', [AdminDeviceController::class, 'create']);
        add_submenu_page('ap-device-manager', '查詢設備', '查詢設備', 'manage_options', 'ap-device-search', [AdminDeviceController::class, 'index']);
    }

    /** 短碼：前台新增設備表單 */
    public static function renderFrontendForm($atts = [], $content = null): string
    {
        return (new FrontendDeviceController())->createForm();
    }

    /** 短碼：前台設備列表 */
    public static function renderFrontendList($atts = [], $content = null): string
    {
        return (new FrontendDeviceController())->index();
    }

    /** 註冊 REST API 路由（範例/保留） */
    public static function registerRestRoutes(): void
    {
        // 可於此處註冊 REST 路由以供前端 AJAX 互動
    }
}
