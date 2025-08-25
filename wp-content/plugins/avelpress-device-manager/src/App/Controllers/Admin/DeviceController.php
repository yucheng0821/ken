<?php
namespace Avelpress\DeviceManager\App\Controllers\Admin;

use Avelpress\DeviceManager\Core\View;
use Avelpress\DeviceManager\App\Repositories\DeviceRepository;
use Avelpress\DeviceManager\App\Services\DeviceService;

/**
 * 後台設備管理控制器
 */
class DeviceController
{
    protected $repo;
    protected $service;

    public function __construct()
    {
        global $wpdb;
        $this->repo = new DeviceRepository($wpdb);
        $this->service = new DeviceService($this->repo);
    }

    /** 列表與查詢頁 */
    public function index(): void
    {
        $keyword = isset($_GET['keyword']) ? sanitize_text_field((string) $_GET['keyword']) : '';
        $devices = $this->repo->list(['keyword' => $keyword]);
        echo View::render('admin.devices.index', compact('devices', 'keyword'));
    }

    /** 新增頁面 */
    public function create(): void
    {
        echo View::render('admin.devices.create');
    }
}
