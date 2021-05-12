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

namespace Mageplaza\BetterMaintenance\Api\Data\Config;

/**
 * Interface MaintenanceSettingInterface
 * @package Mageplaza\BetterMaintenance\Api\Data\Config
 */
interface MaintenanceSettingInterface
{
    const MAINTENANCE_LAYOUT                 = 'maintenance_layout';
    const MAINTENANCE_TITLE                  = 'maintenance_title';
    const MAINTENANCE_DESCRIPTION            = 'maintenance_description';
    const MAINTENANCE_COLOR                  = 'maintenance_color';
    const MAINTENANCE_BACKGROUND             = 'maintenance_background';
    const MAINTENANCE_PROGRESS_ENABLED       = 'maintenance_progress_enabled';
    const MAINTENANCE_PROGRESS_VALUE         = 'maintenance_progress_value';
    const MAINTENANCE_PROGRESS_LABEL_COLOR   = 'maintenance_progress_label_color';
    const MAINTENANCE_PROGRESS_BAR_COLOR     = 'maintenance_progress_bar_color';
    const MAINTENANCE_PROGRESS_LABEL         = 'maintenance_progress_label';
    const MAINTENANCE_LOGO                   = 'maintenance_logo';
    const MAINTENANCE_BACKGROUND_VIDEO       = 'maintenance_background_video';
    const MAINTENANCE_BACKGROUND_IMAGE       = 'maintenance_background_image';
    const MAINTENANCE_BACKGROUND_MULTI_IMAGE = 'maintenance_background_multi_image';

    /**
     * @return string
     */
    public function getMaintenanceLayout();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceLayout($value);

    /**
     * @return string
     */
    public function getMaintenanceTitle();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceTitle($value);

    /**
     * @return string
     */
    public function getMaintenanceDescription();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceDescription($value);

    /**
     * @return string
     */
    public function getMaintenanceColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceColor($value);

    /**
     * @return string
     */
    public function getMaintenanceBackground();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceBackground($value);

    /**
     * @return boolean
     */
    public function getMaintenanceProgressEnabled();

    /**
     * @param boolean $value
     *
     * @return $this
     */
    public function setMaintenanceProgressEnabled($value);

    /**
     * @return int
     */
    public function getMaintenanceProgressValue();

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMaintenanceProgressValue($value);

    /**
     * @return string
     */
    public function getMaintenanceProgressLabelColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceProgressLabelColor($value);

    /**
     * @return string
     */
    public function getMaintenanceProgressBarColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceProgressBarColor($value);

    /**
     * @return string
     */
    public function getMaintenanceProgressLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceProgressLabel($value);

    /**
     * @return string
     */
    public function getMaintenanceLogo();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceLogo($value);

    /**
     * @return string
     */
    public function getMaintenanceBackgroundVideo();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceBackgroundVideo($value);

    /**
     * @return string
     */
    public function getMaintenanceBackgroundImage();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceBackgroundImage($value);

    /**
     * @return array
     */
    public function getMaintenanceBackgroundMultiImage();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMaintenanceBackgroundMultiImage($value);
}
