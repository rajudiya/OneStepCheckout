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

namespace Seofeb\Core\Controller\Adminhtml\Index;

/**
 * Class Extensions
 * @package Seofeb\Core\Controller\Adminhtml\Index
 */
class Extensions extends \Magento\Backend\App\Action
{
	/**
	 * Authorization level of a basic admin session
	 */
	const ADMIN_RESOURCE = 'Seofeb_Core::extensions';

	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $resultPageFactory;

	/**
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 */
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		$this->resultPageFactory = $resultPageFactory;

		parent::__construct($context);
	}

	public function execute()
	{
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->resultPageFactory->create();

		return $resultPage;

	}
}
