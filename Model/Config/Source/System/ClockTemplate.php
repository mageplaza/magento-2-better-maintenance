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
 * Class ClockTemplate
 *
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class ClockTemplate implements ArrayInterface
{
    const SIMPLE = 'simple';
    const CIRCLE = 'circle';
    const SQUARE = 'square';
    const STACK  = 'stack';
    const MODERN = 'modern';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::SIMPLE, 'label' => __('Simple')],
            ['value' => self::CIRCLE, 'label' => __('Circle')],
            ['value' => self::SQUARE, 'label' => __('Square')],
            ['value' => self::STACK, 'label' => __('Stack')],
            ['value' => self::MODERN, 'label' => __('Modern')]
        ];
    }
}
