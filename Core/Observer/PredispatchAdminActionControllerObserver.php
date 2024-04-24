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
 * @package     Seofeb_Core
 * @copyright   Copyright (c) 2018 Seofeb (https://seofeb.com/)
 * @license     https://seofeb.com/LICENSE.txt
 */

namespace Seofeb\Core\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class PredispatchAdminActionControllerObserver
 * @package Seofeb\Core\Observer
 */
class PredispatchAdminActionControllerObserver implements ObserverInterface
{
	/**
	 * @type \Seofeb\Core\Model\FeedFactory
	 */
	protected $_feedFactory;

	/**
	 * @type \Magento\Backend\Model\Auth\Session
	 */
	protected $_backendAuthSession;

	/**
	 * @param \Seofeb\Core\Model\FeedFactory $feedFactory
	 * @param \Magento\Backend\Model\Auth\Session $backendAuthSession
	 */
	public function __construct(
		\Seofeb\Core\Model\FeedFactory $feedFactory,
		\Magento\Backend\Model\Auth\Session $backendAuthSession
	)
	{
		$this->_feedFactory        = $feedFactory;
		$this->_backendAuthSession = $backendAuthSession;
	}

	/**
	 * @param \Magento\Framework\Event\Observer $observer
	 */
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		if ($this->_backendAuthSession->isLoggedIn()) {
			/* @var $feedModel \Seofeb\Core\Model\Feed */
			$feedModel = $this->_feedFactory->create();
			$feedModel->checkUpdate();
		}
	}
}
