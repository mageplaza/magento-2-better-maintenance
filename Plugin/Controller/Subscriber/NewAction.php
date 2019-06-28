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

namespace Mageplaza\BetterMaintenance\Plugin\Controller\Subscriber;

use Exception;
use Magento\Customer\Api\AccountManagementInterface as CustomerAccountManagement;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Url as CustomerUrl;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Message\MessageInterface;
use Magento\Newsletter\Controller\Subscriber\NewAction as CoreNewAction;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\BetterMaintenance\Helper\Data;
use Psr\Log\LoggerInterface;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class NewAction
 * @package Mageplaza\BetterMaintenance\Plugin\Controller\Subscriber
 */
class NewAction extends CoreNewAction
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * @var LayoutInterface
     */
    protected $_layout;

    /**
     * @var ManagerInterface
     */
    protected $_message;

    /**
     * NewAction constructor.
     *
     * @param Context $context
     * @param SubscriberFactory $subscriberFactory
     * @param Session $customerSession
     * @param StoreManagerInterface $storeManager
     * @param CustomerUrl $customerUrl
     * @param CustomerAccountManagement $customerAccountManagement
     * @param JsonFactory $resultJsonFactory
     * @param Data $helperData
     * @param LoggerInterface $logger
     * @param LayoutInterface $layout
     * @param ManagerInterface $message
     */
    public function __construct(
        Context $context,
        SubscriberFactory $subscriberFactory,
        Session $customerSession,
        StoreManagerInterface $storeManager,
        CustomerUrl $customerUrl,
        CustomerAccountManagement $customerAccountManagement,
        JsonFactory $resultJsonFactory,
        Data $helperData,
        LoggerInterface $logger,
        LayoutInterface $layout,
        ManagerInterface $message
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_helperData       = $helperData;
        $this->_logger           = $logger;
        $this->_layout           = $layout;
        $this->_message          = $message;

        parent::__construct(
            $context,
            $subscriberFactory,
            $customerSession,
            $storeManager,
            $customerUrl,
            $customerAccountManagement
        );
    }

    /**
     * @param CoreNewAction $subject
     * @param $result
     *
     * @return Json
     * @SuppressWarnings("Unused")
     */
    public function afterExecute(CoreNewAction $subject, $result)
    {
        if (!$this->_helperData->isEnabled() || !$this->getRequest()->isAjax()) {
            return $result;
        }

        /** @var MessageInterface $value */
        $msgs = $this->_message->getMessages(1);

        foreach ($msgs->getItems() as $value) {
            $msg[]  = $value->getText();
            $type[] = $value->getType();
        }

        $msgBlock = $this->_layout->createBlock(Messages::class);
        foreach ($type as $key => $value) {
            if ($value === 'error') {
                $html[] = $msgBlock->addError($msg[$key])->toHtml();
            }

            if ($value === 'success') {
                $html[] = $msgBlock->addSuccess($msg[$key])->toHtml();
            }
        }
        $this->getResponse()->clearHeader('location');

        return $this->resultJsonFactory->create()->setData($html);
    }
}
