/**
 * Copyright © 2017 Seofeb. All rights reserved.
 * See LICENSE.txt for license details.
 */
var config = {
    map: {
        '*': {
            async: 'Seofeb_OneStepCheckout/js/async',
            'Magento_Checkout/js/model/shipping-save-processor/default': 'Seofeb_OneStepCheckout/js/model/shipping-save-processor/default'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Seofeb_OneStepCheckout/js/mixin/shipping-mixin': true
            },
            'Magento_Checkout/js/view/billing-address': {
                'Seofeb_OneStepCheckout/js/mixin/billing-address-mixin': true
            },
            'Magento_Checkout/js/view/shipping-address/address-renderer/default': {
                'Seofeb_OneStepCheckout/js/mixin/shipping-address-address-renderer-mixin': true
            },
            'Magento_Checkout/js/model/step-navigator': {
                'Seofeb_OneStepCheckout/js/mixin/step-navigator-mixin': true
            },
            'Magento_Checkout/js/model/payment-service': {
                'Seofeb_OneStepCheckout/js/mixin/payment-service-mixin': true
            },
            'Magento_Checkout/js/model/shipping-rate-registry': {
                'Seofeb_OneStepCheckout/js/mixin/shipping-rate-registry-mixin': true
            },
            'Magento_Checkout/js/view/progress-bar': {
                'Seofeb_OneStepCheckout/js/mixin/progress-bar-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'Seofeb_OneStepCheckout/js/mixin/payment-mixin': true
            },
            'Magento_Checkout/js/view/payment/default': {
                'Seofeb_OneStepCheckout/js/mixin/payment-default-mixin': true
            },
            'Magento_Checkout/js/view/summary/cart-items': {
                'Seofeb_OneStepCheckout/js/mixin/cart-items-mixin': true
            },
            'Magento_Checkout/js/view/summary/shipping': {
                'Seofeb_OneStepCheckout/js/mixin/summary-shipping-mixin': true
            },
            'Magento_Checkout/js/view/summary/abstract-total': {
                'Seofeb_OneStepCheckout/js/mixin/abstract-total-mixin': true
            },
            'Magento_Checkout/js/view/form/element/email': {
                'Seofeb_OneStepCheckout/js/mixin/email-mixin': true
            },
            'Magento_Checkout/js/model/shipping-rates-validator': {
                'Seofeb_OneStepCheckout/js/mixin/shipping-rates-validator-mixin': true
            },
            'Magento_Checkout/js/model/shipping-service': {
                'Seofeb_OneStepCheckout/js/mixin/shipping-service-mixin': true
            },
            'Magento_Checkout/js/action/place-order': {
                'Magento_CheckoutAgreements/js/model/place-order-mixin': false,
                'Seofeb_OneStepCheckout/js/mixin/place-order-mixin': true
            }
        }
    }
};