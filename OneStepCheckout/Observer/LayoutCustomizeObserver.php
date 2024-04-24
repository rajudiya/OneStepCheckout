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
namespace Seofeb\OneStepCheckout\Observer;

class LayoutCustomizeObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    /**
     * @var \Seofeb\OneStepCheckout\Helper\Config
     */
    protected $_config;

    public function __construct(
        \Magento\Framework\Registry $registry,
        \Seofeb\OneStepCheckout\Helper\Config $config
    ) {
        $this->_registry = $registry;
        $this->_config = $config;
    }

    /**
     * add a custom handle to categories of page type 'PAGE'
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->_config->isEnabled()) {
            return $this;
        }
        $action = $observer->getData('full_action_name');
        if ($action == 'checkout_index_index' || $action == 'onestepcheckout_index_index') {
            $layout = $observer->getData('layout');
            if ($this->_config->isRemoveHeader()) {
                if ($layout->hasElement('header_container')) {
                    $layout->unsetElement('header_container');
                }
                if ($layout->hasElement('page_top')) {
                    $layout->unsetElement('page_top');
                }
            }
            if ($this->_config->isRemoveFooter()) {
                if ($layout->hasElement('footer')) {
                    $layout->unsetElement('footer');
                }
            }
            return $this;
        }

        return $this;
    }
}
