# Avelpress 設備管理系統 (WordPress Plugin)

- OOP + MVC 模組化：Controller / Router / Service / Repository / Middleware
- 後台：新增/修改/刪除/查詢（骨架）
- 前台（需登入）：`[ap_device_form]`、`[ap_device_list]`

## 安裝
1. 將外掛放入 `wp-content/plugins/avelpress-device-manager`
2. 啟用外掛
3. 若未使用 Composer，已提供 `src/Core/Autoloader.php` 做 PSR-4 載入

## 目錄結構（精簡）
- `src/Core`：Bootstrap、Router、View、Autoloader
- `src/App`：Controllers / Models / Repositories / Services / Middleware
- `src/Database/Migrations`：資料表建立
- `resources/views`：視圖檔
- `assets`：靜態資源

