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
use Magento\Cms\Model\ResourceModel\Page\CollectionFactory as PageFactory;

/**
 * Class RedirectTo
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class RedirectTo implements ArrayInterface
{
    const MAINTENANCE_PAGE = 'maintenance_page';
    const COMING_SOON_PAGE = 'coming_soon_page';

    protected $_pageFactory;

    public function __construct
    (
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $maintenance = [
            'value' => self::MAINTENANCE_PAGE,
            'label' => __('Maintenance Page')
        ];

        $comingSoon = [
            'value' => self::COMING_SOON_PAGE,
            'label' => __('Coming Soon Page')
        ];

        $pageList   = $this->_pageFactory->create()->toOptionIdArray();
        $pageList[] = $maintenance;
        $pageList[] = $comingSoon;

        return $pageList;
    }
}
