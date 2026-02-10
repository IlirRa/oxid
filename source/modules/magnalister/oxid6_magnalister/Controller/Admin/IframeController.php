<?php

declare(strict_types=1);

namespace Magnalister\Oxid6\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Registry;

class IframeController extends AdminController
{
    /**
     * @var string
     */
    protected $_sThisTemplate = 'ml_oxid6_iframe.tpl';

    public function render()
    {
        parent::render();
        \Magnalister\Oxid6\Bootstrap::loadMagnalisterLibrary();

        $config = Registry::getConfig();
        $iframeUrl = (string) $config->getConfigParam('ml_oxid6_iframe_url');

        if ($iframeUrl === '') {
            $iframeUrl = 'https://www.magnalister.com/';
        }

        $shopUrl = (string) $config->getShopUrl();
        $separator = strpos($iframeUrl, '?') === false ? '?' : '&';

        $this->_aViewData['mlIframeUrl'] = $iframeUrl . $separator . http_build_query([
            'shopSystem' => 'OXID6',
            'shopUrl' => $shopUrl,
        ]);

        return $this->_sThisTemplate;
    }
}
