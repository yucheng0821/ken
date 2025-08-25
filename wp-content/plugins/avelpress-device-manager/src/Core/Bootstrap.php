<?php
namespace Avelpress\DeviceManager\Core;

use Avelpress\DeviceManager\Database\Migrations\CreateDevicesTable;

/**
 * 系統引導類：負責外掛啟動、停用、初始化與路由註冊
 */
class Bootstrap
{
    /** @var string $pluginFile 外掛主檔案路徑 */
    protected static $pluginFile;

    /**
     * 啟動外掛：建立必要資料表
     */
    public static function activate(): void
    {
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        (new CreateDevicesTable())->up($wpdb);
    }

    /**
     * 停用外掛：此處保留（可於未來實作排程清理等）
     */
    public static function deactivate(): void
    {
        // 保留：不刪資料，避免誤刪生產資料
    }

    /**
     * 初始化：註冊路由、後台選單、短碼、REST API 等
     * @param string $pluginFile 外掛主檔案路徑
     */
    public static function init(string $pluginFile): void
    {
        self::$pluginFile = $pluginFile;
        Router::register();
    }
}
