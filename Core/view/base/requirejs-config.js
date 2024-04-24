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

var config = {
    paths: {
        'seofeb/core/jquery/popup': 'Seofeb_Core/js/jquery.magnific-popup.min',
        'seofeb/core/owl.carousel': 'Seofeb_Core/js/owl.carousel.min',
        'seofeb/core/bootstrap': 'Seofeb_Core/js/bootstrap.min',
        mpIonRangeSlider: 'Seofeb_Core/js/ion.rangeSlider.min',
        touchPunch: 'Seofeb_Core/js/jquery.ui.touch-punch.min',
        mpDevbridgeAutocomplete: 'Seofeb_Core/js/jquery.autocomplete.min'
    },
    shim: {
        "seofeb/core/jquery/popup": ["jquery"],
        "seofeb/core/owl.carousel": ["jquery"],
        "seofeb/core/bootstrap": ["jquery"],
        mpIonRangeSlider: ["jquery"],
        mpDevbridgeAutocomplete: ["jquery"],
        touchPunch: ['jquery', 'jquery/ui']
    }
};
