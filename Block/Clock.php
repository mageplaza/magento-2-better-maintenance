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
use Magento\Framework\Stdlib\DateTime\DateTime;
use Mageplaza\BetterMaintenance\Block\Preview\Maintenance as PreviewBlock;

/**
 * Class Clock
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Clock extends Template
{
    const CLOCK_NUMBER_COLOR = '#FFFFFF';
    const CLOCK_BG_COLOR     = '#000000';

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var DateTime
     */
    protected $_date;

    /**
     * @var PreviewBlock
     */
    protected $_previewBlock;

    /**
     * Clock constructor.
     *
     * @param HelperData       $helperData
     * @param DateTime         $date
     * @param PreviewBlock     $previewBlock
     * @param Template\Context $context
     * @param array            $data
     */
    public function __construct(
        HelperData $helperData,
        DateTime $date,
        PreviewBlock $previewBlock,
        Template\Context $context,
        array $data = []
    ) {
        $this->_helperData   = $helperData;
        $this->_date         = $date;
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
        $color = $this->getFormData()['[clock_number_color]'];

        return $color === '1' ? self::CLOCK_NUMBER_COLOR : $color;
    }

    /**
     * @return mixed|string
     */
    public function getClockBgColor()
    {
        $color = $this->getFormData()['[clock_background_color]'];

        return $color === '1' ? self::CLOCK_BG_COLOR : $color;
    }
}
