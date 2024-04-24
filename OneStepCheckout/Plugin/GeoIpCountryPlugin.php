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

use Magento\Tax\Model\TaxConfigProvider;
use Seofeb\OneStepCheckout\Service\GeoService;

class GeoIpCountryPlugin
{
    /**
     * @var GeoService
     */
    private $geoService;

    /**
     * One step checkout helper
     *
     * @var \Seofeb\OneStepCheckout\Helper\Config
     */
    protected $_config;

    /**
     * @param GeoService $geoService
     */
    public function __construct(
        GeoService $geoService,
        \Seofeb\OneStepCheckout\Helper\Config $config
    ) {
        $this->geoService = $geoService;
        $this->_config = $config;
    }

    /**
     * @param TaxConfigProvider $subject
     * @param callable $proceed
     * @return array
     */
    public function aroundGetConfig(TaxConfigProvider $subject, callable $proceed)
    {
        $config = $proceed();
        if (!$this->_config->isEnabled() || !$this->_config->isGeoIpEnabled()) {
            return $config;
        }
        $country = $this->geoService->getCountry();
        if ($country !== null) {
            $config['defaultCountryId'] = $country;
        }
        return $config;
    }
}
