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
 * Interface ComingSoonSettingInterface
 * @package Mageplaza\BetterMaintenance\Api\Data\Config
 */
interface ComingSoonSettingInterface
{
    const COMINGSOON_LAYOUT                 = 'comingsoon_layout';
    const COMINGSOON_TITLE                  = 'comingsoon_title';
    const COMINGSOON_DESCRIPTION            = 'comingsoon_description';
    const COMINGSOON_COLOR                  = 'comingsoon_color';
    const COMINGSOON_BACKGROUND             = 'comingsoon_background';
    const COMINGSOON_LOGO                   = 'comingsoon_logo';
    const COMINGSOON_BACKGROUND_VIDEO       = 'comingsoon_background_video';
    const COMINGSOON_BACKGROUND_IMAGE       = 'comingsoon_background_image';
    const COMINGSOON_BACKGROUND_MULTI_IMAGE = 'comingsoon_background_multi_image';
    const COMINGSOON_METATITLE              = 'comingsoon_metatitle';
    const COMINGSOON_METAKEYWORDS           = 'comingsoon_metakeywords';
    const COMINGSOON_METADESCRIPTION        = 'comingsoon_metadescription';

    /**
     * @return string
     */
    public function getComingsoonLayout();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonLayout($value);

    /**
     * @return string
     */
    public function getComingsoonTitle();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonTitle($value);

    /**
     * @return string
     */
    public function getComingsoonDescription();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonDescription($value);

    /**
     * @return string
     */
    public function getComingsoonColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonColor($value);

    /**
     * @return string
     */
    public function getComingsoonBackground();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonBackground($value);

    /**
     * @return string
     */
    public function getComingsoonLogo();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonLogo($value);

    /**
     * @return string
     */
    public function getComingsoonBackgroundVideo();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonBackgroundVideo($value);

    /**
     * @return string
     */
    public function getComingsoonBackgroundImage();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonBackgroundImage($value);

    /**
     * @return string
     */
    public function getComingsoonBackgroundMultiImage();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonBackgroundMultiImage($value);

    /**
     * @return string
     */
    public function getComingsoonMetatitle();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonMetatitle($value);

    /**
     * @return string
     */
    public function getComingsoonMetakeywords();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonMetakeywords($value);

    /**
     * @return string
     */
    public function getComingsoonMetadescription();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComingsoonMetadescription($value);
}
