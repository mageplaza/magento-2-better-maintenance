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
namespace Mageplaza\BetterMaintenance\Plugin;

use Magento\Framework\Session\SessionManager;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\Cookie\PhpCookieManager;
/**
 * Class CsrfValidatorSkip
 * @package Mageplaza\BetterMaintenance\Plugin
 */
class GetMessage
{
    protected $_sessionManager;
    protected $_messageManager;
    protected $_registry;
    protected $_cookieManager;

    public function __construct(
        SessionManager $sessionManager,
        ManagerInterface $messageManager,
        Registry $registry,
        PhpCookieManager $cookieManager
    ) {
        $this->_sessionManager = $sessionManager;
        $this->_messageManager = $messageManager;
        $this->_registry = $registry;
        $this->_cookieManager = $cookieManager;
    }

    public function afterExecute(\Magento\Newsletter\Controller\Subscriber\NewAction $subject, $result)
    {
        $msg = $this->_messageManager->getMessages()->getLastAddedMessage()->getText();
//        var_dump($msg);
        $this->_sessionManager->setMsg($msg);

//        $this->_registry->register('msg','testtest');
//        session_start();
//        die('455');
//        $_SESSION['msg'] = $msg;die('1111');
//        var_dump($_SESSION['msg']);die('333322');
        $this->_cookieManager->setPublicCookie('msg', $msg);
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($this->_cookieManager->getCookie('msg').'plugin');
//        var_dump($this->_cookieManager->getCookie('msg'));die('2');
        return $result;
    }
}
