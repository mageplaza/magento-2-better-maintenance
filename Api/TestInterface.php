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

namespace Mageplaza\BetterMaintenance\Api;

/**
 * Interface ConfigRepositoryInterface
 * @package Mageplaza\BetterMaintenance\Api
 */
interface TestInterface
{
    /**
     * @param string|null $storeId
     *
     * @return \Mageplaza\BetterMaintenance\Api\Data\ConfigInterface
     */
    public function getConfigs($storeId = null);
}
