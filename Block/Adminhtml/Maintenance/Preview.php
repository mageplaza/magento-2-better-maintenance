<?php
namespace Mageplaza\BetterMaintenance\Block\Adminhtml\Maintenance;

use Magento\Framework\View\Element\Template\Context;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Helper\Image as HelperImage;

class Preview extends Template
{
    protected $_template = 'Mageplaza_BetterMaintenance::maintenance/preview.phtml';
    protected $_layout;
    protected $_pageFactory;
    protected $_helperData;
    protected $_maintenanceBlock;
    protected $_urlRewrite;
    protected $_helperImage;

    public function __construct
    (
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Maintenance $maintenanceBlock,
        UrlRewriteFactory $urlRewrite,
        HelperImage $helperImage,
        Context $context
    ) {
        $this->_layout           = $layout;
        $this->_pageFactory      = $pageFactory;
        $this->_helperData       = $helperData;
        $this->_maintenanceBlock = $maintenanceBlock;
        $this->_urlRewrite       = $urlRewrite;
        $this->_helperImage      = $helperImage;
        parent::__construct($context);
    }

    public function getFormData()
    {
        $newData = [];
        $data    = $this->_request->getParam('mydata');
        $data    = urldecode($data);
        $data    = explode('&', $data);
        foreach ($data as $value) {
            $val              = explode('=', $value);
            $val[0]           = $this->filterKey($val[0]);
            $newData[$val[0]] = urldecode($val[1]);
        }

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

    public function getLogo($logo)
    {
        return $this->_maintenanceBlock->getLogo($logo);
    }

    public function getSocialList()
    {
        $list    = [
            '[social_facebook]',
            '[social_twitter]',
            '[social_instagram]',
            '[social_google]',
            '[social_youtube]',
            '[social_pinterest]'
        ];
        $url     = [];
        $imgPath = 'Mageplaza_BetterMaintenance::media/';
        foreach ($list as $value) {
            $filterValue = preg_replace('/[^A-Za-z0-9\_]/', '', $value);
            $url[]       = [
                'link' => $this->getFormData()[$value],
                'img'  => $this->getViewFileUrl($imgPath . $filterValue . '.png')
            ];
        }

        return $url;
    }

    public function getBlockCms()
    {
        $blockId = $this->getFormData()['[footer_block][cms_block]'];
        if ($blockId === '0') {
            return null;
        }
        $block = $this->getLayout()->createBlock('Magento\Cms\Block\Block')
            ->setBlockId($blockId)
            ->toHtml();

        return $block;
    }

    public function getClockBlock()
    {
        $block = $this->getLayout()
            ->createBlock('Mageplaza\BetterMaintenance\Block\Adminhtml\Clock')
            ->setTemplate('Mageplaza_BetterMaintenance::clock/timer.phtml')
            ->toHtml();

        return $block;
    }

    public function getSubscribeBlock()
    {
        $block = $this->getLayout()
            ->createBlock('Magento\Newsletter\Block\Subscribe')
            ->setData('area', 'frontend')
            ->setTemplate('Magento_Newsletter::subscribe.phtml')
            ->toHtml();

        return $block;
    }

    public function getRegisterBlock()
    {
        $block = $this->getLayout()
            ->createBlock('Magento\Customer\Block\Form\Register')
            ->setData('area', 'frontend')
            ->setTemplate('form/register.phtml')
            ->toHtml();

        return $block;
    }

    public function getImageUrl($image)
    {
        return $this->_maintenanceBlock->getImageUrl($image);
    }

    public function getVideoUrl($video)
    {
        return $this->_maintenanceBlock->getVideoUrl($video);
    }

    public function getListImages($type)
    {
        $list = [];
        foreach ($this->getFormData() as $key => $value) {
            if (strpos($key, $type) && strpos($key, '[file]')) {
                $list[] = $value;
            }
        }

        return $list;
    }

    public function getMultipleImagesUrl($type)
    {
        $images = $this->getListImages($type);
        $urls = [];
        foreach ($images as $image) {
            $urls[] = $this->_helperImage->getMediaUrl($this->_helperImage->getMediaPath($image));
        }

        return $urls;
    }
}