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
 * @package     Mageplaza_BetterMaintenance
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

define(
    [
        'jquery'
    ], function ($) {
        'use strict';
        $.widget(
            'mageplaza.betterMaintenance', {
                _create: function () {
                    var self         = this,
                        email        = $("#email_address"),
                        submitButton = $('.form.form-create-account .action.submit'),
                        emailData    = self.options.data.emails;

                    submitButton.attr('disabled', 'disabled');

                    email.focusout(function () {
                        if (emailData.includes(email.val())) {
                            $('.mpbm-error').remove();
                            submitButton.attr('disabled', 'disabled');
                            email.parent('div.control').append('<div for="email_address" generated="true" class="mage-error mpbm-error" id="email_address-error">This email address is already subscribed!</div>');
                        } else {
                            $('.mpbm-error').remove();
                            submitButton.removeAttr("disabled");
                        }
                    });
                }
            }
        );

        return $.mageplaza.betterMaintenance;
    }
);
