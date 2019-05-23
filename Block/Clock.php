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
 * @package   Mageplaza_CountdownTimer
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BetterMaintenance\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Model\Config\Source\System\ClockTemplate;

/**
 * Class Widget
 *
 * @package Mageplaza\CountdownTimer\Block
 */
class Clock extends Template
{
    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * Widget constructor.
     *
     * @param Template\Context $context
     * @param Data $helperData
     * @param Registry $registry
     * @param RulesFactory $ruleFactory
     * @param ResourceModelRules $resourceModel
     * @param array $data
     */
    public function __construct
    (
        HelperData $helperData,
        Template\Context $context,
        array $data = []
    ) {
        $this->_helperData = $helperData;
        parent::__construct($context, $data);
    }

    public function getClockTemplate($style)
    {
        $modern = ($style === ClockTemplate::MODERN) ? 'countdown-modern' : '';

        $template = '<div class="flex-box ' . $modern . '">
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-days"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Days') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-hours"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Hours') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-minutes"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Minutes') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-seconds"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Seconds') . '</span>
    </div>
</div>';

        $template1 = '<div class="simple-container">
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-days"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-12">' . __('Days') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-hours"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-18">:</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-minutes"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-18">:</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-seconds"></span>
    </div>
</div>';

        return ($style === ClockTemplate::SIMPLE) ? $template1 : $template;
    }
}
