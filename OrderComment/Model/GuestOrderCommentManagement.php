<?php
namespace Seofeb\OrderComment\Model;

use Magento\Quote\Model\QuoteIdMaskFactory;

class GuestOrderCommentManagement implements \Seofeb\OrderComment\Api\GuestOrderCommentManagementInterface
{

    /**
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;

    /**
     * @var \Seofeb\OrderComment\Api\OrderCommentManagementInterface
     */
    protected $orderCommentManagement;
    
    /**
     * GuestOrderCommentManagement constructor.
     * @param QuoteIdMaskFactory $quoteIdMaskFactory
     * @param \Seofeb\OrderComment\Api\OrderCommentManagementInterface $orderCommentManagement
     */
    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        \Seofeb\OrderComment\Api\OrderCommentManagementInterface $orderCommentManagement
    ) {
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
        $this->orderCommentManagement = $orderCommentManagement;
    }

    /**
     * {@inheritDoc}
     */
    public function saveOrderComment(
        $cartId,
        \Seofeb\OrderComment\Api\Data\OrderCommentInterface $orderComment
    ) {
        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        return $this->orderCommentManagement->saveOrderComment($quoteIdMask->getQuoteId(), $orderComment);
    }
}
