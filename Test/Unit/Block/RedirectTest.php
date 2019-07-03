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

namespace Mageplaza\BetterMaintenance\Test\Unit\Block;

use Exception;
use PHPUnit\Framework\TestCase;
use Magento\Cms\Model\Page as CmsPage;
use Magento\Framework\App\Response\Http;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\Stdlib\DateTime;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Block\Redirect;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

/**
 * Class RedirectTest
 * @package Mageplaza\BetterMaintenance\Test\Unit\Block
 */
class RedirectTest extends TestCase
{
    /**
     * @var CmsPage|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_cmsPage;

    /**
     * @var Template\Context|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_context;

    /**
     * @var Http|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_response;

    /**
     * @var DateTime|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_date;

    /**
     * @var HelperData|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_helperData;

    /**
     * @var UrlInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_urlBuilder;

    /**
     * @var RequestInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $_request;

    /**
     * @var TimezoneInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_localeDate;

    /**
     * @var Redirect
     */
    protected $_object;

    public function setUp()
    {
        $this->_context       = $this->getMockBuilder(Template\Context::class)->disableOriginalConstructor()->getMock();
        $this->_helperData    = $this->getMockBuilder(HelperData::class)->disableOriginalConstructor()->getMock();
        $this->_cmsPage       = $this->getMockBuilder(CmsPage::class)->disableOriginalConstructor()->getMock();
        $this->_response      = $this->getMockBuilder(Http::class)->disableOriginalConstructor()->getMock();
        $this->_date          = $this->getMockBuilder(DateTime::class)->disableOriginalConstructor()->getMock();
        $this->_urlBuilder    = $this->getMockBuilder(UrlInterface::class)->getMock();
        $this->_request       = $this->getMockBuilder(RequestInterface::class)->getMock();
        $this->_localeDate    = $this->getMockBuilder(TimezoneInterface::class)->getMock();

        $this->_context->method('getUrlBuilder')->willReturn($this->_urlBuilder);
        $this->_context->method('getRequest')->willReturn($this->_request);
        $this->_context->method('getLocaleDate')->willReturn($this->_localeDate);

        $this->_object = new Redirect(
            $this->_context,
            $this->_helperData,
            $this->_cmsPage,
            $this->_response,
            []
        );
    }

    /**
     * @throws Exception
     */
    public function testRedirectToUrl()
    {
        $this->_response->method('setNoCacheHeaders');
        $this->_helperData->method('getConfigGeneral')->with('redirect_to')->willReturn('about-us');
        $currentUrl = 'http://example.com/women/tops-women.html';
        $this->_helperData->method('getClientIp')->willReturn('192.168.1.100');
        $this->_urlBuilder->expects($this->at(0))
            ->method('getUrl')
            ->with('*/*/*', ['_current' => true, '_use_rewrite' => true])
            ->willReturn($currentUrl);

        $ipConfig  = '123.16.32.333';

        $this->_helperData->method('isEnabled')->willReturn(1);
        $this->_helperData->method('getWhitelistIp')->willReturn($ipConfig);
        $this->_helperData->method('getEndTime')->willReturn('06/29/2019 08:50:31');
        $this->_helperData->method('checkIp')->with('192.168.1.100', $ipConfig)->willReturn(false);
        $this->_helperData->method('getWhiteListPage')->willReturn('');
        $this->_localeDate->method('date')->willReturn(new \DateTime('now', new \DateTimeZone('UTC')));
        $this->_cmsPage->method('getIdentifier')->willReturn('http://example.com/women.html');
        $url = 'http://example.com/about-us';
        $this->_urlBuilder->expects($this->at(1))->method('getUrl')->with('about-us')->willReturn($url);
        $this->_response->expects($this->atLeastOnce())->method('setRedirect')->with($url)->willReturnSelf();

        $this->assertEquals($this->_response, $this->_object->redirectToUrl());
    }
}
