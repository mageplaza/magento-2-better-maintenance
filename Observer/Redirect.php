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

namespace Mageplaza\BetterMaintenance\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Response\Http;
use Magento\Framework\App\ViewInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\UrlInterface;
use Mageplaza\BetterMaintenance\Block\Redirect as BlockRedirect;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Model\Config\Source\System\RedirectTo;

/**
 * Class Redirect
 * @package Mageplaza\BetterMaintenance\Observer
 */
class Redirect implements ObserverInterface
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var Http
     */
    protected $_response;

    /**
     * @var TimezoneInterface
     */
    protected $_localeDate;

    /**
     * @var RequestInterface
     */
    protected $_request;

    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @var ViewInterface
     */
    protected $_view;

    /**
     * @var BlockRedirect
     */
    protected $_blockRedirect;

    /**
     * Redirect constructor.
     *
     * @param HelperData $helperData
     * @param Http $response
     * @param TimezoneInterface $localeDate
     * @param RequestInterface $request
     * @param UrlInterface $urlBuilder
     * @param ViewInterface $view
     * @param BlockRedirect $blockRedirect
     */
    public function __construct(
        HelperData $helperData,
        Http $response,
        TimezoneInterface $localeDate,
        RequestInterface $request,
        UrlInterface $urlBuilder,
        ViewInterface $view,
        BlockRedirect $blockRedirect
    ) {
        $this->_helperData    = $helperData;
        $this->_response      = $response;
        $this->_localeDate    = $localeDate;
        $this->_request       = $request;
        $this->_urlBuilder    = $urlBuilder;
        $this->_view          = $view;
        $this->_blockRedirect = $blockRedirect;
    }

    /**
     * @param Observer $observer
     *
     * @return bool|void
     */
    public function execute(Observer $observer)
    {
        $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');
        $currentUrl = $this->_urlBuilder->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
        $currentIp  = $this->_helperData->getClientIp();
        $ctlName    = $this->_request->getControllerName();

        if (!$this->_helperData->isEnabled()) {
            return;
        }

        foreach ($this->_blockRedirect->getWhiteListIp() as $value) {
            if ($this->_helperData->checkIp($currentIp, trim($value))) {
                return;
            }
        }

        foreach ($this->_blockRedirect->getWhiteListPage() as $value) {
            if ($currentUrl === $value) {
                return;
            }
        }

        if (strtotime($this->_localeDate->date()->format('m/d/Y H:i:s'))
            >= strtotime($this->_helperData->getConfigGeneral('end_time'))) {
            return;
        }

        if ($redirectTo === RedirectTo::MAINTENANCE_PAGE && $ctlName !== 'preview') {
            $this->_view->loadLayout(['default', 'mpbettermaintenance_maintenance_index'], true, true, false);
            $this->_response->setHttpResponseCode(503);
        }

        if ($redirectTo === RedirectTo::COMING_SOON_PAGE && $ctlName !== 'preview') {
            $this->_view->loadLayout(['default', 'mpbettermaintenance_comingsoon_index'], true, true, false);
            $this->_response->setHttpResponseCode(503);
        }

        $this->_request->setDispatched(true);

        return false;
    }
}
