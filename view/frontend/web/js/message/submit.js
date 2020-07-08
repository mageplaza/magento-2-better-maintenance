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

        var form = $('.form.subscribe');

        form.submit(function (e) {
            var url = form.attr('action'),
                email = $("#newsletter").val();

            if (form.validation('isValid')) {
                e.preventDefault();
                $.ajax({
                    url: url,
                    dataType: 'json',
                    type: 'POST',
                    showLoader: true,
                    data: {email: email},
                    error: function (res) {
                        $('#mpbm-notice-msg').html(res.responseJSON);
                    }
                });
            }
        });
    }
);
