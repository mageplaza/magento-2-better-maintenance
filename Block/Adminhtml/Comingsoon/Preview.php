<?php
namespace Mageplaza\BetterMaintenance\Block\Adminhtml\Comingsoon;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Adminhtml\Maintenance\Preview as MPreview;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Helper\Image as HelperImage;

class Preview extends MPreview
{
    protected $_template = 'Mageplaza_BetterMaintenance::comingsoon/preview.phtml';

    public function __construct(
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Maintenance $maintenanceBlock,
        UrlRewriteFactory $urlRewrite,
        HelperImage $helperImage,
        Context $context
    ) {
        parent::__construct($layout, $pageFactory, $helperData, $maintenanceBlock, $urlRewrite, $helperImage, $context);
    }
}
