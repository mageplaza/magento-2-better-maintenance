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

use Magento\Cms\Model\Page as CmsPage;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\App\Response\Http;
use Magento\Framework\App\Response\HttpInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\State;

/**
 * Class Redirect
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Redirect implements ObserverInterface
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var CmsPage
     */
    protected $_cmsPage;

    /**
     * @var Http
     */
    protected $_response;

    /**
     * @var ManagerInterface
     */
    protected $_messageManager;

    /**
     * @var HttpContext
     */
    protected $_context;

    /**
     * @var DateTime
     */
    protected $_date;

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
     * @var State
     */
    protected $_state;

    /**
     * Redirect constructor.
     *
     * @param HelperData $helperData
     * @param CmsPage $cmsPage
     * @param Http $response
     * @param ManagerInterface $messageManager
     * @param HttpContext $httpContext
     * @param DateTime $date
     * @param TimezoneInterface $localeDate
     * @param RequestInterface $request
     * @param UrlInterface $urlBuilder
     * @param State $state
     */
    public function __construct(
        HelperData $helperData,
        CmsPage $cmsPage,
        Http $response,
        ManagerInterface $messageManager,
        HttpContext $httpContext,
        DateTime $date,
        TimezoneInterface $localeDate,
        RequestInterface $request,
        UrlInterface $urlBuilder,
        State $state
    ) {
        $this->_helperData     = $helperData;
        $this->_cmsPage        = $cmsPage;
        $this->_response       = $response;
        $this->_messageManager = $messageManager;
        $this->_context        = $httpContext;
        $this->_date           = $date;
        $this->_localeDate     = $localeDate;
        $this->_request        = $request;
        $this->_urlBuilder     = $urlBuilder;
        $this->_state          = $state;
    }

    /**
     * @param Observer $observer
     *
     * @return bool|Http|HttpInterface|void
     * @throws LocalizedException
     */
    public function execute(Observer $observer)
    {
        if ($this->_state->getAreaCode() === 'frontend') {
            $this->_response->setNoCacheHeaders();
            $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');
            $currentUrl = $this->_urlBuilder->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
            $currentIp  = $this->_request->getClientIp();

            if (!$this->_helperData->isEnabled()) {
                return false;
            }

            foreach ($this->getWhiteListIp() as $value) {
                if ($this->_helperData->checkIp($currentIp, $value)) {
                    return false;
                }
            }

            foreach ($this->getWhiteListPage() as $value) {
                if ($currentUrl === $value) {
                    return false;
                }
            }

            if (strtotime($this->_localeDate->date()->format('m/d/Y H:i:s'))
                >= strtotime($this->_helperData->getConfigGeneral('end_time'))) {
                return;
            }

            switch ($redirectTo) {
                case 'maintenance_page':
                    if ($this->_request->getFullActionName() === 'mpbettermaintenance_maintenance_index') {
                        return false;
                    }
                    $route = $this->_helperData->getMaintenanceRoute();
                    $route = isset($route) ? $route : HelperData::MAINTENANCE_ROUTE;
                    break;
                case 'coming_soon_page':
                    if ($this->_request->getFullActionName() === 'mpbettermaintenance_comingsoon_index') {
                        return false;
                    }
                    $route = $this->_helperData->getComingSoonRoute();
                    $route = isset($route) ? $route : HelperData::COMING_SOON_ROUTE;
                    break;
                default:
                    $route = $redirectTo;
                    if ($this->_cmsPage->getIdentifier() === $redirectTo) {
                        return false;
                    }
                    break;
            }

            $url = $this->_urlBuilder->getUrl($route);

            return $this->_response->setRedirect($url);
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getFullActionName()
    {
        return $this->_request->getFullActionName();
    }

    /**
     * @return array[]|false|string[]
     */
    public function getWhiteListPage()
    {
        $links = preg_split("/(\r\n|\n|\r)/", $this->_helperData->getConfigGeneral('whitelist_page'));

        return $links;
    }

    /**
     * @return array
     */
    public function getWhiteListIp()
    {
        return explode(',', $this->_helperData->getConfigGeneral('whitelist_ip'));
    }
}
