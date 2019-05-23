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
 * @package     Mageplaza_OrderLabels
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BetterMaintenance\Model\Config\Backend;

use Magento\Config\Model\Config\Backend\File;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

/**
 * Class ArraySerialized
 * @package Mageplaza\OrderLabels\Model\Config\Backend\Serialized
 */
class MultipleImages extends File
{
    /**
     * @return Value|void
     */
    protected function _afterLoad()
    {
        $value = $this->getValue();
        if (!is_array($value)) {
            $this->setValue(empty($value) ? false : HelperData::jsonDecode($value));
        }
    }

    /**
     * @return $this|Value
     */
    public function beforeSave()
    {
        die('4444');
        $value = $this->getValue();
        if (is_array($value)) {
            unset($value['__empty']);
            $this->setValue(HelperData::jsonEncode($value));
        }
        parent::beforeSave();

        return $this;
    }
}
