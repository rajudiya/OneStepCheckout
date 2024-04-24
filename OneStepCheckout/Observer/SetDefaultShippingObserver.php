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

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Quote\Model\Quote;
use Magento\Store\Model\ScopeInterface;
use Seofeb\OneStepCheckout\ConfigProvider\CheckoutConfigProvider;

class SetDefaultShippingObserver implements ObserverInterface
{
    const CONFIG_PATH_DEFAULT_SHIPPING_METHOD = 'one_step_checkout/general/default_shipping_method';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var DirectoryHelper
     */
    private $directoryHelper;

    /**
     * @var \Seofeb\OneStepCheckout\Helper\Config
     */
    protected $_config;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param DirectoryHelper $directoryHelper
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        DirectoryHelper $directoryHelper,
        \Seofeb\OneStepCheckout\Helper\Config $config
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->directoryHelper = $directoryHelper;
        $this->_config = $config;
    }

    /**
     * @return string
     */
    private function getDefaultShippingMethod()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_DEFAULT_SHIPPING_METHOD,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->_config->isEnabled()) {
            return $this;
        }
        /** @var Quote $quote */
        $quote = $observer->getData('quote');
        if ($quote->isVirtual()) {
            return;
        }
        $shippingAddress = $quote->getShippingAddress();

        if (!$shippingAddress->getShippingMethod()) {
            if (!$shippingAddress->getCountryId()) {
                $shippingAddress->setCountryId($this->directoryHelper->getDefaultCountry());
            }
            $shippingAddress->setCollectShippingRates(true)
                ->setShippingMethod($this->getDefaultShippingMethod());
        }
    }
}
