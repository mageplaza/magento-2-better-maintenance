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
namespace Mageplaza\BetterMaintenance\Plugin;

use Magento\Customer\Controller\Account\CreatePost;
use Magento\Framework\Data\Form\FormKey;

/**
 * Class FormCustom
 * @package Mageplaza\OrderLabels\Plugin\Block\Order\Status
 */
class BeforeCreatePost
{
    /**
     * @var FormKey
     */
    protected $_formKey;

    /**
     * BeforeCreatePost constructor.
     *
     * @param FormKey $formKey
     */
    public function __construct(
        FormKey $formKey
    ) {
        $this->_formKey = $formKey;
    }

    /**
     * @param CreatePost $subject
     *
     * @return CreatePost
     */
    public function beforeExecute(CreatePost $subject)
    {
        $formKey = $this->_formKey->getFormKey();
        $subject->getRequest()->setParams(['form_key' => $formKey]);

        return $subject;
    }
}
