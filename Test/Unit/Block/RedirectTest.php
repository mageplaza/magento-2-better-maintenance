<?php
namespace Mageplaza\BetterMaintenance\Test\Unit\Block;

use PHPUnit\Framework\TestCase;
use Magento\Cms\Model\Page as CmsPage;
use Magento\Framework\App\Response\Http;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Block\Redirect;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\RequestInterface;

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
     * @var Redirect
     */
    protected $_object;

    public function setUp()
    {
        $this->_context    = $this->getMockBuilder(Template\Context::class)->disableOriginalConstructor()->getMock();
        $this->_helperData = $this->getMockBuilder(HelperData::class)->disableOriginalConstructor()->getMock();
        $this->_cmsPage    = $this->getMockBuilder(CmsPage::class)->disableOriginalConstructor()->getMock();
        $this->_response   = $this->getMockBuilder(Http::class)->disableOriginalConstructor()->getMock();
        $this->_date       = $this->getMockBuilder(DateTime::class)->disableOriginalConstructor()->getMock();
        $this->_urlBuilder = $this->getMockBuilder(UrlInterface::class)
            ->setMethods(['getUrl'])->getMockForAbstractClass();
        $this->_request    = $this->getMockBuilder(RequestInterface::class)
            ->setMethods(['getClientIp'])
            ->getMockForAbstractClass();

        $this->_object = new Redirect(
            $this->_context,
            $this->_helperData,
            $this->_cmsPage,
            $this->_response,
            $this->_date,
            []
        );
    }

    public function testRedirectToUrl()
    {
        $this->_response->method('setNoCacheHeaders');
        $this->_helperData->method('getConfigGeneral')->with('redirect_to')->willReturn('about-us');
        $currentUrl = 'http://example.com/women/tops-women.html';
        $this->_urlBuilder
            ->method('getUrl')
            ->with('*/*/*', ['_current' => true, '_use_rewrite' => true])
            ->willReturn($currentUrl);
        $currentIp = '123.16.32.226';
        $this->_request->method('getClientIp')->willReturn($currentIp);

        $this->_helperData->method('isEnabled')->willReturn(1);

        $this->_helperData->method('getConfigGeneral')->with('whitelist_ip')->willReturn([]);
        $this->_helperData->method('checkIp')->with($currentIp, []);
        $this->_helperData->method('getConfigGeneral')->with('whitelist_page')->willReturn([]);
        $this->_helperData->method('getConfigGeneral')->with('end_time')->willReturn('6/26/99 19:36');

        $this->_cmsPage->method('getIdentifier')->willReturn('http://example.com/women.html');
        $url = 'http://example.com/about-us';
        $this->_urlBuilder->method('getUrl')->with('about-us')->willReturn($url);
        $this->_response->expects($this->atLeastOnce())->method('setRedirect')->with($url)->willReturnSelf();

        $this->assertEquals($this->_response, $this->_object->redirectToUrl());
    }
}
