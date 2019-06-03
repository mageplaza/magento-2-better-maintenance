<?php
namespace Mageplaza\BetterMaintenance\Controller\Maintenance;

use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index extends Action
{
    protected $_layout;
    protected $_pageFactory;
    protected $_helperData;
    protected $_maintenanceBlock;
    protected $_urlRewrite;
    protected $_forwardFactory;

    public function __construct
    (
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Maintenance $maintenanceBlock,
        UrlRewriteFactory $urlRewrite,
        ForwardFactory $forwardFactory,
        Context $context
    ) {
        $this->_layout           = $layout;
        $this->_pageFactory      = $pageFactory;
        $this->_helperData       = $helperData;
        $this->_maintenanceBlock = $maintenanceBlock;
        $this->_urlRewrite       = $urlRewrite;
        $this->_forwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->_helperData->isEnabled()) {
            $this->_forward('noroute');
        }

        $resultPageLayout = $this->_pageFactory->create();
        $http = $this->_helperData->getMaintenanceSetting('maintenance_http_response') ?: 200;

//        \Zend_Debug::dump($this->_helperData->getMaintenanceSetting('maintenance_http_response'));die;
        $this->getResponse()->setHttpResponseCode($http);
        //        $resultPageLayout->getLayout()->getUpdate()->removeHandle('default');
        $resultPageLayout->getConfig()->getTitle()->set($this->_maintenanceBlock->getPageTitle());

        return $resultPageLayout;
    }
}