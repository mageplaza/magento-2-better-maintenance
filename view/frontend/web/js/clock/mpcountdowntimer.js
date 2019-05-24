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
 * @package   Mageplaza_CountdownTimer
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */
define(
    [
        'jquery',
        'Mageplaza_BetterMaintenance/js/clock/mpcountdownInterval'
    ], function ($, mpcountdownInterval) {
        "use strict";

        $.widget(
            'mageplaza.mpcountdowntimer',
            {
                _create: function () {
                    mpcountdownInterval.setCountdown(
                        $(this.options.timer_id),
                        // this.options.rule,
                        this.options.timezone,
                        this.options.endtime,
                        this.options.enabled
                    );
                }
            }
        );

        return $.mageplaza.mpcountdowntimer;
    }
);
