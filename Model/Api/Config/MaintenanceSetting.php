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

namespace Mageplaza\BetterMaintenance\Model\Api\Config;

use Magento\Framework\DataObject;
use Mageplaza\BetterMaintenance\Api\Data\Config\MaintenanceSettingInterface;

/**
 * Class MaintenanceSetting
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class MaintenanceSetting extends DataObject implements MaintenanceSettingInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMaintenanceLayout()
    {
        return $this->getData(self::MAINTENANCE_LAYOUT);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceLayout($value)
    {
        return $this->setData(self::MAINTENANCE_LAYOUT, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceTitle()
    {
        return $this->getData(self::MAINTENANCE_TITLE);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceTitle($value)
    {
        return $this->setData(self::MAINTENANCE_TITLE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceDescription()
    {
        return $this->getData(self::MAINTENANCE_DESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceDescription($value)
    {
        return $this->setData(self::MAINTENANCE_DESCRIPTION, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceColor()
    {
        return $this->getData(self::MAINTENANCE_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceColor($value)
    {
        return $this->setData(self::MAINTENANCE_COLOR, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceBackground()
    {
        return $this->getData(self::MAINTENANCE_BACKGROUND);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceBackground($value)
    {
        return $this->setData(self::MAINTENANCE_BACKGROUND, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceProgressEnabled()
    {
        return $this->getData(self::MAINTENANCE_PROGRESS_ENABLED);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceProgressEnabled($value)
    {
        return $this->setData(self::MAINTENANCE_PROGRESS_ENABLED, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceProgressValue()
    {
        return $this->getData(self::MAINTENANCE_PROGRESS_VALUE);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceProgressValue($value)
    {
        return $this->setData(self::MAINTENANCE_PROGRESS_VALUE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceProgressLabelColor()
    {
        return $this->getData(self::MAINTENANCE_PROGRESS_LABEL_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceProgressLabelColor($value)
    {
        return $this->setData(self::MAINTENANCE_PROGRESS_LABEL_COLOR, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceProgressBarColor()
    {
        return $this->getData(self::MAINTENANCE_PROGRESS_BAR_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceProgressBarColor($value)
    {
        return $this->setData(self::MAINTENANCE_PROGRESS_BAR_COLOR, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceProgressLabel()
    {
        return $this->getData(self::MAINTENANCE_PROGRESS_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceProgressLabel($value)
    {
        return $this->setData(self::MAINTENANCE_PROGRESS_LABEL, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceLogo()
    {
        return $this->getData(self::MAINTENANCE_LOGO);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceLogo($value)
    {
        return $this->setData(self::MAINTENANCE_LOGO, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceBackgroundVideo()
    {
        return $this->getData(self::MAINTENANCE_BACKGROUND_VIDEO);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceBackgroundVideo($value)
    {
        return $this->setData(self::MAINTENANCE_BACKGROUND_VIDEO, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceBackgroundImage()
    {
        return $this->getData(self::MAINTENANCE_BACKGROUND_IMAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceBackgroundImage($value)
    {
        return $this->setData(self::MAINTENANCE_BACKGROUND_IMAGE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaintenanceBackgroundMultiImage()
    {
        return $this->getData(self::MAINTENANCE_BACKGROUND_MULTI_IMAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaintenanceBackgroundMultiImage($value)
    {
        return $this->setData(self::MAINTENANCE_BACKGROUND_MULTI_IMAGE, $value);
    }
}
