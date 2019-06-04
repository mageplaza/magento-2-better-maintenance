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
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Registry;
use Magento\Backend\Block\Template\Context;
use Mageplaza\BetterMaintenance\Block\Adminhtml\System\Renderer\Images;

/**
 * Class ComingsoonMultipleImages
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
class ComingsoonMultipleImages extends Field
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * ComingsoonMultipleImages constructor.
     *
     * @param Registry $coreRegistry
     * @param Layout $layout
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Registry $coreRegistry,
        Context $context,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = '';
        $html .= $this->_layout
            ->createBlock(Images::class)
            ->setTemplate('Mageplaza_BetterMaintenance::system/config/comingsoonGallery.phtml')
            ->setId('media_gallery_content')
            ->setElement($this)
            ->setFormName('edit_form')
            ->toHtml();

        return $html;
    }
}
