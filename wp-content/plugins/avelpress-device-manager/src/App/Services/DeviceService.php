<?php
namespace Avelpress\DeviceManager\App\Services;

use Avelpress\DeviceManager\App\Repositories\DeviceRepository;

/**
 * 業務邏輯：設備編號產生、資料驗證等
 */
class DeviceService
{
    /** @var DeviceRepository */
    protected $devices;

    public function __construct(DeviceRepository $devices)
    {
        $this->devices = $devices;
    }

    /** 產生公司內部設備編號：DEV-YYYYMM-xxxx（流水號） */
    public function generateDeviceCode(): string
    {
        $prefix = 'DEV-' . gmdate('Ym') . '-';
        $suffix = str_pad((string) random_int(0, 9999), 4, '0', STR_PAD_LEFT);
        return $prefix . $suffix;
    }
}
