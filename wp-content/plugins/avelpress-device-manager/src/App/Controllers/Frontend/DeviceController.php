<?php
namespace Avelpress\DeviceManager\App\Controllers\Frontend;

use Avelpress\DeviceManager\Core\View;
use Avelpress\DeviceManager\App\Repositories\DeviceRepository;
use Avelpress\DeviceManager\App\Middleware\AuthMiddleware;

/**
 * 前台設備管理控制器（登入後可用）
 */
class DeviceController
{
    protected $repo;

    public function __construct()
    {
        AuthMiddleware::ensureAuthenticated();
        global $wpdb;
        $this->repo = new DeviceRepository($wpdb);
    }

    /** 前台列表 */
    public function index(): string
    {
        $devices = $this->repo->list();
        return View::render('frontend.devices.index', compact('devices'));
    }

    /** 新增表單 */
    public function createForm(): string
    {
        return View::render('frontend.devices.form');
    }
}
