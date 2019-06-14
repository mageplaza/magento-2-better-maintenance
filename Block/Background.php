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

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Background
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Background extends Comingsoon
{
    /**
     * @return mixed
     */
    public function getFullActionName()
    {
        return $this->getRequest()->getFullActionName();
    }

    /**
     * @return mixed
     */
    public function getBackgroundType()
    {
        if ($this->getFullActionName() === 'mpbettermaintenance_maintenance_index') {
            return $this->getMaintenanceSetting('maintenance_background');
        }

        return $this->getComingSoonSetting('comingsoon_background');
    }

    /**
     * @return array|null
     * @throws NoSuchEntityException
     */
    public function getListImagesUrl()
    {
        if ($this->getFullActionName() === 'mpbettermaintenance_maintenance_index') {
            return $this->getMultipleImagesUrl($this->getMaintenanceSetting('maintenance_background_multi_image'));
        }

        return $this->getMultipleImagesUrl($this->getComingSoonSetting('comingsoon_background_multi_image'));
    }

    /**
     * @return string|null
     * @throws NoSuchEntityException
     */
    public function getBgImageUrl()
    {
        if ($this->getFullActionName() === 'mpbettermaintenance_maintenance_index') {
            return $this->getImageUrl($this->getMaintenanceSetting('maintenance_background_image'));
        }

        return $this->getImageUrl($this->getComingSoonSetting('comingsoon_background_image'));
    }

    /**
     * @return string|null
     * @throws NoSuchEntityException
     */
    public function getBgVideoUrl()
    {
        if ($this->getFullActionName() === 'mpbettermaintenance_maintenance_index') {
            return $this->getVideoUrl($this->getMaintenanceSetting('maintenance_background_video'));
        }

        return $this->getVideoUrl($this->getComingSoonSetting('comingsoon_background_video'));
    }

    /**
     * @return string
     */
    public function getPageClass()
    {
        if ($this->getFullActionName() === 'mpbettermaintenance_maintenance_index') {
            return 'maintenance';
        }

        return 'comingsoon';
    }
}
