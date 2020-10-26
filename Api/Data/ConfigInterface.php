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

namespace Mageplaza\BetterMaintenance\Api\Data;

/**
 * Interface TransactionInterface
 * @package Mageplaza\BetterMaintenance\Api\Data
 */
interface ConfigInterface
{
    const GENERAL = 'general';
    const DISPLAY_SETTING = 'display_setting';
    const MAINTENANCE_SETTING = 'maintenance_setting';
    const COMINGSOON_SETTING = 'comingsoon_setting';

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\GeneralInterface
     */
    public function getGeneral();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\GeneralInterface $value
     *
     * @return $this
     */
    public function setGeneral($value);

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySettingInterface
     */
    public function getDisplaySetting();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySettingInterface $value
     *
     * @return $this
     */
    public function setDisplaySetting($value);

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\MaintenanceSettingInterface
     */
    public function getMaintenanceSetting();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\MaintenanceSettingInterface $value
     *
     * @return $this
     */
    public function setMaintenanceSetting($value);

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\ComingSoonSettingInterface
     */
    public function getComingsoonSetting();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\ComingSoonSettingInterface $value
     *
     * @return $this
     */
    public function setComingsoonSetting($value);
}
