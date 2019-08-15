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

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Option\ArrayInterface;

/**
 * Class CmsBlock
 *
 * @package Mageplaza\BetterMaintenance\Model\Config\Source\System
 */
class CmsBlock implements ArrayInterface
{
    /**
     * @var BlockFactory
     */
    protected $_blockFactory;

    /**
     * CmsBlock constructor.
     *
     * @param BlockFactory $blockFactory
     */
    public function __construct(BlockFactory $blockFactory)
    {
        $this->_blockFactory = $blockFactory;
    }

    /**
     * @return array
     */
    public function getOptionToArray()
    {
        $listBlock[] = [
            'value' => 0,
            'label' => __('--Please Select--')
        ];
        $data = $this->_blockFactory->create()->getCollection()->getData();
        foreach ($data as $value) {
            $listBlock[] = [
                'value' => $value['identifier'],
                'label' => $value['title']
            ];
        }

        return $listBlock;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getOptionToArray();
    }
}
