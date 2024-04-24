<?php
namespace Seofeb\OrderComment\Api;

/**
 * Interface for saving the checkout comment to the quote for orders of logged in users
 * @api
 */
interface OrderCommentManagementInterface
{
    /**
     * @param int $cartId
     * @param \Seofeb\OrderComment\Api\Data\OrderCommentInterface $orderComment
     * @return string
     */
    public function saveOrderComment(
        $cartId,
        \Seofeb\OrderComment\Api\Data\OrderCommentInterface $orderComment
    );
}
