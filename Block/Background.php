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
     * @return array|mixed
     */
    public function redirectTo()
    {
        return $this->_helperData->getConfigGeneral('redirect_to');
    }

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
        if ($this->redirectTo() === 'maintenance_page') {
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
        if ($this->redirectTo() === 'maintenance_page') {
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
        if ($this->redirectTo() === 'maintenance_page') {
            $image = $this->getMaintenanceSetting('maintenance_background_image');
            if (!$image) {
                return $this->getViewFileUrl(self::DEFAULT_MAINTENANCE_BG);
            }
            return $this->getImageUrl($image);
        }

        if ($this->redirectTo() === 'coming_soon_page') {
            $image = $this->getComingSoonSetting('comingsoon_background_image');
            if (!$image) {
                return $this->getViewFileUrl(self::DEFAULT_COMING_SOON_BG);
            }
            return $this->getImageUrl($image);
        }

        return '';
    }

    /**
     * @return string|null
     * @throws NoSuchEntityException
     */
    public function getBgVideoUrl()
    {
        if ($this->redirectTo() === 'maintenance_page') {
            return $this->getVideoUrl($this->getMaintenanceSetting('maintenance_background_video'));
        }

        return $this->getVideoUrl($this->getComingSoonSetting('comingsoon_background_video'));
    }

    /**
     * @return Comingsoon|Maintenance
     */
    public function _prepareLayout()
    {
        $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');
        if ($redirectTo === 'maintenance_page') {
            $this->pageConfig->getTitle()->set($this->getMaintenanceSetting('maintenance_title'));
        }
        if ($redirectTo === 'coming_soon_page') {
            $this->pageConfig->getTitle()->set($this->getComingSoonSetting('comingsoon_title'));
        }

        return parent::_prepareLayout();
    }
}
