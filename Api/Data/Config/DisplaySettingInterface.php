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
 * Interface DisplaySettingInterface
 * @package Mageplaza\BetterMaintenance\Api\Data\Config
 */
interface DisplaySettingInterface
{
    const CLOCK_SETTING     = 'clock_setting';
    const SUBSCRIBE_SETTING = 'subscribe_setting';
    const FOOTER_BLOCK      = 'footer_block';
    const SOCIAL_CONTACT    = 'social_contact';

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\ClockSettingInterface
     */
    public function getClockSetting();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\ClockSettingInterface $value
     *
     * @return $this
     */
    public function setClockSetting($value);

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\SubscribeSettingInterface
     */
    public function getSubscribeSetting();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\SubscribeSettingInterface $value
     *
     * @return $this
     */
    public function setSubscribeSetting($value);

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\FooterInterface
     */
    public function getFooterBlock();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\FooterInterface $value
     *
     * @return $this
     */
    public function setFooterBlock($value);

    /**
     * @return \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\SocialContactInterface
     */
    public function getSocialContact();

    /**
     * @param \Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\SocialContactInterface $value
     *
     * @return $this
     */
    public function setSocialContact($value);
}
