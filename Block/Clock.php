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
namespace Mageplaza\BetterMaintenance\Block;

use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Model\Config\Source\System\ClockTemplate;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\Stdlib\DateTime\DateTime;

/**
 * Class Clock
 * @package Mageplaza\BetterMaintenance\Block
 */
class Clock extends Template
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var TimezoneInterface
     */
    protected $_localeDate;

    /**
     * @var DateTime
     */
    protected $_date;

    /**
     * Clock constructor.
     *
     * @param HelperData $helperData
     * @param TimezoneInterface $localeDate
     * @param DateTime $date
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        HelperData $helperData,
        TimezoneInterface $localeDate,
        DateTime $date,
        Template\Context $context,
        array $data = []
    ) {
        $this->_helperData = $helperData;
        $this->_localeDate = $localeDate;
        $this->_date       = $date;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getCurrentTime()
    {
        return $this->_date->gmtDate();
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->_localeDate->getConfigTimezone();
    }

    /**
     * @param $style
     *
     * @return string
     */
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
        <span class="' . $style . '-txt2 mp-countdown-txt fs-45b">' . __('Days') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-hours"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-45">:</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-minutes"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-45">:</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-seconds"></span>
    </div>
</div>';

        return ($style === ClockTemplate::SIMPLE) ? $template1 : $template;
    }
}
