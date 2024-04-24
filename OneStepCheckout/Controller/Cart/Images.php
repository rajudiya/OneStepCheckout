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
namespace Seofeb\OneStepCheckout\Controller\Cart;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use \Magento\Checkout\Model\Session as CheckoutSession;

class Images extends Action
{
    protected $resultJsonFactory;
    protected $checkoutSession;
    protected $imageProvider;
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        CheckoutSession $checkoutSession,
        \Magento\Checkout\Model\Cart\ImageProvider $imageProvider
    ) {
         $this->resultJsonFactory = $resultJsonFactory;
         $this->checkoutSession = $checkoutSession;
         $this->imageProvider = $imageProvider;
         parent::__construct($context);
    }
    /**
     * Action to reconfigure cart item
     *
     * @return \Magento\Framework\View\Result\Page|\Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        
        try {
            $quote = $this->checkoutSession->getQuote();
            $images = $this->imageProvider->getImages($quote->getId());
            $result = $this->resultJsonFactory->create();
            $result->setData(['success' => true,'imageData' => $images]);
            return $result;
        } catch (\Exception $e) {
            $result = $this->resultJsonFactory->create();
            $result->setData(['success' => false,'message' => $e->getMessage()]);
            return $result;
        }
    }
}
