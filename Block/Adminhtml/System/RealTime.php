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
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Stdlib\DateTime\DateTime;

/**
 * Class RealTime
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
class RealTime extends Field
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    protected $_date;

    /**
     * RealTime constructor.
     *
     * @param Registry $coreRegistry
     * @param DateTime $date
     * @param Context $context
     * @param array $data
     */
    public function __construct
    (
        Registry $coreRegistry,
        DateTime $date,
        Context $context,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_date         = $date;
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = '';
        $html .= $this->_date->gmtDate('F j, Y');
        $html .= '<br>';
        $html .= $this->_date->gmtDate('g:i A');

        return $html;
    }
}
