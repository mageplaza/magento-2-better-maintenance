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
 * Class LayoutOptions
 *
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class LayoutOptions implements ArrayInterface
{
    const SINGLE_COLUMN      = 'single';
    const DOUBLE_COLUMN      = 'double';
    const DOUBLE_LEFT_COLUMN = 'double_left';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::SINGLE_COLUMN, 'label' => __('Single-column')],
            ['value' => self::DOUBLE_COLUMN, 'label' => __('Double-columns')],
            ['value' => self::DOUBLE_LEFT_COLUMN, 'label' => __('Double-columns with Left-side content')]
        ];
    }
}
