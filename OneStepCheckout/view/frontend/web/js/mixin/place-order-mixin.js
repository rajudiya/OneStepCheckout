/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'mage/utils/wrapper',
    'Seofeb_OneStepCheckout/js/model/terms/assigner'
], function ($, wrapper, termsAssigner) {
    'use strict';

    return function (placeOrderAction) {

        /** Override default place order action and add agreement_ids to request */
        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            termsAssigner(paymentData);

            return originalAction(paymentData, messageContainer);
        });
    };
});
