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

namespace Mageplaza\BetterMaintenance\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\Url;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\App\ResponseInterface;

/**
 * Class Router
 * @package Mageplaza\BetterMaintenance\Controller
 */
class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    protected $_actionFactory;

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var ResponseInterface
     */
    protected $_response;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param HelperData $helperData
     * @param ResponseInterface $response
     */
    public function __construct(
        ActionFactory $actionFactory,
        HelperData $helperData,
        ResponseInterface $response
    ) {
        $this->_actionFactory = $actionFactory;
        $this->_helperData    = $helperData;
        $this->_response      = $response;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');

        if (!$this->_helperData->isEnabled()) {
            return null;
        }

        if ($identifier === $this->_helperData->getMaintenanceRoute()) {
            $request->setModuleName('mpbettermaintenance')->setControllerName('maintenance')->setActionName('index');
            $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);

            return $this->_actionFactory->create(Forward::class);
        }

        if ($identifier === $this->_helperData->getComingSoonRoute()) {
            $request->setModuleName('mpbettermaintenance')->setControllerName('comingsoon')->setActionName('index');
            $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);

            return $this->_actionFactory->create(Forward::class);
        }

        return null;
    }
}
