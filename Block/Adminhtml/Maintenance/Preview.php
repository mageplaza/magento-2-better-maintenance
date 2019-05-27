<?php
namespace Mageplaza\BetterMaintenance\Block\Adminhtml\Maintenance;

use Magento\Framework\View\Element\Template\Context;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

class Preview extends Template
{
    protected $_template='Mageplaza_BetterMaintenance::maintenance/preview.phtml';
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
}