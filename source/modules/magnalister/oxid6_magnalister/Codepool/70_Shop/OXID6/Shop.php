<?php

declare(strict_types=1);

use OxidEsales\Eshop\Core\Config;
use OxidEsales\Eshop\Core\Registry;

/**
 * OXID 6 adapter for magnalister's shop abstraction.
 */
class ML_OXID6_Shop
{
    public function getVersion(): string
    {
        if (class_exists(\OxidEsales\Eshop\Core\OxidEsales::class)) {
            return (string) \OxidEsales\Eshop\Core\OxidEsales::VERSION;
        }

        return '6';
    }

    public function getShopUrl(): string
    {
        /** @var Config $config */
        $config = Registry::getConfig();

        return (string) $config->getShopUrl();
    }

    public function getShopId(): string
    {
        return (string) Registry::getConfig()->getShopId();
    }

    public function isAdmin(): bool
    {
        return defined('OX_IS_ADMIN') && OX_IS_ADMIN === true;
    }
}
