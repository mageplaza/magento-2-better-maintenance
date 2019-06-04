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
    [],
    function () {
        'use strict';

        function zeroPad(num) 
        {
            return num < 10
                ? '0' + num
                : num
                ;
        }

        return {
            /**
             * Create countdown timer
             */
            setCountdown: function (element, timezone, endTime, enabled, currentTime, baseUrl, autoSwitch) {
                // console.log(new Date(endTime).getTime());
                // Set the date we're counting down to

                var countDownHandler,
                    timeNow     = new Date(currentTime).getTime(),
                    timeEnd     = new Date(endTime).getTime(),
                    daysSpan    = element.find('.mp-countdown-days'),
                    hoursSpan   = element.find('.mp-countdown-hours'),
                    minutesSpan = element.find('.mp-countdown-minutes'),
                    secondsSpan = element.find('.mp-countdown-seconds');

                if (timeEnd < timeNow) {
                    daysSpan.html(zeroPad(0));
                    hoursSpan.html(zeroPad(0));
                    minutesSpan.html(zeroPad(0));
                    secondsSpan.html(zeroPad(0));
                    // element.remove();
                }
                // Update the count down every 1 second
                countDownHandler = setInterval(
                    function () {
                        // Get from date and time
                        var days, hours, minutes, seconds,
                            newDate    = new Date(),
                            formatDate = newDate.toLocaleString('en-US', {timeZone: timezone}),
                            now        = Date.parse(formatDate),
                            distance   = -1;

                        if (enabled === 1 && timeEnd > now) {
                            distance = timeEnd - now;
                        }
                        // console.log(window.location);

                        // Time calculations for days, hours, minutes and seconds
                        days    = Math.floor(distance / (1000 * 60 * 60 * 24));
                        hours   = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                        minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
                        seconds = Math.floor(distance % (1000 * 60) / 1000);

                        // Output the result in element
                        daysSpan.html(zeroPad(days));
                        hoursSpan.html(zeroPad(hours));
                        minutesSpan.html(zeroPad(minutes));
                        secondsSpan.html(zeroPad(seconds));
                        // console.log(window.location.host);
                        // If the count down is over, hide countdown
                        if (distance < 0) {
                            clearInterval(countDownHandler);
                            if (autoSwitch === 0) {
                                daysSpan.html(zeroPad(0));
                                hoursSpan.html(zeroPad(0));
                                minutesSpan.html(zeroPad(0));
                                secondsSpan.html(zeroPad(0));
                            } else {
                                window.location.href = baseUrl;
                            }
                            // window.location.href = baseUrl;
                            // element.hide();
                        }
                    },
                    1000
                );
            }
        };
    }
);