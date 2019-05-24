<?php
namespace Mageplaza\BetterMaintenance\Controller\Maintenance;

use Magento\Cms\Test\Block\Page;
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

    public function __construct
    (
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Context $context
    ) {
        $this->_layout = $layout;
        $this->_pageFactory = $pageFactory;
        $this->_helperData = $helperData;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPageLayout = $this->_pageFactory->create();
//        $resultPageLayout->getLayout()->getUpdate()->removeHandle('default');
        $resultPageLayout->getConfig()->getTitle()->set($this->_helperData->getMaintenanceSetting('maintenance_title'));
        return $resultPageLayout;
    }
}