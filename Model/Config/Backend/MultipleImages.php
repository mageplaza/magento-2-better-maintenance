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

namespace Mageplaza\BetterMaintenance\Model\Config\Backend;

use Magento\Framework\App\Config\Value;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

/**
 * Class MultipleImages
 *
 * @package Mageplaza\BetterMaintenance\Model\Config\Backend
 */
class MultipleImages extends Value
{
    /**
     * @return Value
     */
    public function beforeSave()
    {
        $value = $this->getValue();
        $files = [];

        /* looping through array */
        /**
         * @var array $value
         */
        foreach ($value as $key => $item) {
            if (!empty($files) && in_array($item['file'], $files, true)) {
                unset($value[$key]);
            }
            $files[] = $item['file'];  // creating username array to compare with main array values
        }
        foreach ($value as $key => $item) {
            if ($item['removed'] === '1') {
                unset($value[$key]);
            }
        }

        if (is_array($value)) {
            unset($value['__empty']);
            $this->setValue(HelperData::jsonEncode($value));
        }

        return parent::beforeSave();
    }
}
