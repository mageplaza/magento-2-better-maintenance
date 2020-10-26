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

namespace Mageplaza\BetterMaintenance\Model;

use Magento\Framework\DataObject;
use Mageplaza\BetterMaintenance\Api\Data\ConfigInterface;

/**
 * Class Config
 * @package Mageplaza\BetterMaintenance\Model
 */
class Config extends DataObject implements ConfigInterface
{
    /**
     * {@inheritdoc}
     */
    public function getGeneral()
    {
        return $this->getData(self::GENERAL);
    }

    /**
     * {@inheritdoc}
     */
    public function setGeneral($value)
    {
        return $this->setData(self::GENERAL, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getDisplaySetting()
    {
        return $this->getData(self::DISPLAY_SETTING);
    }

    /**
     * {@inheritdoc}
     */
    public function setDisplaySetting($value)
    {
        return $this->setData(self::DISPLAY_SETTING, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceSetting()
    {
        return $this->getData(self::MAINTENANCE_SETTING);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceSetting($value)
    {
        return $this->setData(self::MAINTENANCE_SETTING, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonSetting()
    {
        return $this->getData(self::COMINGSOON_SETTING);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonSetting($value)
    {
        return $this->setData(self::COMINGSOON_SETTING, $value);
    }
}
