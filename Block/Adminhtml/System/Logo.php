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
use Magento\Framework\Data\Form\Element\CollectionFactory;
use Magento\Framework\Data\Form\Element\Factory;
use Magento\Framework\Escaper;
use Magento\Framework\Registry;
use Magento\Framework\View\Layout;
use Magento\Backend\Block\Template\Context;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

/**
 * Class MultipleImages
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
class Logo extends Field
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var Layout
     */
    protected $_layout;

    /**
     * MultipleImages constructor.
     *
     * @param Registry $coreRegistry
     * @param Layout $layout
     * @param Context $context
     * @param array $data
     */
    public function __construct
    (
        Registry $coreRegistry,
        Layout $layout,
        Context $context,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_layout = $layout;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = '';
        $html .= $this->_layout
            ->createBlock('\Mageplaza\BetterMaintenance\Block\Adminhtml\System\Renderer\Images')
            ->setTemplate('Mageplaza_BetterMaintenance::system/config/image.phtml')
            ->setId('media_gallery_content')
            ->setElement($this)
            ->setFormName('edit_form')
            ->toHtml();

        return $html;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'images';
    }
}
