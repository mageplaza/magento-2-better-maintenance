<?php
namespace Mageplaza\BetterMaintenance\Controller\Adminhtml\ComingSoon;

use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Comingsoon;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Controller\Maintenance\Index as MaintenanceIndex;

class Index extends MaintenanceIndex
{
    protected $_comingSoon;
    public function __construct(
        Comingsoon $comingSoon,
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Maintenance $maintenanceBlock,
        UrlRewriteFactory $urlRewrite,
        Context $context
    ) {
        $this->_comingSoon = $comingSoon;
        parent::__construct(
            $layout,
            $pageFactory,
            $helperData,
            $maintenanceBlock,
            $urlRewrite,
            $context
        );
    }

    public function execute()
    {
        $resultPageLayout = $this->_pageFactory->create();

        //        $resultPageLayout->getLayout()->getUpdate()->removeHandle('default');
        $resultPageLayout->getConfig()->getTitle()->set($this->_helperData->getComingSoonSetting('comingsoon_metatitle'));
        $resultPageLayout->getConfig()->setDescription($this->_helperData->getComingSoonSetting('comingsoon_metadescription'));
        $resultPageLayout->getConfig()->setKeywords($this->_helperData->getComingSoonSetting('comingsoon_metadkeywords'));

        return $resultPageLayout;
    }
}