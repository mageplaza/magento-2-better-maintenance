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
 * @package     Mageplaza_Shopbybrand
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BetterMaintenance\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\Url;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\App\ResponseInterface;

/**
 * Class Router
 *
 * @package Mageplaza\Shopbybrand\Controller
 */
class Router implements RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $_actionFactory;

    /**
     * @var \Mageplaza\Shopbybrand\Helper\Data
     */
    protected $_helperData;

    protected $_response;

    /**
     * Router constructor.
     *
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Mageplaza\Shopbybrand\Helper\Data $helper
     */
    public function __construct(
        ActionFactory $actionFactory,
        HelperData $helperData,
        ResponseInterface $response

    ) {
        $this->_actionFactory = $actionFactory;
        $this->_helperData = $helperData;
        $this->_response = $response;
    }

    /**
     * Validate and Match Brand Page and modify request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     *
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
//        var_dump($identifier);die;
//        $condition = new \Magento\Framework\DataObject(['identifier' => $identifier, 'continue' => true]);

//        $identifier = $condition->getIdentifier();
//        if ($condition->getRedirectUrl()) {
//            $this->_response->setRedirect($condition->getRedirectUrl());
//            $request->setDispatched(true);
//            return $this->_actionFactory->create(\Magento\Framework\App\Action\Redirect::class);
//        }

//        if (!$condition->getContinue()) {
//            return null;
//        }
//        var_dump($condition->getContinue());die;
        if ($identifier === $this->_helperData->getMaintenanceSetting('maintenance_route')) {
            $request->setModuleName('mpbettermaintenance')->setControllerName('maintenance')->setActionName('index');
            $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);

            return $this->_actionFactory->create(\Magento\Framework\App\Action\Forward::class);
        }
        if ($identifier === $this->_helperData->getMaintenanceSetting('comingsoon_route')) {
            $request->setModuleName('mpbettermaintenance')->setControllerName('comingsoon')->setActionName('index');
            $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);

            return $this->_actionFactory->create(\Magento\Framework\App\Action\Forward::class);
        }
        return null;
    }
}
