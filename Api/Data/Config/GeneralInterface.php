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
 * Interface GeneralInterface
 * @package Mageplaza\BetterMaintenance\Api\Data
 */
interface GeneralInterface
{
    const ENABLED        = 'enabled';
    const REDIRECT_TO    = 'redirect_to';
    const AUTO_SWITCH    = 'auto_switch';
    const END_TIME       = 'end_time';
    const WHITELIST_IP   = 'whitelist_ip';
    const WHITELIST_PAGE = 'whitelist_page';

    /**
     * @return string
     */
    public function getEnabled();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEnabled($value);

    /**
     * @return string
     */
    public function getRedirectTo();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRedirectTo($value);

    /**
     * @return string
     */
    public function getAutoSwitch();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAutoSwitch($value);

    /**
     * @return string
     */
    public function getEndTime();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEndTime($value);

    /**
     * @return string
     */
    public function getWhitelistIp();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWhitelistIp($value);

    /**
     * @return array
     */
    public function getWhitelistPage();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWhitelistPage($value);
}
