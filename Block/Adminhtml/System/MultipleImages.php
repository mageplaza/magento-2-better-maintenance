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

namespace Mageplaza\BetterMaintenance\Block\Adminhtml\System;

use Magento\Config\Block\System\Config\Form\Field;
use Mageplaza\BetterMaintenance\Block\Adminhtml\System\Renderer\Images;

/**
 * Class MultipleImages
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
abstract class MultipleImages extends Field
{
    /**
     * @return mixed
     */
    public function setMultiImgElement()
    {
        return $this->_layout
            ->createBlock(Images::class)
            ->setTemplate('Mageplaza_BetterMaintenance::system/config/gallery.phtml')
            ->setId('media_gallery_content')
            ->setElement($this)
            ->setFormName('edit_form');
    }
}
