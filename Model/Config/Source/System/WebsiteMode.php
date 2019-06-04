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
namespace Mageplaza\BetterMaintenance\Model\Config\Source\System;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class WebsiteMode
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class WebsiteMode implements ArrayInterface
{
    const LIVE_MODE        = 'live';
    const MAINTENANCE_MODE = 'maintenance';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::LIVE_MODE, 'label' => __('Live Site Mode')],
            ['value' => self::MAINTENANCE_MODE, 'label' => __('Maintenance Site Mode')]
        ];
    }
}
