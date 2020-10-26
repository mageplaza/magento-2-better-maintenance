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

namespace Mageplaza\BetterMaintenance\Model\Api\Config\DisplaySetting;

use Magento\Framework\DataObject;
use Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\ClockSettingInterface;

/**
 * Class ComingSoonSetting
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class ClockSetting extends DataObject implements ClockSettingInterface
{

    /**
     * {@inheritdoc}
     */
    public function getClockEnabled()
    {
        return $this->getData(self::CLOCK_ENABLED);
    }

    /**
     * {@inheritdoc}
     */
    public function setClockEnabled($value)
    {
        return $this->setData(self::CLOCK_ENABLED, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getClockTemplate()
    {
        return $this->getData(self::CLOCK_TEMPLATE);
    }

    /**
     * {@inheritdoc}
     */
    public function setClockTemplate($value)
    {
        return $this->setData(self::CLOCK_TEMPLATE, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getClockBackgroundColor()
    {
        return $this->getData(self::CLOCK_BACKGROUND_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setClockBackgroundColor($value)
    {
        return $this->setData(self::CLOCK_BACKGROUND_COLOR, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getClockNumberColor()
    {
        return $this->getData(self::CLOCK_NUMBER_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setClockNumberColor($value)
    {
        return $this->setData(self::CLOCK_NUMBER_COLOR, $value);
    }
}
