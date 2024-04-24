<?php
/**
 * Seofeb
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Seofeb.com license that is
 * available through the world-wide-web at this URL:
 * https://seofeb.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Seofeb
 * @package     Seofeb_OneStepCheckout
 * @copyright   Copyright (c) 2018 Seofeb (https://seofeb.com/)
 * @license     https://seofeb.com/LICENSE.txt
 */
namespace Seofeb\OneStepCheckout\Controller;

use Magento\UrlRewrite\Model\UrlFinderInterface;
use Magento\UrlRewrite\Service\V1\Data\UrlRewrite;

class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * App action factory
     *
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * Response
     *
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * Url finder
     *
     * @var UrlFinderInterface
     */
    protected $urlFinder;

    /**
     * Url builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * One step checkout helper
     *
     * @var \Seofeb\OneStepCheckout\Helper\Config
     */
    protected $configHelper;

    /**
     * Initialize dependencies.
     *
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param UrlFinderInterface $urlFinder
     * @param \Magento\Framework\UrlInterface $url
     * @param \Seofeb\OneStepCheckout\Helper\Config $configHelper
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\ResponseInterface $response,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        UrlFinderInterface $urlFinder,
        \Magento\Framework\UrlInterface $url,
        \Seofeb\OneStepCheckout\Helper\Config $configHelper
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
        $this->urlFinder = $urlFinder;
        $this->storeManager = $storeManager;
        $this->url = $url;
        $this->configHelper = $configHelper;
    }

    /**
     * Validate and Match
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return void
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        if (!$this->configHelper->isEnabled()) {
            return;
        }
        $identifier = trim($request->getPathInfo(), '/');
        if ($identifier == $this->configHelper->getCheckoutUrl() && $this->configHelper->getCheckoutUrl() !=='checkout') {
            $request->setModuleName('checkout')
                ->setControllerName('index')
                ->setActionName('index');
            return;
        }
    }
}
