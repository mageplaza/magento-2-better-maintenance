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
    protected $_template = 'Mageplaza_BetterMaintenance::maintenance/preview.phtml';
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

    public function getFormData()
    {
        $data = $this->_request->getParam('mydata');
        $data = urldecode($data);
        $data = explode('&', $data);
        foreach ($data as $value) {
            $val = explode('=', $value);
            $val[0] = $this->filterKey($val[0]);
            $newData[$val[0]] = urldecode($val[1]);
        }
        \Zend_Debug::dump($newData);
        die;

        return $newData;
    }

    public function cleanValue()
    {
        return [
            '[groups]',
            'groups',
            '[clock_setting]',
            '[display_setting]',
            '[fields]',
            '[value]',
            '[subscribe_setting]',
            '[social_contact]',
            '[maintenance_setting]',
            '[comingsoon_setting]',
            '[general]'
        ];
    }

    public function filterKey($arr)
    {
        foreach ($this->cleanValue() as $word) {
            $arr = str_replace($word, '', $arr);
        }

        return $arr;
    }
}