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
namespace Seofeb\OneStepCheckout\Plugin;

class BlockCartSidebarPlugin
{
    /**
     * Url builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * One step checkout helper
     *
     * @var \Seofeb\OneStepCheckout\Helper\Config
     */
    protected $_config;
    

    /**
     * Initialize dependencies.
     *
     * @param \Seofeb\OneStepCheckout\Helper\Config $config
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        \Seofeb\OneStepCheckout\Helper\Config $config,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->_config = $config;
        $this->url = $url;
    }

    /**
     * Modify checkout url
     *
     * @param \Magento\Checkout\Block\Cart\Sidebar $subject
     * @param string $checkoutUrl
     * @return string
     */
    public function afterGetCheckoutUrl(
        \Magento\Checkout\Block\Cart\Sidebar $subject,
        $checkoutUrl
    ) {
        if (!$this->_config->isEnabled()) {
            return $checkoutUrl;
        }
        if ($this->_config->getRouterName() != 'checkout') {
            return $this->url->getDirectUrl($this->_config->getCheckoutUrl());
        }
        
        return $checkoutUrl;
    }
}
