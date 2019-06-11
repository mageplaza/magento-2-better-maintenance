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
use Magento\Framework\Registry;
use Magento\Backend\Block\Template\Context;

/**
 * Class DatePicker
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
class DatePicker extends Field
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * DatePicker constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        array $data = []
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();

        //check datepicker set or not
        if (!$this->_coreRegistry->registry('datepicker_loaded')) {
            $this->_coreRegistry->registry('datepicker_loaded');
        }

        //add icon on datepicker
        $html .= '<button type="button" style="display:none;" class="ui-datepicker-trigger '
            . 'v-middle"><span>Select Date</span></button>';
        // add datepicker with element by jquery
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
