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
 * Class HttpResponse
 *
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class HttpResponse implements ArrayInterface
{
    const SERVICE_UNAVAILABLE_503 = '503';
    const OK_200                  = '200';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::SERVICE_UNAVAILABLE_503, 'label' => __('503 Service Unavailable')],
            ['value' => self::OK_200, 'label' => __('200 OK')]
        ];
    }
}
