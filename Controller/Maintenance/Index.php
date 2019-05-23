<?php
namespace Mageplaza\BetterMaintenance\Controller\Maintenance;

use Magento\Cms\Test\Block\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_layout;
    protected $_pageFactory;

    public function __construct
    (
        Layout $layout,
        PageFactory $pageFactory,
        Context $context
    ) {
        $this->_layout = $layout;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
//        $resultPageLayout = $this->_pageFactory->create();
//        $resultPageLayout->getLayout()->getUpdate()->removeHandle('default');

        return $this->_pageFactory->create();
    }
}