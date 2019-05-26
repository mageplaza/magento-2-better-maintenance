<?php
namespace Mageplaza\BetterMaintenance\Controller\Maintenance;

use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

class Index extends Action
{
    protected $_layout;
    protected $_pageFactory;
    protected $_helperData;
    protected $_maintenanceBlock;
    protected $_urlRewrite;

    public function __construct
    (
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Maintenance $maintenanceBlock,
        UrlRewriteFactory $urlRewrite,
        Context $context
    ) {
        $this->_layout           = $layout;
        $this->_pageFactory      = $pageFactory;
        $this->_helperData       = $helperData;
        $this->_maintenanceBlock = $maintenanceBlock;
        $this->_urlRewrite       = $urlRewrite;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPageLayout = $this->_pageFactory->create();

        //        $resultPageLayout->getLayout()->getUpdate()->removeHandle('default');
        $resultPageLayout->getConfig()->getTitle()->set($this->_maintenanceBlock->getPageTitle());


        return $resultPageLayout;
    }
}