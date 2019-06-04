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
 * Class BackgroundType
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class BackgroundType implements ArrayInterface
{
    const VIDEO           = 'video';
    const IMAGE           = 'image';
    const MULTIPLE_IMAGES = 'multiple_images';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::VIDEO, 'label' => __('Video')],
            ['value' => self::IMAGE, 'label' => __('Image')],
            ['value' => self::MULTIPLE_IMAGES, 'label' => __('Multiple Images')]
        ];
    }
}
