/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_QuickView
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

define([
    'jquery',
    'mage/translate'
], function ($, $t) {
    'use strict';

    $.widget('mageplaza.maintenancePreview', {
        _create: function () {
            var layout = localStorage['mLayout'];

            var wrapper = $('#mpbm-column');

            switch (layout){
                case 'single':
                    wrapper.addClass('single-column-layout');
                    break;
                case 'double':
                    wrapper.addClass('double-column-layout');
                    break;
                default:
                    wrapper.addClass('double-left-column-layout');
                    break;
            }

            var pageTitle = '<div id="mpbm-page-title"><h1 class="mpbm-text" style="margin-bottom: 0">';
            pageTitle += localStorage['mTitle'] + '</h1></div><div id="mpbm-page-description"><h3 class="mpbm-text">';
            pageTitle += localStorage['mDes'] + '</h3></div>';

            if (localStorage['clockEnable']) {
                pageTitle += this.clockTemplate();
            }

            wrapper.html(pageTitle);

            $('.mpbm-text').css('color', localStorage['mLabelColor']);
        },

        clockTemplate: function () {

            var clockStyle = localStorage['clockStyle'];
            var modern     = clockStyle === 'modern' ? 'countdown-modern' : '';

            var template = '<div id="mpbm-clock"><div class="flex-box ' + modern + '">' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-days"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt">' + $t('Days') + '</span>' +
                '</div>' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-hours"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt">' + $t('Hours') + '</span>' +
                '</div>' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-minutes"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt">' + $t('Minutes') + '</span>' +
                '</div>' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-seconds"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt">' + $t('Seconds') + '</span>' +
                '</div></div></div>';

            var template1 = '<div id="mpbm-clock"><div class="simple-container">' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-days"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt fs-45b">' + $t('Days') + '</span>' +
                '</div>' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-hours"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt fs-45">:</span>' +
                '</div>' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-minutes"></span>' +
                '<span class="' + clockStyle + '-txt2 mp-countdown-txt fs-45">:</span>' +
                '</div>' +
                '<div class="' + clockStyle + ' mp-countdown-clock">' +
                '<span class="' + clockStyle + '-txt1 mp-countdown-seconds"></span>' +
                '</div></div></div>';

            return clockStyle === 'simple' ? template1 : template;
        }
    });

    return $.mageplaza.maintenancePreview;
});

