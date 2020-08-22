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

use Magento\Customer\Api\AccountManagementInterface as CustomerAccountManagement;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Url as CustomerUrl;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\LayoutInterface;
use Magento\Newsletter\Controller\Subscriber\NewAction as CoreNewAction;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\BetterMaintenance\Helper\Data;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Action\Action as Action;

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
     * @var LayoutInterface
     */
    protected $_layout;

    /**
     * @param CoreNewAction $subject
     * @param $result
     *
     * @return Json
     * @SuppressWarnings("Unused")
     */
    public function afterExecute(CoreNewAction $subject, $result)
    {
        $resultJsonFactory = ObjectManager::getInstance()->get(JsonFactory::class);
        $_helperData = ObjectManager::getInstance()->get(Data::class);
        $_layout = ObjectManager::getInstance()->get(LayoutInterface::class);

        if (!$_helperData->isEnabled() || !$this->getRequest()->isAjax()) {
            return $result;
        }

        $msgs = $this->messageManager->getMessages(1);
        $msg  = [];
        $type = [];
        foreach ($msgs->getItems() as $value) {
            $msg[]  = $value->getText();
            $type[] = $value->getType();
        }

        /** @var Messages $msgBlock */
        $msgBlock = $_layout->createBlock(Messages::class);

        foreach ($type as $key => $value) {
            if ($value === 'error') {
                $html[] = $msgBlock->addError($msg[$key])->toHtml();
            }

            if ($value === 'success') {
                $html[] = $msgBlock->addSuccess($msg[$key])->toHtml();
            }
        }
        $this->getResponse()->clearHeader('location');

        return $resultJsonFactory->create()->setData($html);
    }
}
