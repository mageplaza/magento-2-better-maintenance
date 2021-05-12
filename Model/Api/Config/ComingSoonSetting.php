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
use Mageplaza\BetterMaintenance\Api\Data\Config\ComingSoonSettingInterface;

/**
 * Class ComingSoonSetting
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class ComingSoonSetting extends DataObject implements ComingSoonSettingInterface
{
    /**
     * {@inheritdoc}
     */
    public function getComingsoonLayout()
    {
        return $this->getData(self::COMINGSOON_LAYOUT);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonLayout($value)
    {
        return $this->setData(self::COMINGSOON_LAYOUT, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonTitle()
    {
        return $this->getData(self::COMINGSOON_TITLE);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonTitle($value)
    {
        return $this->setData(self::COMINGSOON_TITLE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonDescription()
    {
        return $this->getData(self::COMINGSOON_DESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonDescription($value)
    {
        return $this->setData(self::COMINGSOON_DESCRIPTION, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonColor()
    {
        return $this->getData(self::COMINGSOON_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonColor($value)
    {
        return $this->setData(self::COMINGSOON_COLOR, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonBackground()
    {
        return $this->getData(self::COMINGSOON_BACKGROUND);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonBackground($value)
    {
        return $this->setData(self::COMINGSOON_BACKGROUND, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonLogo()
    {
        return $this->getData(self::COMINGSOON_LOGO);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonLogo($value)
    {
        return $this->setData(self::COMINGSOON_LOGO, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonBackgroundVideo()
    {
        return $this->getData(self::COMINGSOON_BACKGROUND_VIDEO);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonBackgroundVideo($value)
    {
        return $this->setData(self::COMINGSOON_BACKGROUND_VIDEO, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonBackgroundImage()
    {
        return $this->getData(self::COMINGSOON_BACKGROUND_IMAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonBackgroundImage($value)
    {
        return $this->setData(self::COMINGSOON_BACKGROUND_IMAGE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonBackgroundMultiImage()
    {
        return $this->getData(self::COMINGSOON_BACKGROUND_MULTI_IMAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonBackgroundMultiImage($value)
    {
        return $this->setData(self::COMINGSOON_BACKGROUND_MULTI_IMAGE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonMetatitle()
    {
        return $this->getData(self::COMINGSOON_METATITLE);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonMetatitle($value)
    {
        return $this->setData(self::COMINGSOON_METATITLE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonMetakeywords()
    {
        return $this->getData(self::COMINGSOON_METAKEYWORDS);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonMetakeywords($value)
    {
        return $this->setData(self::COMINGSOON_METAKEYWORDS, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getComingsoonMetadescription()
    {
        return $this->getData(self::COMINGSOON_METADESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setComingsoonMetadescription($value)
    {
        return $this->setData(self::COMINGSOON_METADESCRIPTION, $value);
    }
}
