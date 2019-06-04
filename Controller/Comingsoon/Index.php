<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category  Mageplaza
 * @package   Mageplaza_BetterMaintenance
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */
namespace Mageplaza\BetterMaintenance\Controller\Comingsoon;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Mageplaza\BetterMaintenance\Controller\Comingsoon
 */
class Index extends Action
{
    /**
     * @var Layout
     */
    protected $_layout;

    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var UrlRewriteFactory
     */
    protected $_urlRewrite;

    /**
     * Index constructor.
     *
     * @param Layout $layout
     * @param PageFactory $pageFactory
     * @param HelperData $helperData
     * @param UrlRewriteFactory $urlRewrite
     * @param Context $context
     */
    public function __construct(
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        UrlRewriteFactory $urlRewrite,
        Context $context
    ) {
        $this->_layout      = $layout;
        $this->_pageFactory = $pageFactory;
        $this->_helperData  = $helperData;
        $this->_urlRewrite  = $urlRewrite;
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
        if (!$this->_helperData->isEnabled()) {
            $this->_forward('noroute');
        }
        $resultPageLayout = $this->_pageFactory->create();
        $resultPageLayout->getConfig()->getTitle()->set($this->_helperData->getComingSoonSetting('comingsoon_metatitle'));
        $resultPageLayout->getConfig()->setDescription($this->_helperData->getComingSoonSetting('comingsoon_metadescription'));
        $resultPageLayout->getConfig()->setKeywords($this->_helperData->getComingSoonSetting('comingsoon_metakeywords'));

        return $resultPageLayout;
    }
}
