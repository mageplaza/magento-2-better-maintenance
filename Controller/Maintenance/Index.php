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
namespace Mageplaza\BetterMaintenance\Controller\Maintenance;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Mageplaza\BetterMaintenance\Block\Maintenance;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Layout;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\Controller\Result\ForwardFactory;

/**
 * Class Index
 * @package Mageplaza\BetterMaintenance\Controller\Maintenance
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
     * @var Maintenance
     */
    protected $_maintenanceBlock;

    /**
     * @var UrlRewriteFactory
     */
    protected $_urlRewrite;

    /**
     * @var ForwardFactory
     */
    protected $_forwardFactory;

    /**
     * Index constructor.
     *
     * @param Layout $layout
     * @param PageFactory $pageFactory
     * @param HelperData $helperData
     * @param Maintenance $maintenanceBlock
     * @param UrlRewriteFactory $urlRewrite
     * @param ForwardFactory $forwardFactory
     * @param Context $context
     */
    public function __construct(
        Layout $layout,
        PageFactory $pageFactory,
        HelperData $helperData,
        Maintenance $maintenanceBlock,
        UrlRewriteFactory $urlRewrite,
        ForwardFactory $forwardFactory,
        Context $context
    ) {
        $this->_layout           = $layout;
        $this->_pageFactory      = $pageFactory;
        $this->_helperData       = $helperData;
        $this->_maintenanceBlock = $maintenanceBlock;
        $this->_urlRewrite       = $urlRewrite;
        $this->_forwardFactory   = $forwardFactory;
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
        $http             = $this->_helperData->getMaintenanceSetting('maintenance_http_response') ?: 200;

        $this->getResponse()->setHttpResponseCode($http);
        $resultPageLayout->getConfig()->getTitle()->set($this->_maintenanceBlock->getPageTitle());

        return $resultPageLayout;
    }
}
