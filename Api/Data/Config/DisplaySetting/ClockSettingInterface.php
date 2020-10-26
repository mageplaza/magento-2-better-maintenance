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

namespace Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting;

/**
 * Interface ComingSoonSettingInterface
 * @package Mageplaza\BetterMaintenance\Api\Data\Config
 */
interface ClockSettingInterface
{
    const CLOCK_ENABLED          = 'clock_enabled';
    const CLOCK_TEMPLATE         = 'clock_template';
    const CLOCK_BACKGROUND_COLOR = 'clock_background_color';
    const CLOCK_NUMBER_COLOR     = 'clock_number_color';

    /**
     * @return boolean
     */
    public function getClockEnabled();

    /**
     * @param boolean $value
     *
     * @return $this
     */
    public function setClockEnabled($value);

    /**
     * @return string
     */
    public function getClockTemplate();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setClockTemplate($value);

    /**
     * @return string
     */
    public function getClockBackgroundColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setClockBackgroundColor($value);

    /**
     * @return string
     */
    public function getClockNumberColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setClockNumberColor($value);
}
