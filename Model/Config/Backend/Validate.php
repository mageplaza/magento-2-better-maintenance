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
 * @category    Mageplaza
 * @package     Mageplaza_BetterMaintenance
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BetterMaintenance\Model\Config\Backend;

use Exception;
use Magento\Framework\App\Config\Value;

/**
 * Class Validate
 * @package Mageplaza\BetterMaintenance\Model\Config\Backend
 */
class Validate extends Value
{
    /**
     * Check value not null Exclude and Include
     *
     * @return Value
     * @throws Exception
     */
    public function beforeSave()
    {
        $allowedIps = $this->getData('fieldset_data')['whitelist_ip'];
        $whitelistIp = explode(',', $allowedIps);
        foreach ($whitelistIp as $ips) {
            if (!empty($ips) && !filter_var($ips, FILTER_VALIDATE_IP)) {
                throw new Exception(__('Whitelist IP(s) '.$ips.' is not a valid IP address!'));
            }
        }

        return parent::beforeSave();
    }
}
