/**
 * Copyright © 2017 Seofeb. All rights reserved.
 * See LICENSE.txt for license details.
 */
define([], function () {
    'use strict';

    /**
     * Allow configuration to set shipping validator delay.
     */
    return function (target) {
        if (typeof(window.checkoutConfig.onestepcheckout) == 'undefined') {
            return target;
        }
        return target;
    };
});