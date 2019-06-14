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

/**
 * Class Comingsoon
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Comingsoon extends Maintenance
{
    const PAGE_TITLE       = 'Coming Soon';
    const PAGE_DESCRIPTION = 'Our new site is coming soon. Stay tuned!';

    /**
     * @return mixed|string
     */
    public function getPageTitle()
    {
        $title = $this->_helperData->getComingSoonSetting('comingsoon_title');

        return empty($title) ? self::PAGE_TITLE : $title;
    }

    /**
     * @return mixed|string
     */
    public function getPageDescription()
    {
        $des = $this->_helperData->getMaintenanceSetting('comingsoon_description');

        return empty($des) ? self::PAGE_DESCRIPTION : $des;
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getComingSoonSetting($code)
    {
        return $this->_helperData->getComingSoonSetting($code);
    }
}
