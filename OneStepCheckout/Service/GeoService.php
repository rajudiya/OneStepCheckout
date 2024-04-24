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
namespace Seofeb\OneStepCheckout\Service;

use GeoIp2\Database\Reader;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\Module\Dir as ModuleDirectory;

class GeoService
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var RemoteAddress
     */
    private $remoteAddress;

    /**
     * @var ModuleDirectory
     */
    private $moduleDirectory;

    /**
     * @var ReaderFactory
     */
    private $readerFactory;

    /**
     * @param ModuleDirectory $moduleDirectory
     * @param ReaderFactory $readerFactory
     * @param RemoteAddress $remoteAddress
     */
    public function __construct(
        ModuleDirectory $moduleDirectory,
        RemoteAddress $remoteAddress
    ) {
        $this->remoteAddress = $remoteAddress;
        $this->moduleDirectory = $moduleDirectory;
    }

    /**
     * @return Reader
     */
    private function getReader()
    {
        if ($this->reader === null) {
            $this->reader = new Reader($this->moduleDirectory->getDir('Seofeb_OneStepCheckout') .
            '/var/GeoLite2-Country.mmdb');
        }
        return $this->reader;
    }

    /**
     * Gets country from remote address.
     *
     * @return null|string
     */
    public function getCountry()
    {
        try {
            $address = $this->remoteAddress->getRemoteAddress();
            //return $this->getReader()->country($address)->country->isoCode;
        } catch (\Exception $e) {
            return null;
        }
    }
}
