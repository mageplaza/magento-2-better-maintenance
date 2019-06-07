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

namespace Mageplaza\BetterMaintenance\Block;

use Magento\Cms\Model\Page as CmsPage;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\App\Response\Http;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\Stdlib\DateTime\DateTime;

/**
 * Class Redirect
 * @package Mageplaza\BetterMaintenance\Block
 */
class Redirect extends Template
{
    protected $_template = 'Mageplaza_BetterMaintenance::redirect.phtml';

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
     * Redirect constructor.
     *
     * @param Template\Context $context
     * @param HelperData $helperData
     * @param CmsPage $cmsPage
     * @param Http $response
     * @param ManagerInterface $messageManager
     * @param HttpContext $httpContext
     * @param DateTime $date
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        HelperData $helperData,
        CmsPage $cmsPage,
        Http $response,
        ManagerInterface $messageManager,
        HttpContext $httpContext,
        DateTime $date,
        array $data = []
    ) {
        $this->_helperData     = $helperData;
        $this->_cmsPage        = $cmsPage;
        $this->_response       = $response;
        $this->_messageManager = $messageManager;
        $this->_context        = $httpContext;
        $this->_date           = $date;

        parent::__construct($context, $data);
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

    /**
     * @return bool|Http
     */
    public function redirectToUrl()
    {
        $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');
        $currentUrl = $this->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
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

        if (strtotime($this->_localeDate->date()->format('m/d/Y H:i A')) >= strtotime($this->_helperData->getConfigGeneral('end_time'))) {
            return false;
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

        $url = $this->getUrl($route);

        return $this->_response->setRedirect($url);
    }
}
