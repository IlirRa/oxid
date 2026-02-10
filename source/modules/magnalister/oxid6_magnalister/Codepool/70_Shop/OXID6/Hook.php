<?php

declare(strict_types=1);

/**
 * Entry point used by magnalister library when loading shop-specific hooks.
 */
class ML_OXID6_Hook
{
    public static function bootstrap(): void
    {
        if (!class_exists('ML_OXID6_Shop')) {
            require_once __DIR__ . '/Shop.php';
        }
    }
}

ML_OXID6_Hook::bootstrap();
