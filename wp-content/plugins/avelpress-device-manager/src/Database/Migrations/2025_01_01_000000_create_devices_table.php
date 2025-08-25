<?php
namespace Avelpress\DeviceManager\Database\Migrations;

/**
 * 建立 devices 資料表（使用 WordPress dbDelta）
 */
class CreateDevicesTable
{
    /**
     * 建表：儲存設備資訊與生命週期日期
     */
    public function up($wpdb): void
    {
        $table = $wpdb->prefix . 'ap_devices';
        $charsetCollate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE {$table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            device_code VARCHAR(50) NOT NULL,
            vendor VARCHAR(191) NULL,
            cpu VARCHAR(191) NULL,
            ram VARCHAR(191) NULL,
            ssd VARCHAR(191) NULL,
            hdd VARCHAR(191) NULL,
            os VARCHAR(191) NULL,
            department VARCHAR(191) NULL,
            employee_name VARCHAR(191) NULL,
            purchase_date DATE NULL,
            assigned_date DATE NULL,
            recovered_date DATE NULL,
            retired_date DATE NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            UNIQUE KEY device_code_unique (device_code)
        ) {$charsetCollate};";

        dbDelta($sql);
    }
}
