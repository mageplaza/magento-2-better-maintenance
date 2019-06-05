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
                        progressLabel = this.options.progressLabel;
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
