<?php
namespace Mageplaza\BetterMaintenance\Controller\Preview;

class Comingsoon extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPageFactory = $this->_pageFactory->create();
        $resultPageFactory->getConfig()->getTitle()->set('Coming Soon Preview');

        return $resultPageFactory;
    }
}