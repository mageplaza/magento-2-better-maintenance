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

use Magento\Framework\DataObject;
use Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting\SubscribeSettingInterface;

/**
 * Class ComingSoonSetting
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class SubscribeSetting extends DataObject implements SubscribeSettingInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSubscribeType()
    {
        return $this->getData(self::SUBSCRIBE_TYPE);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubscribeType($value)
    {
        return $this->setData(self::SUBSCRIBE_TYPE, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSubscribeLabelColor()
    {
        return $this->getData(self::SUBSCRIBE_LABEL_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubscribeLabelColor($value)
    {
        return $this->setData(self::SUBSCRIBE_LABEL_COLOR, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getButtonLabel()
    {
        return $this->getData(self::BUTTON_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setButtonLabel($value)
    {
        return $this->setData(self::BUTTON_LABEL, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getButtonLabelColor()
    {
        return $this->getData(self::BUTTON_LABEL_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setButtonLabelColor($value)
    {
        return $this->setData(self::BUTTON_LABEL_COLOR, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getButtonBackgroundColor()
    {
        return $this->getData(self::BUTTON_BACKGROUND_COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setButtonBackgroundColor($value)
    {
        return $this->setData(self::BUTTON_BACKGROUND_COLOR, $value);
    }
    /**
     * {@inheritdoc}
     */
    public function getSubscribeLabel()
    {
        return $this->getData(self::SUBSCRIBE_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubscribeLabel($value)
    {
        return $this->setData(self::SUBSCRIBE_LABEL, $value);
    }
}
