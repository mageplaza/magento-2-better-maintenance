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
 * @category    Mageplaza
 * @package     Mageplaza_RequiredLogin
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BetterMaintenance\Block;

use Magento\Cms\Model\Page as CmsPage;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\App\Response\Http;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

/**
 * Class Deal
 * @package Mageplaza\RequiredLogin\Block
 */
class Redirect extends Template
{
    const MAINTENANCE_ROUTE = 'mpmaintenance';
    const COMINGSOON_ROUTE  = 'mpcomingsoon';
    protected $_template = "Mageplaza_BetterMaintenance::redirect.phtml";

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var CmsPage
     */
    protected $_cmsPage;

    /**
     * @var Session
     */
    protected $_session;

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
     * Action constructor.
     *
     * @param Template\Context $context
     * @param HelperData $helperData
     * @param CmsPage $cmsPage
     * @param Session $session
     * @param Http $response
     * @param ManagerInterface $messageManager
     * @param HttpContext $httpContext
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        HelperData $helperData,
        CmsPage $cmsPage,
        Session $session,
        Http $response,
        ManagerInterface $messageManager,
        HttpContext $httpContext,
        array $data = []
    ) {
        $this->_helperData     = $helperData;
        $this->_cmsPage        = $cmsPage;
        $this->_session        = $session;
        $this->_response       = $response;
        $this->_messageManager = $messageManager;
        $this->_context        = $httpContext;

        parent::__construct($context, $data);
    }

    /**
     * Get full action name
     *
     * @return mixed
     */
    public function getFullActionName()
    {
        return $this->_request->getFullActionName();
    }

    /**
     * Action redirect to login page
     *
     * @return bool
     */
    public function redirectToUrl()
    {
        $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');
        //        $currentUrl = $this->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
        //        var_dump($currentUrl);die;
        //        $loginUrl = $this->getUrl('customer/account/login', ['referer' => base64_encode($currentUrl), 'isForce' => true]);
        switch ($redirectTo) {
            case 'maintenance_page':
                $route = $this->_helperData->getMaintenanceSetting('maintenance_route');
                $route = isset($route) ? $route : self::MAINTENANCE_ROUTE;
                //                $route = 'mpmaintenance/maintenance/index';
                break;
            case 'coming_soon_page':
                $route = $this->_helperData->getMaintenanceSetting('comingsoon_route');
                $route = isset($route) ? $route : self::COMINGSOON_ROUTE;
                //                $route = 'mpmaintenance/comingsoon/index';
                break;
            case 'home_page':
                $route = $this->getBaseUrl();
                break;
            default:
                $route = 'no-route';
                break;
        }
        //        $currentUrl = $this->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
        $url = $this->getUrl($route);

        return $this->_response->setRedirect($url)->setHttpResponseCode(503);

    }
}
