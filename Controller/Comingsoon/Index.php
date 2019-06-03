<?php
namespace Mageplaza\BetterMaintenance\Controller\Comingsoon;

use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $_layout;
    protected $_pageFactory;
    protected $_helperData;
    protected $_urlRewrite;

    public function __construct
    (
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        UrlRewriteFactory $urlRewrite,
        Context $context
    ) {
        $this->_layout           = $layout;
        $this->_pageFactory      = $pageFactory;
        $this->_helperData       = $helperData;
        $this->_urlRewrite       = $urlRewrite;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->_helperData->isEnabled()) {
            $this->_forward('noroute');
        }
        $resultPageLayout = $this->_pageFactory->create();
        $resultPageLayout->getConfig()->getTitle()->set($this->_helperData->getComingSoonSetting('comingsoon_metatitle'));
        $resultPageLayout->getConfig()->setDescription($this->_helperData->getComingSoonSetting('comingsoon_metadescription'));
        $resultPageLayout->getConfig()->setKeywords($this->_helperData->getComingSoonSetting('comingsoon_metadkeywords'));

        return $resultPageLayout;
    }
}
