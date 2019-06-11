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

/**
 * Class PreviewButton
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System
 */
class PreviewButton extends Field
{
    /**
     * @var string
     */
    protected $_template = 'system/config/previewbutton.phtml';

    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $element->unsScope();

        return parent::render($element);
    }

    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $originalData = $element->getOriginalData();

        $this->addData(
            [
                'button_label' => $originalData['button_label'],
                'button_url'   => $this->getUrl($originalData['button_url'], ['_current' => true]),
                'html_id'      => $element->getHtmlId()
            ]
        );

        return $this->_toHtml();
    }

    /**
     * @param $url
     *
     * @return string
     */
    public function getDataUrl($url)
    {
        return $this->getUrl($url);
    }

    /**
     * Copy from the Magento core.
     *
     * @param string $string
     * @param bool $escapeSingleQuote
     *
     * @return string
     */
    public function escapeHtmlAttr($string, $escapeSingleQuote = true)
    {
        return $this->_escaper->escapeHtmlAttr($string, $escapeSingleQuote);
    }

    /**
     * Copy from the Magento core.
     *
     * @param string $string
     * @return string
     */
    public function escapeJs($string)
    {
        return $this->_escaper->escapeJs($string);
    }
}
