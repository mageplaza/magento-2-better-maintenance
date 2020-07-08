<?php
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

namespace Mageplaza\BetterMaintenance\Block\Adminhtml\System;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class DatePicker
 *
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
class DatePicker extends Field
{
    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();

        $html .= '<button type="button" style="display:none;" class="ui-datepicker-trigger '
            . 'v-middle"></button>';

        $html .= '<script type="text/javascript">
        require(["jquery", "jquery/ui", "mage/calendar"], function ($) {
            $(document).ready(function () {
                $("#' . $element->getHtmlId() . '").datetimepicker({dateFormat: "m/d/y", ampm: true});
                var picker = $(".ui-datepicker-trigger");
                picker.removeAttr("style");
                picker.click(function(){
                    $("#' . $element->getHtmlId() . '").focus();
                });
            });
        });
        </script>';

        return $html;
    }
}
