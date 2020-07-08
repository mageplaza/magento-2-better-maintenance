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
use Mageplaza\BetterMaintenance\Block\Preview\Maintenance as PreviewBlock;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Model\Config\Source\System\ClockTemplate;

/**
 * Class Clock
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Clock extends Template
{
    const CLOCK_NUMBER_COLOR = '#000000';
    const CLOCK_BG_COLOR     = '#ffffff00';

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var PreviewBlock
     */
    protected $_previewBlock;

    /**
     * Clock constructor.
     *
     * @param HelperData $helperData
     * @param PreviewBlock $previewBlock
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        HelperData $helperData,
        PreviewBlock $previewBlock,
        Template\Context $context,
        array $data = []
    ) {
        $this->_helperData   = $helperData;
        $this->_previewBlock = $previewBlock;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getCurrentTime()
    {
        return $this->_localeDate->date()->format('m/d/Y H:i:s');
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
        <span class="' . $style . '-txt1 mp-countdown-days mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Days') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-hours mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Hours') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-minutes mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Minutes') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-seconds mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt">' . __('Seconds') . '</span>
    </div>
</div>';

        $template1 = '<div class="simple-container">
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-days mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-45b">' . __('Days') . '</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-hours mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-45">:</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-minutes mp-countdown-data"></span>
        <span class="' . $style . '-txt2 mp-countdown-txt fs-45">:</span>
    </div>
    <div class="' . $style . ' mp-countdown-clock">
        <span class="' . $style . '-txt1 mp-countdown-seconds mp-countdown-data"></span>
    </div>
</div>';

        return ($style === ClockTemplate::SIMPLE) ? $template1 : $template;
    }

    /**
     * @param $code
     *
     * @return array|mixed
     */
    public function getConfigGeneral($code)
    {
        return $this->_helperData->getConfigGeneral($code);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->_helperData->isEnabled();
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getClockSetting($code)
    {
        return $this->_helperData->getClockSetting($code);
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        return $this->_previewBlock->getFormData();
    }

    /**
     * @return mixed|string
     */
    public function getClockNumberColor()
    {
        if ($this->getCtrlName()) {
            $color = $this->getFormData()['[clock_number_color]'];

            return $color === '1' ? self::CLOCK_NUMBER_COLOR : $color;
        }

        return $this->getClockSetting('clock_number_color');
    }

    /**
     * @return mixed|string
     */
    public function getClockBgColor()
    {
        if ($this->getCtrlName()) {
            $color = $this->getFormData()['[clock_background_color]'];

            return $color === '1' ? self::CLOCK_BG_COLOR : $color;
        }

        return $this->getClockSetting('clock_background_color');
    }

    /**
     * @return mixed|string
     */
    public function getClockStyle()
    {
        if ($this->getCtrlName()) {
            return $this->getFormData()['[clock_template]'] === '1'
                ? 'circle'
                : $this->getFormData()['[clock_template]'];
        }

        return $this->getClockSetting('clock_template');
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        if ($this->getCtrlName()) {
            return $this->getFormData()['[end_time]'];
        }

        return $this->getConfigGeneral('end_time');
    }

    /**
     * @return bool
     */
    public function getCtrlName()
    {
        $ctrlName = $this->_request->getControllerName();

        return $ctrlName === 'preview';
    }

    /**
     * @return array|int|mixed
     */
    public function getAutoSwitch()
    {
        if ($this->getCtrlName()) {
            return 0;
        }

        return $this->getConfigGeneral('auto_switch');
    }
}
