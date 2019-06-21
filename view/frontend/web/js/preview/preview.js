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
        'use strict';

        function zeroPad(num) 
        {
            return num < 10 ? '0' + num : num;
        }

        $.widget(
            'mageplaza.preview', {
                _create: function () {
                    this.progressBar();
                    this.setCountdown();
                },

                progressBar: function () {
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
                },

                setCountdown: function () {
                    var element     = $(this.options.timer_id),
                        timezone    = this.options.timezone,
                        endTime     = this.options.endtime,
                        currentTime = this.options.currentTime;

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

                            if (timeEnd > now) {
                                distance = timeEnd - now;
                            }

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

                            // If the count down is over, hide countdown
                            if (distance < 0) {
                                clearInterval(countDownHandler);
                                daysSpan.html(zeroPad(0));
                                hoursSpan.html(zeroPad(0));
                                minutesSpan.html(zeroPad(0));
                                secondsSpan.html(zeroPad(0));
                            }
                        },
                        1000
                    );
                }

            }
        );

        return $.mageplaza.preview;
    }
);
