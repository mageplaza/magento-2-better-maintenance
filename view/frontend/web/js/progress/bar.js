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
 * @category  Mageplaza
 * @package   Mageplaza_BetterMaintenance
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */
define(
    [
        'jquery'
    ], function ($) {
        "use strict";

        $.widget(
            'mageplaza.progressBar',
            {
                _create: function () {
                    var delay         = 500,
                        bar           = $(".progress-bar"),
                        progressLabel = this.options.progressLabel !== '1' ? this.options.progressLabel : '';

                    bar.delay(delay).animate(
                        {
                            width: bar.attr('aria-valuenow') + '%'
                        }, delay
                    );

                    bar.prop('Counter', 0).animate(
                        {
                            Counter: bar.attr('aria-valuenow')
                        }, {
                            duration: delay,
                            easing: 'swing',
                            step: function (now) {
                                bar.text(Math.ceil(now) + '% ' + progressLabel);
                            }
                        }
                    );
                }
            }
        );

        return $.mageplaza.progressBar;
    }
);
