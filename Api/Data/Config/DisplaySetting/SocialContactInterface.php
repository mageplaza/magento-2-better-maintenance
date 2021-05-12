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

namespace Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting;

/**
 * Interface ComingSoonSettingInterface
 * @package Mageplaza\BetterMaintenance\Api\Data\Config
 */
interface SocialContactInterface
{
    const SOCIAL_ENABLED            = 'social_enabled';
    const SOCIAL_LABEL_COLOR        = 'social_label_color';
    const SOCIAL_LABEL              = 'social_label';
    const SOCIAL_FACEBOOK           = 'social_facebook';
    const SOCIAL_INSTAGRAM          = 'social_instagram';
    const SOCIAL_GOOGLE             = 'social_google';
    const SOCIAL_YOUTUBE            = 'social_youtube';
    const SOCIAL_PINTEREST          = 'social_pinterest';
    const SOCIAL_FACEBOOK_ICON_URL  = 'social_facebook_icon_url';
    const SOCIAL_INSTAGRAM_ICON_URL = 'social_instagram_icon_url';
    const SOCIAL_GOOGLE_ICON_URL    = 'social_google_icon_url';
    const SOCIAL_YOUTUBE_ICON_URL   = 'social_youtube_icon_url';
    const SOCIAL_PINTEREST_ICON_URL = 'social_pinterest_icon_url';

    /**
     * @return boolean
     */
    public function getSocialEnabled();

    /**
     * @param boolean $value
     *
     * @return $this
     */
    public function setSocialEnabled($value);

    /**
     * @return string
     */
    public function getSocialLabelColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialLabelColor($value);

    /**
     * @return string
     */
    public function getSocialLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialLabel($value);

    /**
     * @return string
     */
    public function getSocialFacebook();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialFacebook($value);

    /**
     * @return string
     */
    public function getSocialInstagram();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialInstagram($value);

    /**
     * @return string
     */
    public function getSocialGoogle();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialGoogle($value);

    /**
     * @return string
     */
    public function getSocialYoutube();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialYoutube($value);

    /**
     * @return string
     */
    public function getSocialPinterest();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialPinterest($value);

    /**
     * @return string
     */
    public function getSocialFacebookIconUrl();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialFacebookIconUrl($value);

    /**
     * @return string
     */
    public function getSocialInstagramIconUrl();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialInstagramIconUrl($value);

    /**
     * @return string
     */
    public function getSocialGoogleIconUrl();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialGoogleIconUrl($value);

    /**
     * @return string
     */
    public function getSocialYoutubeIconUrl();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialYoutubeIconUrl($value);

    /**
     * @return string
     */
    public function getSocialPinterestIconUrl();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSocialPinterestIconUrl($value);
}
