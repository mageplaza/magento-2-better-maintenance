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

namespace Mageplaza\BetterMaintenance\Block\Preview;

/**
 * Class Comingsoon
 *
 * @package Mageplaza\BetterMaintenance\Block\Preview
 */
class Background extends Comingsoon
{
    const BG_TYPE = 'image';

    /**
     * @return mixed
     */
    public function getFullActionName()
    {
        return $this->getRequest()->getFullActionName();
    }

    /**
     * @return string
     */
    public function getBgType()
    {
        $code = $this->getFullActionName() === 'mpbettermaintenance_preview_maintenance'
            ? '[maintenance_background]'
            : '[comingsoon_background]';

        $type = $this->getFormData()[$code];

        return $type === '1' ? self::BG_TYPE : $type;
    }

    /**
     * @return string
     */
    public function getListImagesUrls()
    {
        $code = $this->getFullActionName() === 'mpbettermaintenance_preview_maintenance'
            ? '[maintenance_background_multi_image]'
            : '[comingsoon_background_multi_image]';

        return implode(',', $this->getMultipleImagesUrl($code));
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->getFullActionName() === 'mpbettermaintenance_preview_maintenance' ? 'maintenance' : 'comingsoon';
    }

    /**
     * @return string
     */
    public function getImageCode()
    {
        return $this->getFullActionName() === 'mpbettermaintenance_preview_maintenance'
            ? '[maintenance_background_image]'
            : '[comingsoon_background_image]';
    }

    /**
     * @return string
     */
    public function getVideoCode()
    {
        return $this->getFullActionName() === 'mpbettermaintenance_preview_maintenance'
            ? '[maintenance_background_video]'
            : '[comingsoon_background_video]';
    }
}
