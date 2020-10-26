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
use Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySettingInterface;

/**
 * Class ComingSoonSetting
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class DisplaySetting extends DataObject implements DisplaySettingInterface
{
    /**
     * {@inheritdoc}
     */
    public function getClockSetting()
    {
        return $this->getData(self::CLOCK_SETTING);
    }

    /**
     * {@inheritdoc}
     */
    public function setClockSetting($value)
    {
        return $this->setData(self::CLOCK_SETTING, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSubscribeSetting()
    {
        return $this->getData(self::SUBSCRIBE_SETTING);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubscribeSetting($value)
    {
        return $this->setData(self::SUBSCRIBE_SETTING, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getFooterBlock()
    {
        return $this->getData(self::FOOTER_BLOCK);
    }

    /**
     * {@inheritdoc}
     */
    public function setFooterBlock($value)
    {
        return $this->setData(self::FOOTER_BLOCK, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSocialContact()
    {
        return $this->getData(self::SOCIAL_CONTACT);
    }

    /**
     * {@inheritdoc}
     */
    public function setSocialContact($value)
    {
        return $this->setData(self::SOCIAL_CONTACT, $value);
    }
}
