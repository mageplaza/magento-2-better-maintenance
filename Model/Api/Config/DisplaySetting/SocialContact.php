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

use Magento\Framework\DataObject;;
use Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\SocialContactInterface;

/**
 * Class ComingSoonSetting
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class SocialContact extends DataObject implements SocialContactInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSocialEnabled()
    {
        return $this->getData(self::SOCIAL_ENABLED);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialEnabled($value)
    {
        return $this->setData(self::SOCIAL_ENABLED, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialLabelColor()
    {
        return $this->getData(self::SOCIAL_LABEL_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialLabelColor($value)
    {
        return $this->setData(self::SOCIAL_LABEL_COLOR, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialLabel()
    {
        return $this->getData(self::SOCIAL_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialLabel($value)
    {
        return $this->setData(self::SOCIAL_LABEL, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialFacebook()
    {
        return $this->getData(self::SOCIAL_FACEBOOK);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialFacebook($value)
    {
        return $this->setData(self::SOCIAL_FACEBOOK, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialInstagram()
    {
        return $this->getData(self::SOCIAL_INSTAGRAM);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialInstagram($value)
    {
        return $this->setData(self::SOCIAL_INSTAGRAM, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialGoogle()
    {
        return $this->getData(self::SOCIAL_GOOGLE);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialGoogle($value)
    {
        return $this->setData(self::SOCIAL_GOOGLE, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialYoutube()
    {
        return $this->getData(self::SOCIAL_YOUTUBE);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialYoutube($value)
    {
        return $this->setData(self::SOCIAL_YOUTUBE, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialPinterest()
    {
        return $this->getData(self::SOCIAL_PINTEREST);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialPinterest($value)
    {
        return $this->setData(self::SOCIAL_PINTEREST, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getSocialFacebookIconUrl()
    {
        return $this->getData(self::SOCIAL_FACEBOOK_ICON_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialFacebookIconUrl($value)
    {
        return $this->setData(self::SOCIAL_FACEBOOK_ICON_URL, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialInstagramIconUrl()
    {
        return $this->getData(self::SOCIAL_INSTAGRAM_ICON_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialInstagramIconUrl($value)
    {
        return $this->setData(self::SOCIAL_INSTAGRAM_ICON_URL, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialGoogleIconUrl()
    {
        return $this->getData(self::SOCIAL_GOOGLE_ICON_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialGoogleIconUrl($value)
    {
        return $this->setData(self::SOCIAL_GOOGLE_ICON_URL, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialYoutubeIconUrl()
    {
        return $this->getData(self::SOCIAL_YOUTUBE_ICON_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialYoutubeIconUrl($value)
    {
        return $this->setData(self::SOCIAL_YOUTUBE_ICON_URL, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialPinterestIconUrl()
    {
        return $this->getData(self::SOCIAL_PINTEREST_ICON_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialPinterestIconUrl($value)
    {
        return $this->setData(self::SOCIAL_PINTEREST_ICON_URL, $value);
    }
}
