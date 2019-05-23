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
 * Class RedirectTo
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class RedirectTo implements ArrayInterface
{
    const MAINTENANCE_PAGE = 'maintenance_page';
    const PAGE_404         = '404_page';
    const HOME_PAGE        = 'home_page';
    const COMING_SOON_PAGE = 'coming_soon_page';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::MAINTENANCE_PAGE, 'label' => __('Maintenance Page')],
            ['value' => self::PAGE_404, 'label' => __('404 Page')],
            ['value' => self::HOME_PAGE, 'label' => __('Home Page')],
            ['value' => self::COMING_SOON_PAGE, 'label' => __('Coming Soon Page')],
        ];
    }
}
