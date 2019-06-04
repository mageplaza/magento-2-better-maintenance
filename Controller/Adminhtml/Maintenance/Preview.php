<?php
namespace Mageplaza\BetterMaintenance\Controller\Adminhtml\Maintenance;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Preview extends Action
{
    protected $_pageFactory;

    public function __construct(
        PageFactory $pageFactory,
        Context $context
    ) {
        $this->_pageFactory      = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
