<?php
namespace Mageplaza\BetterMaintenance\Block;

use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Helper\Image as HelperImage;

class Comingsoon extends Maintenance
{
    const PAGE_TITLE       = 'Coming Soon';
    const PAGE_DESCRIPTION = 'Our new site is coming soon. Stay tuned!';

    public function __construct(
        HelperData $helperData,
        HelperImage $helperImage,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($helperData, $helperImage, $context, $data);
    }

    public function getPageTitle()
    {
//        var_dump($this->_request->getFullActionName());die;
        $title = $this->_helperData->getComingSoonSetting('comingsoon_title');

        return empty($title) ? self::PAGE_TITLE : $title;
    }

    public function getPageDescription()
    {
        $des = $this->_helperData->getMaintenanceSetting('comingsoon_description');

        return empty($des) ? self::PAGE_DESCRIPTION : $des;
    }
}