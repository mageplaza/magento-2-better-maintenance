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

namespace Mageplaza\BetterMaintenance\Model\Config\Source\System;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class SubcribeType
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class SubcribeType implements ArrayInterface
{
    const NONE = 'none';
    const REGISTER_FORM = 'register_form';
    const EMAIL_FORM    = 'email_form';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::NONE, 'label' => __('None')],
            ['value' => self::REGISTER_FORM, 'label' => __('Register Form')],
            ['value' => self::EMAIL_FORM, 'label' => __('Email Only')]
        ];
    }
}
