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
use Mageplaza\BetterMaintenance\Api\Data\Config\GeneralInterface;

/**
 * Class General
 * @package Mageplaza\BetterMaintenance\Model\Api\Config
 */
class General extends DataObject implements GeneralInterface
{
    /**
     * {@inheritdoc}
     */
    public function getEnabled()
    {
        return $this->getData(self::ENABLED);
    }

    /**
     * {@inheritdoc}
     */
    public function setEnabled($value)
    {
        return $this->setData(self::ENABLED, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectTo()
    {
        return $this->getData(self::REDIRECT_TO);
    }

    /**
     * {@inheritdoc}
     */
    public function setRedirectTo($value)
    {
        return $this->setData(self::REDIRECT_TO, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoSwitch()
    {
        return $this->getData(self::AUTO_SWITCH);
    }

    /**
     * {@inheritdoc}
     */
    public function setAutoSwitch($value)
    {
        return $this->setData(self::AUTO_SWITCH, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndTime()
    {
        return $this->getData(self::END_TIME);
    }

    /**
     * {@inheritdoc}
     */
    public function setEndTime($value)
    {
        return $this->setData(self::END_TIME, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getWhitelistIp()
    {
        return $this->getData(self::WHITELIST_IP);
    }

    /**
     * {@inheritdoc}
     */
    public function setWhitelistIp($value)
    {
        return $this->setData(self::WHITELIST_IP, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getWhitelistPage()
    {
        return $this->getData(self::WHITELIST_PAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setWhitelistPage($value)
    {
        return $this->setData(self::WHITELIST_PAGE, $value);
    }
}
