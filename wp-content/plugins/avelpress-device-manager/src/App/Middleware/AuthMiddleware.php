<?php
namespace Avelpress\DeviceManager\App\Middleware;

/**
 * 前台存取保護：需登入
 */
class AuthMiddleware
{
    public static function ensureAuthenticated(): void
    {
        if (!is_user_logged_in()) {
            wp_die(__('您必須先登入才能使用此功能', 'avelpress-device-manager'));
        }
    }
}
