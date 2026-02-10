<?php

declare(strict_types=1);

namespace Magnalister\Oxid6;

use OxidEsales\Eshop\Core\Registry;

final class Bootstrap
{
    public static function onActivate(): void
    {
        self::loadMagnalisterLibrary();
    }

    public static function loadMagnalisterLibrary(): void
    {
        $shopRoot = dirname(__DIR__, 4);
        $moduleRoot = __DIR__;
        $configuredPath = self::resolveLibraryPath();
        $libraryRoot = $shopRoot . DIRECTORY_SEPARATOR . trim($configuredPath, '/');
        $shopCodepoolRoot = $moduleRoot . '/Codepool/70_Shop/OXID6';

        if (!defined('ML_LIBRARY_ROOT')) {
            define('ML_LIBRARY_ROOT', $libraryRoot);
        }

        if (!defined('ML_SHOP_ROOT')) {
            define('ML_SHOP_ROOT', $shopCodepoolRoot);
        }

        if (!defined('ML_SHOP_SYSTEM')) {
            define('ML_SHOP_SYSTEM', 'OXID6');
        }

        self::registerShopCodepool($shopCodepoolRoot);

        $autoload = $libraryRoot . '/autoload.php';
        if (is_file($autoload)) {
            require_once $autoload;
        }
    }

    private static function resolveLibraryPath(): string
    {
        $default = 'vendor/redgecko/magnalisterlibrary';

        if (!function_exists('oxNew') || !class_exists(Registry::class)) {
            return $default;
        }

        $configuredPath = (string) Registry::getConfig()->getConfigParam('ml_oxid6_library_path');
        return $configuredPath !== '' ? $configuredPath : $default;
    }

    private static function registerShopCodepool(string $shopCodepoolRoot): void
    {
        if (!is_dir($shopCodepoolRoot)) {
            return;
        }

        $includePath = explode(PATH_SEPARATOR, (string) get_include_path());
        if (!in_array($shopCodepoolRoot, $includePath, true)) {
            array_unshift($includePath, $shopCodepoolRoot);
            set_include_path(implode(PATH_SEPARATOR, $includePath));
        }

        spl_autoload_register(static function (string $className) use ($shopCodepoolRoot): void {
            if (strpos($className, 'ML_OXID6_') !== 0) {
                return;
            }

            $file = $shopCodepoolRoot . '/' . substr($className, strlen('ML_OXID6_')) . '.php';
            if (is_file($file)) {
                require_once $file;
            }
        }, true, true);
    }
}
